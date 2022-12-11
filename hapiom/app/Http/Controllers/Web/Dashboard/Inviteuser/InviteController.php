<?php
namespace App\Http\Controllers\Web\Dashboard\Inviteuser;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\DataProviders\Web\Dashboard\User\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\User\IndexRequest;
use App\Http\Requests\Web\Dashboard\Inviteuser\StoreRequest;
use Illuminate\Http\Request; 
use App\Models\InviteUser;
use App\Mail\SendEmailInvitation;
use Auth;

class InviteController extends Controller
{
    public function invite(IndexRequest $request, IndexDataProvider $provider)
    {
        return view('dashboard.pages.inviteuser.index',$provider->meta());
    }
    public function process(StoreRequest $request)
    {
        if ($request->persist()->getStaus() != 1) {
            flashWebResponse('message', 'Invitation has been sent successfully.');

            return redirect()->route('invite');
        }
        flashWebResponse('limit');
        return redirect()->back();

    }
    public function accept($token)
    {
        if (!$inviteUser = InviteUser::where('token', $token)->first()) {
            //if the invite doesn't exist do something more graceful than this
            abort(404);
        }

        return redirect()->route('invite-registration', [$token, 'NONE']);
    }
}
