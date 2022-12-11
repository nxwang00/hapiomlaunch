<?php

namespace App\Http\Controllers\Web\Dashboard\Free;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Free;
use App\Http\Requests\Web\Dashboard\Free\FreeRequest;
use Illuminate\Http\Request;

class FreeDetailsController extends Controller
{
    public function index(FreeRequest $request, Free $free)
    {
    	return view('dashboard.pages.free.freedetails', $request->getFree());
    }

}
