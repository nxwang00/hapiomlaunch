<?php

use Carbon\Carbon;

/**
|-----------------------------------------------
| Web Response Helper Functions.......
|-----------------------------------------------
 */
if (!function_exists('httpWebResponse')) {
    function httpWebResponse()
    {
        return response()->json(['status' => 'Http request']);
    }
}

if (!function_exists('errorWebResponse')) {
    function errorWebResponse()
    {
        return response()->json(['status' => 'error', 'title' => 'Error!', 'text' => 'Something is wrong, please try again...']);
    }
}

if (!function_exists('createdWebResponse')) {
    function createdWebResponse($text = '')
    {
        return response()->json(['status' => 'success', 'title' => 'Created!', 'text' => ucwords($text) . ' has been added successfully.']);
    }
}

if (!function_exists('updatedWebResponse')) {
    function updatedWebResponse($text = '')
    {
        return response()->json(['status' => 'success', 'title' => 'Updated!', 'text' => ucwords($text) . ' has been updated successfully.']);
    }
}

if (!function_exists('trashedWebResponse')) {
    function trashedWebResponse($text = '')
    {
        return response()->json(['status' => 'success', 'title' => 'Deleted!', 'text' => ucwords($text) . ' has been trashed successfully.']);
    }
}

if (!function_exists('deletedWebResponse')) {
    function deletedWebResponse($text = '')
    {
        return response()->json(['status' => 'success', 'title' => 'Delete Permanently!', 'text' => ucwords($text) . ' has been deleted successfully.']);
    }
}

if (!function_exists('restoredWebResponse')) {
    function restoredWebResponse($text = '')
    {
        return response()->json(['status' => 'success', 'title' => 'Restored!', 'text' => ucwords($text) . ' has been restored successfully.']);
    }
}

if (!function_exists('blockWebResponse')) {
    function blockWebResponse($text = '')
    {
        return response()->json(['status' => 'success', 'title' => 'Block!', 'text' => ucwords($text) . ' has been block successfully.']);
    }
}
if (!function_exists('unblockWebResponse')) {
    function unblockWebResponse($text = '')
    {
        return response()->json(['status' => 'success', 'title' => 'Unblock!', 'text' => ucwords($text) . ' has been unblock successfully.']);
    }
}
if (!function_exists('friendAcceptWebResponse')) {
    function friendAcceptWebResponse($text = '')
    {
        return response()->json(['status' => 'success', 'title' => 'Friend!', 'text' => ucwords($text) . ' friend request accepted.']);
    }
}
if (!function_exists('flashWebResponse')) {
    function flashWebResponse($status = '', $message = '')
    {
        switch ($status) {
            case 'created':
                session()->flash('status', "success");
                if ($message == 'Polls') {
                    session()->flash('text', 'Your Poll Was Created');
                }
                else { session()->flash('text', ucwords($message) . " has been added successfully."); }
                break;
            case 'updated':
                session()->flash('status', "success");
                session()->flash('text', ucwords($message) . " has been updated successfully.");
                break;
            case 'trashed':
                session()->flash('status', "success");
                session()->flash('text', ucwords($message) . " has been trashed successfully.");
                break;
            case 'info':
                session()->flash('status', "info");
                session()->flash('text', "Something is wrong, please try again...");
                break;
            case 'message':
                session()->flash('status', "success");
                session()->flash('text', $message);
                break;
            case 'block':
                session()->flash('status', "success");
                session()->flash('text', $message);
                break;
            case 'unblock':
                session()->flash('status', "success");
                session()->flash('text', $message);
                break;
            case 'friendrequest':
                session()->flash('status', "success");
                session()->flash('text', $message);
                break;
            case 'friendrequestaccept':
                session()->flash('status', "success");
                session()->flash('text', $message);
                break;
            case 'error':
                session()->flash('status', "error");
                session()->flash('text', "Something is wrong, please try again...");
                break;
            case 'limit':
                session()->flash('status', "error");
                session()->flash('text', "You cannot invite more than 5 users");
                break;
            case 'store-error':
                session()->flash('status', "error");
                session()->flash('text', "Please visit your profile and create a store first.");
                break;
        }
    }
}

if (!function_exists('newsfeeddateformate')) {
    function newsfeeddateformate($date)
    {
        $created = new Carbon($date);
        $diffInDays = Carbon::parse($date)->diffInDays();
        $showDiff = Carbon::parse($date)->diffForHumans();

        if($diffInDays > 0){
          // $showDiff .= ', '. Carbon::parse($date)->addDays($diffInDays)->diffInHours().' Hours';
        }
        return $showDiff;
    }
}

?>