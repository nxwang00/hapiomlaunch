<?php

namespace App\Http\Controllers\Web\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userinfo;
use App\Models\Notification;
use App\Http\DataProviders\Web\Dashboard\User\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\User\BlockRequest;
use App\Http\Requests\Web\Dashboard\User\UnBlockRequest;
use App\Http\Requests\Web\Dashboard\User\DeleteRequest;

use App\Http\Requests\Web\Dashboard\Mebership\EditRequest;
use App\Http\Requests\Web\Dashboard\User\IndexRequest;
use App\Http\Requests\Web\Dashboard\Mebership\StoreRequest;
use App\Http\Requests\Web\Dashboard\Mebership\UpdateRequest;
use Illuminate\Http\Request;
use Hash;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index(Request $request, IndexDataProvider $provider)
    {
        $search = $request->query('search');

    	return view('dashboard.pages.user.index',$provider->meta($search));
    }

    public function createUser() {
        return view('dashboard.pages.user.admin-add');
    }

    public function editUser(Request $request,$id) {
        $adminUser = User::findOrFail($id);
        return view('dashboard.pages.user.admin-edit', ['admin_user' => $adminUser]);
    }
    
    public function adminRegistration(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'group_type' => 'required',

        ]);

        $data = $request->all();
        $check = $this->createData($data);
        flashWebResponse('message', 'Admin User add successfully.!');
        return back();
    }

    public function adminUpdate(Request $request, $id)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'company_name' => 'required',
            'email' => 'required|email',
            'group_type' => 'required',

        ]);
        $user = User::findOrFail($id);
        $user->update($this->updateData($request));
       
        $user->save();
        flashWebResponse('message', 'Admin User edit successfully.!');
        return back();
    }
    
    public function createData(array $data)
    {
      return User::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'name' => $data['first_name'].' '.$data['last_name'],
        'company_name' => $data['company_name'],
        'slug' => str_replace(" ","_",$data['company_name']),
        'email' => $data['email'],
        'role_id' => 2,
        'password' => Hash::make($data['password']),
        'group_type' => $data['group_type'],
        'status' => $data['status'],
        'meberships_id' => 4,
        'edate' => Carbon::now()->addDays(14),
      ]);
    }

    public function updateData(Request $request): array
    {
        return [
            'first_name'     => $request->input('first_name'), 
            'last_name'     => $request->input('last_name'),
            'company_name'     => $request->input('company_name'),
            'email'     => $request->input('email'),
            'group_type'     => $request->input('group_type'),
            'status' => $request->input('status')
        ];
    }

    public function blockUser(BlockRequest $request, User $user)
    {
        if (request()->ajax()) {
            flashWebResponse('block', 'block! user has been block successfully.');
            return ($request->persist()->getMsg()) ? blockWebResponse('block') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function unblockUser(UnBlockRequest $request, User $user)
    {
        if (request()->ajax()) {
            flashWebResponse('unblock', 'unblock! user has been unblock successfully.');
            return ($request->persist()->getMsg()) ? unblockWebResponse('block') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function userList(IndexRequest $request, IndexDataProvider $provider)
    {
       return view('dashboard.pages.user.userlist',$provider->meta());
    }

    public function create(CreateRequest $request)
    {
    	return view('dashboard.pages.mebership.create',$request->getStore());
    }

    public function store(StoreRequest $request)
    {
    	if ($level = $request->persist()->getLevel()) {
            flashWebResponse('created', 'store level');
            return redirect()->route('mebership', $level->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }
    public function edit(Request $request,$meberships)
    {
        $meberships = Meberships::findOrFail($meberships);
        $storemasters = Storemasters::join('storepermisions','storepermisions.store_id','storemasters.id')->where('storepermisions.meberships_id',$meberships->id)->get();
        return view('dashboard.pages.mebership.edit',['meberships' => $meberships,'storemasters' => $storemasters]);
    }

    public function update(UpdateRequest $request, Meberships $meberships)
    {
        if ($update = $request->persist()->getMeberships()) {
            flashWebResponse('updated', 'level');
            return redirect()->route('mebership-edit', $update->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function destroy(DestroyRequest $request, Meberships $mebership)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'level');
            return ($request->persist()->getMsg()) ? trashedWebResponse('level') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function delete(DeleteRequest $request, User $user)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'user');
            return ($request->persist()->getMsg()) ? trashedWebResponse('level') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function admindetails(User $user)
    {
       return view('dashboard.pages.user.admindetails',compact('user'));
    }

    public function addUserComment(Request $request) {
        $this->validate($request, [
          'comment' => 'required',
        ]);

        //  Store data in database
        $userinfo = Userinfo::where('user_id',$request->user_id)->first();
        if (isset($userinfo->user_id)) {
            Userinfo::where('user_id',$request->user_id)->update(['comment' => $request->comment]);
        }
        else {
            Userinfo::create(['comment' => $request->comment, 'user_id' => $request->user_id]);
        }
        flashWebResponse('updated', 'comment');
        return redirect()->route('user.viewdetails', $request->user_id);
    }

    public function alerts()
    {
        $authId = Auth::id();
        $query = "SELECT messages.*, userinfos.profile_image, users.name FROM messages
            INNER JOIN (SELECT user_id, MAX(created_at) AS end_date FROM messages GROUP BY user_id) T2
            ON messages.user_id=T2.user_id AND messages.created_at=T2.end_date
            LEFT JOIN userinfos ON messages.user_id=userinfos.user_id
            LEFT JOIN users ON messages.user_id=users.id
            WHERE messages.receiver_id=$authId AND messages.is_seen=0";
        $alertMessageUsers = DB::select(DB::raw($query));

        $notifications = DB::table('notifications')
                        ->select('notifications.*', 'userinfos.profile_image', 'users.name')
                        ->leftJoin('userinfos', 'notifications.user_id', '=', 'userinfos.user_id')
                        ->leftJoin('users', 'notifications.user_id', '=', 'users.id')
                        ->where('notifications.receiver_id', $authId)
                        ->where('is_seen', 0)
                        ->orderByDesc('created_at')
                        ->get();

        $rst = [];
        $rst['messengers'] = $alertMessageUsers;
        $rst['notifications'] = $notifications;

        return $rst;
    }
}
