<?php

namespace App\Http\Controllers\Web\Dashboard\Storemaster;

use App\Http\Controllers\Controller;
use App\Models\Storemasters;

use App\Http\DataProviders\Web\Dashboard\Storemaster\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\Storemaster\CreateRequest;
use App\Http\Requests\Web\Dashboard\Storemaster\DestroyRequest;
use App\Http\Requests\Web\Dashboard\Storemaster\EditRequest;
use App\Http\Requests\Web\Dashboard\Storemaster\IndexRequest;
use App\Http\Requests\Web\Dashboard\Storemaster\StoreRequest;
use App\Http\Requests\Web\Dashboard\Storemaster\UpdateRequest;



use Illuminate\Http\Request;

class StoremasterController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
    	return view('dashboard.pages.storemaster.index',$provider->meta());
    }

    public function create()
    {
    	return view('dashboard.pages.storemaster.create');
    }

    public function store(StoreRequest $request)
    {
    	if ($store = $request->persist()->getStore()) {
            flashWebResponse('created', 'store master');
            return redirect()->route('store-master', $store->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function edit(Request $request,$storemasters)
    {	
    	$storemaster = Storemasters::findOrFail($storemasters);
        return view('dashboard.pages.storemaster.edit',['storemaster' => $storemaster]);
    }

    public function update(UpdateRequest $request, $storemasters)
    {	
        if ($store = $request->persist($storemasters)->getStoremasters()) {
            flashWebResponse('updated', 'store master');
            return redirect()->route('store-master');
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function destroy(DestroyRequest $request, Storemasters $storemasters)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'store master');
            return ($request->persist()->getMsg()) ? trashedWebResponse('store master') : errorWebResponse();
        }
        return httpWebResponse();
    }
}
