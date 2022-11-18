<?php

namespace App\Http\Controllers\Web\Dashboard\Inviteuser;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\DataProviders\Web\Dashboard\User\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\User\BlockRequest;
use App\Http\Requests\Web\Dashboard\User\UnBlockRequest;

use App\Http\Requests\Web\Dashboard\Mebership\EditRequest;
use App\Http\Requests\Web\Dashboard\User\IndexRequest;
use App\Http\Requests\Web\Dashboard\Inviteuser\StoreRequest;
use App\Http\Requests\Web\Dashboard\Mebership\UpdateRequest;
use Illuminate\Http\Request; 
use Auth;

class InviteFriendController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {  
    	return view('dashboard.pages.inviteuser.index',$provider->meta());
    } 

    public function store(StoreRequest $request)
    {
    	if ($request->persist()->getStaus() != 1) {
            flashWebResponse('message', 'Invitation has been sent successfully.');
            return redirect()->route('users-invite');
        }
        flashWebResponse('limit');
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
}
