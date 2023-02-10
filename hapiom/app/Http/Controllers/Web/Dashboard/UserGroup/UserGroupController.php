<?php

namespace App\Http\Controllers\Web\Dashboard\UserGroup;

use App\Http\Controllers\Controller;
use App\Http\DataProviders\Web\Dashboard\UserGroup\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\UserGroup\IndexRequest;
use App\Http\Requests\Web\Dashboard\UserGroup\JoinGroupRequest;
use App\Http\Requests\Web\Dashboard\UserGroup\StoreRequest;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Groupmaster;
use App\Models\Friendlist;
use App\Models\GroupUser;
use App\Models\PaymentSetting;
use App\Models\GroupMasterAdmin;
use App\Models\Payment as PaymentModel;
use Stripe\StripeClient;
use App\Models\Event;
use App\Models\Photo;
use App\Repositories\Notifications\NotificationsRepository;

class UserGroupController extends Controller
{

    public function index(Request $request)
    {
        $groups = DB::table('groupmasters')
                    ->join('group_master_admins', 'groupmasters.id', '=', 'group_master_admins.groupmaster_id')
                    ->where('groupmasters.status', 1)
                    ->select('groupmasters.*', 'group_master_admins.user_id', 'group_master_admins.groupmaster_id')
                    ->get();
        $friendIds = Friendlist::select('friend_id')->where(['user_id' => Auth::user()->id, 'friendstatus' => 1])->pluck('friend_id');
        foreach($groups as $group)
        {
            $groupFriends = GroupUser::whereIn('user_id',$friendIds)->where('group_id', $group->id)->where('status', 1)->get();
            $group->friends = $groupFriends;

            $groupMembers = GroupUser::where('group_id', $group->id)->where('status', 1)->get();
            $group->members = $groupMembers;

            $group->member = GroupUser::where('group_id', $group->id)->where('user_id', Auth::id())->first();
        }

    	return view('dashboard.pages.usergroup.index', compact('groups'));
    }

    public function joinGroup(StoreRequest $request, NotificationsRepository $notificationsRepository)
    {
        $data = $request->only('group_id');
        $notificationsRepository->userJoinsGroup($data['group_id'], Auth::user()->id);
        if ($request->persist()->getGroup()) {
            flashWebResponse('message', 'Your request to join is pending.');
            return redirect()->route('user-groups');
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function joinGroupDetail($id)
    {
        $groupUser = new groupUser;
        $groupUser->group_id = $id;
        $groupUser->user_id = Auth::id();
        $groupUser->status = FALSE;
        $groupUser->save();

        return "ok";
    }

    public function showGroupInfo($id) {
        $groupUsers = GroupUser::where('group_id', $id)->where('status', 1)->get();
        $groupEvents = Event::where('group_id', $id)->where('status', 1)->get();
        $groupPhotos = Photo::where('group_id', $id)->get();

        return view('dashboard.pages.usergroup.groupDetail', compact('groupUsers', 'groupEvents', 'groupPhotos'));
    }

    public function leaveGroup(Request $request)
    {
        $groupId = $request->input('group_id');

        GroupUser::where('group_id', $groupId)->where('user_id', Auth::id())->delete();
        flashWebResponse('message', 'You have successfully left the group');
        return redirect()->route('user-groups');
    }

    public function leaveGroupDetail($id)
    {
        GroupUser::where('group_id', $id)->where('user_id', Auth::id())->delete();
        return "ok";
    }

    public function viewDetail($id)
    {
        $group = Groupmaster::findOrFail($id);
        $groupAdmins = GroupMasterAdmin::where('groupmaster_id', $id)->get();
        $groupUsers = GroupUser::where('group_id', $id)->where('status', 1)->get();
        $groupUser = GroupUser::where('group_id', $id)->where('user_id', Auth::id())->first();

        return view('dashboard.pages.usergroup.detail', compact('group', 'groupAdmins', 'groupUsers', 'groupUser'));
    }

    public function payGroup(Request $request)
    {
        $user_id = Auth::id();
        $groupId = $request->input("paid_group_id");
        $cardName = $request->input("card_name");
        $cardNumber = $request->input("card_number");
        $expirationMonth = $request->input("expiration_month");
        $expirationYear = $request->input("expiration_year");
        $cardCVC = $request->input("card_cvc");

        // getting the amount set by group owner
        $groupAmount = Groupmaster::find($groupId)->amount;

        // checking if the group owner has the payment detail
        $groupOwnerIds = GroupMasterAdmin::where('groupmaster_id', $groupId)->pluck('user_id');
        $groupOwnerId = $groupOwnerIds[0];
        $paymentSetting = PaymentSetting::where('user_id', $groupOwnerId)->first();
        if (!isset($paymentSetting)) {
            flashWebResponse('error');
            return redirect()->route('user-groups');
        }
        if (isset($paymentSetting) && !$paymentSetting->stripe_secret) {
            flashWebResponse('error');
            return redirect()->route('user-groups');
        }

        // pay to group owner
        $ownerStripe = new StripeClient(env('STRIPE_SECRET'));

        $ownerToken = $ownerStripe->tokens->create([
            'card' => [
                'number' => $cardNumber,
                'exp_month' => $expirationMonth,
                'exp_year' => $expirationYear,
                'cvc' => $cardCVC,
            ],
        ]);

        if (!isset($ownerToken['id'])) {
            flashWebResponse('error');
            return redirect()->route('user-groups');
        }

        $ownerCharge = $ownerStripe->charges->create([
            'source' => $ownerToken['id'],
            'currency' => 'USD',
            'amount' => $groupAmount * 100 * 0.9,
            'description' => 'Payment to group owner for joining group',
        ]);

        if($ownerCharge['status'] !== 'succeeded') {
            flashWebResponse('error');
            return redirect()->route('user-groups');
        }

        // payment to site admin for joining a group
        $adminStripe = new StripeClient(env('STRIPE_SECRET'));

        $adminToken = $adminStripe->tokens->create([
            'card' => [
                'number' => $cardNumber,
                'exp_month' => $expirationMonth,
                'exp_year' => $expirationYear,
                'cvc' => $cardCVC,
                ],
        ]);

        if (!isset($adminToken['id'])) {
            flashWebResponse('error');
            return redirect()->route('user-groups');
        }

        $adminCharge = $adminStripe->charges->create([
            'source' => $adminToken['id'],
            'currency' => 'USD',
            'amount' => $groupAmount * 100 * 0.1,
            'description' => 'Payment to site admin for joining group',
        ]);

        if($adminCharge['status'] !== 'succeeded') {
            flashWebResponse('error');
            return redirect()->route('user-groups');
        }

        // Saving user's payment in history
        $payment                 = new PaymentModel();
        $payment->token_id       = $ownerToken['id'];
        $payment->user_id        = $user_id;
        $payment->charge_id      = $ownerCharge['id'];
        $payment->currency       = 'USD';
        $payment->payment_method = 'Stripe';
        $payment->total          = $groupAmount;
        $payment->save();

        $groupUser = new GroupUser();
        $groupUser->group_id = $groupId;
        $groupUser->user_id = Auth::id();
        $groupUser->status = FALSE;
        $groupUser->save();

        //     //Payment Success Mail...
        //     // $client_email = $user->email;

        //     //To client mail...
        //     // Mail::to($client_email)->send(new PaymentSuccess($user));

        //     //To admin mail...
        //     // Mail::to(get_setting_field('email'))->send(new PaymentSuccess($user));

        flashWebResponse('message', 'Your request to join is pending.');
        return redirect()->route('user-groups');
    }

    public function getMembers(Request $request, $id)
    {
        $queryTerm = $request->get('term');
        $groupUsers = DB::table('group_users')
            ->join('users', 'group_users.user_id', '=', 'users.id')
            ->select('users.id', 'users.name')
            ->where('group_users.group_id', $id)
            ->where('group_users.status', 1)
            ->where('users.name', 'like', "%$queryTerm%")
            ->get();
        return $groupUsers;
    }

    public function approve($id)
    {
        $groupUser = GroupUser::find($id);
        $groupUser->status = 1;
        $groupUser->save();

        return response()->json('ok');
    }
}
