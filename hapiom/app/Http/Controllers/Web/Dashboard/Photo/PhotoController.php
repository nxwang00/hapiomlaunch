<?php

namespace App\Http\Controllers\Web\Dashboard\Photo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Web\Dashboard\Photo\StoreRequest;
use App\Http\Requests\Web\Dashboard\Photo\DeleteRequest;
use App\Http\Requests\Web\Dashboard\Photo\UpdateRequest;
use App\Models\Photo;
use App\Models\Groupmaster;
use App\Models\GroupUser;
use DB;
use Auth;

class PhotoController extends Controller
{
    public function create(StoreRequest $request)
    {
        if ($request->persist()->getPhoto()) {
            $response = DB::table('photos')->orderBy('id', 'desc')->first();
            return response()->json(['text' => 'Your request to create an photo is submitted.', 'data' => $response]);
        }
    }

    public function edit(UpdateRequest $request)
    {
        if ($update = $request->persist()->getPhoto()) {
            return response()->json(['text' => 'Your request to update an photo is submitted.']);
        }
    }

    public function delete(DeleteRequest $request)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'photo');
            return ($request->persist()->getPhotoMsg()) ? trashedWebResponse('photo') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function getPhotos(Request $request)
    {
        $groupId = $request->group_id;
        $photos = Photo::where(['group_id' => $groupId, 'creater_id' => Auth::user()->id])->get();
        $group = Groupmaster::findOrFail($groupId);
        $groups = Groupmaster::all();
        $groupUsers = GroupUser::where('group_id', $groupId)->where('status', 1)->get();
        $groupUser = GroupUser::where('group_id', $groupId)->where('user_id', Auth::id())->first();

        return view('dashboard.pages.photo.index', compact('group', 'photos', 'groupUsers', 'groupUser', 'groups'));
    }
}
