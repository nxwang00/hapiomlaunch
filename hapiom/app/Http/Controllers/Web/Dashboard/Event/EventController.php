<?php

namespace App\Http\Controllers\Web\Dashboard\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\Web\Dashboard\Event\StoreRequest;
use App\Http\Requests\Web\Dashboard\Event\UpdateRequest;
use App\Http\Requests\Web\Dashboard\Event\DeleteRequest;
use App\Models\Groupmaster;
use App\Models\GroupUser;
use Auth;
use DB;
use App\Repositories\Notifications\NotificationsRepository;

class EventController extends Controller
{
    public function create(StoreRequest $request)
    {
        if ($request->persist()->getEvent()) {
            $response = DB::table('events')->orderBy('id', 'desc')->first();
            return response()->json(['text' => 'Your request to create an event is submitted.', 'data' => $response]);
        }
    }

    public function edit(UpdateRequest $request)
    {
        if ($update = $request->persist()->getEvent()) {
            return response()->json(['text' => 'Your request to update an event is submitted.']);
        }
    }

    public function delete(DeleteRequest $request)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'event');
            return ($request->persist()->getEventMsg()) ? trashedWebResponse('event') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function getEvents(Request $request)
    {
        $groupId = $request->group_id;
        $events = Event::where(['group_id' => $groupId, 'creater_id' => Auth::user()->id])->get();
        $group = Groupmaster::findOrFail($groupId);
        $groups = Groupmaster::all();
        $groupUsers = GroupUser::where('group_id', $groupId)->where('status', 1)->get();
        $groupUser = GroupUser::where('group_id', $groupId)->where('user_id', Auth::id())->first();

        return view('dashboard.pages.event.index', compact('group', 'events', 'groupUsers', 'groupUser', 'groups'));
    }

    public function visible(Request $request)
    {
        $eventId = $request->eventId;
        $visibility = $request->visibility;

        $event = Event::find($eventId);
        $event->visible = $visibility;
        $event->save();

        return response()->json('ok');
    }

    public function approve($id, NotificationsRepository $notificationsRepository)
    {
        $event = Event::find($id);
        $event->status = 1;
        $notificationsRepository->eventApproved($id, Auth::user()->id, $event->status, $event);
        $event->save();

        return response()->json('ok');
    }

    public function reject($id, NotificationsRepository $notificationsRepository)
    {
        $event = Event::find($id);
        $event->status = 2;
        $notificationsRepository->eventApproved($id, Auth::user()->id, $event->status, $event);
        $event->save();

        return response()->json('ok');
    }
}
