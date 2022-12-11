<?php

namespace App\Http\Controllers\Web\Dashboard\Notification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use Auth;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        // when using the link in header notification alert panel
        $recentId = $request->recent;
        $recentNotification = Notification::find($recentId);
        if (isset($recentNotification))
        {
            $recentNotification->is_seen = 1;
            $recentNotification->save();
        }

        $notifications = Notification::where('receiver_id', Auth::id())->orderByDesc('created_at')->get();
        return view('dashboard.pages.notification.index', compact('notifications', 'recentNotification'));
    }

    public function deleteNotification($id)
    {
        Notification::where('id', $id)->delete();
        return redirect('notification');
    }
}
