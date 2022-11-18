<?php

namespace App\Http\Controllers\Web\Dashboard\Shopping;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\DataProviders\Web\Dashboard\IndexDataProvider;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{

    public function index()
    {
    	return view('dashboard.pages.shopping-cart.index');
    }
}
