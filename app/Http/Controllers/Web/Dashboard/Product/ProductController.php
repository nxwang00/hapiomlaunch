<?php

namespace App\Http\Controllers\Web\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\DataProviders\Web\Dashboard\Product\IndexDataProvider;
use App\Http\DataProviders\Web\Dashboard\Product\ProductlistDataProvider;
use App\Http\Requests\Web\Dashboard\Product\CreateRequest;
use App\Http\Requests\Web\Dashboard\Product\DestroyRequest;
use App\Http\Requests\Web\Dashboard\Product\EditRequest;
use App\Http\Requests\Web\Dashboard\Product\IndexRequest;
use App\Http\Requests\Web\Dashboard\Product\StoreRequest;
use App\Http\Requests\Web\Dashboard\Product\UpdateRequest;
use App\Http\Requests\Web\Dashboard\Product\ProductlistRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
    	return view('dashboard.pages.product.index',$provider->meta());
    }

    public function create(CreateRequest $request)
    {
    	return view('dashboard.pages.product.create',$request->getStore());
    }

    public function store(StoreRequest $request)
    {
    	if($level = $request->persist()->getLevel()){
    		flashWebResponse('created', 'Product');
            return redirect()->route('product', $level->id);
    	}
    	flashWebResponse('error');
        return redirect()->back();
    }

    public function edit(EditRequest $request, Product $product)
    {
        return view('dashboard.pages.product.edit', $request->getProduct());
    }

    public function update(UpdateRequest $request, Product $product)
    {
        
        if ($update = $request->persist()->getProducts()) {
            flashWebResponse('updated', 'Product');
            return redirect()->route('product-edit', $update->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function destroy(DestroyRequest $request, Product $product)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'Product');
            return ($request->persist()->getMsg()) ? trashedWebResponse('Product') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function productList(ProductlistRequest $request, ProductlistDataProvider $provider)
    {
        return view('dashboard.pages.product.productlist',$provider->meta());
    }
}
