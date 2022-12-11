<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userinfo;
use App\Models\Friendlist;
use App\Models\Newsfeed;
use App\Http\DataProviders\Web\Dashboard\CustomerDashboad\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\CustomerDashboad\IndexRequest;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{

    public function index()
    {
    	if (Auth::user()->role_id == 3) {
    		return redirect()->route('newsfeed');
    	}

        if (Auth::user()->role_id == 2) {
            return redirect()->route('newsfeed');
            // $adminUser = User::where('role_id', 2)->get()->count();
            // $user = User::where('role_id', 3)->get()->count();
            // $totalUser = User::where('role_id', 2)->get()->count();
            // return view('dashboard.index', compact('adminUser','user','totalUser'));
        }
        if(Auth::user()->role_id == 1) {
            return redirect()->route('user.index');
        }

        $adminUser = User::where('role_id', 2)->get()->count();
        $user = User::where('role_id', 3)->get()->count();
        $totalUser = User::all()->count();
    	return view('dashboard.index', compact('adminUser','user','totalUser'));
    }

    public function customerdashboad(IndexRequest $request, IndexDataProvider $provider)
    {
        return view('customer.dashboard.index',$provider->meta());
    }
}
