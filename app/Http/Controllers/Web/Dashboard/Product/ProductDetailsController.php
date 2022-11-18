<?php

namespace App\Http\Controllers\Web\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Http\Requests\Web\Dashboard\Productdetails\IndexRequest;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index(IndexRequest $request, Product $product)
    {
    	return view('dashboard.pages.productdetails.index', $request->getProduct());
    }

}
