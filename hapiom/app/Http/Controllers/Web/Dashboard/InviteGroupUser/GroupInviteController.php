<?php
namespace App\Http\Controllers\Web\Dashboard\InviteGroupUser;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\DataProviders\Web\Dashboard\UserGroup\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\User\IndexRequest;
use App\Http\Requests\Web\Dashboard\InviteGroupUser\StoreRequest;
use Illuminate\Http\Request; 
use App\Models\InviteGroupUser;
use Auth;

class GroupInviteController extends Controller
{
    public function processGroupInvite(StoreRequest $request)
    {
        if ($request->persist()->getStaus() != 1) {
            flashWebResponse('message', 'Invitation has been sent successfully.');

            return redirect()->route('group-invite');
        }
        flashWebResponse('limit');
        return redirect()->back();

    }
    public function joinGroup($token, $groupId)
    {
        if (!$inviteGroupUser = InviteGroupUser::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }
    
        return redirect()->route('invite-registration', [$token, $groupId]);
    }
    
    public function groupInvite(IndexRequest $request, IndexDataProvider $provider)
    {
        //return $provider->meta();
        return view('dashboard.pages.invitegroupuser.index',$provider->meta());
    }
}
