<?php

namespace App\Http\Controllers\Web\Dashboard\Globalnewsfeed;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\DataProviders\Web\Dashboard\GlobalNewsfeed\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\GlobalNewsfeed\IndexRequest;
use Illuminate\Http\Request;

class GlobalNewsfeedController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
    	return view('dashboard.pages.globalnewsfeed.index',$provider->meta());
    }
}
