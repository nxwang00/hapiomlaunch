<?php

namespace App\Http\Controllers\Web\Dashboard\Session;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Session_detail;
use App\Http\Requests\Web\Dashboard\session\SessionRequest;
use Illuminate\Http\Request;

class SessionDetailsController extends Controller
{
    public function index(SessionRequest $request, Session_detail $session_detail)
    {
    	return view('dashboard.pages.session.sessiondetails', $request->getSession_detail());
    }

}
