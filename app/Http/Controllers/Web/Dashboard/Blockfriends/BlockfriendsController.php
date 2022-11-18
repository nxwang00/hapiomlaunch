<?php

namespace App\Http\Controllers\Web\Dashboard\Blockfriends;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\DataProviders\Web\Dashboard\IndexDataProvider;
use Illuminate\Http\Request;

class BlockfriendsController extends Controller
{

    public function index()
    {
    	return view('dashboard.pages.blockfriends.index');
    }
}
