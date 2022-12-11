<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Polls;
use App\Models\Pollsresult;
use App\Http\DataProviders\Web\Dashboard\IndexDataProvider;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{

    public function index()
    {
    	$getPolls = Polls::where('user_id',Auth::user()->customer_id)->orderBy('id', 'ASC')->get();
    	
    	return view('dashboard.index',compact('getPolls'));
        // return view('dashboard.index', $provider->meta())->with('polls',$getPolls);
    }
}
