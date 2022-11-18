<?php

namespace App\Http\Controllers\Web\Dashboard\Ads;

use App\Http\Controllers\Controller;
use App\Models\GoogleAd;

use App\Http\DataProviders\Web\Dashboard\Ads\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\Ads\CreateRequest;
use App\Http\Requests\Web\Dashboard\Ads\DestroyRequest;
use App\Http\Requests\Web\Dashboard\Ads\EditRequest;
use App\Http\Requests\Web\Dashboard\Ads\IndexRequest;
use App\Http\Requests\Web\Dashboard\Ads\StoreRequest;
use App\Http\Requests\Web\Dashboard\Ads\UpdateRequest;
use App\Http\Requests\Web\Dashboard\Ads\ShowRequest;

use Illuminate\Http\Request;

class AdsController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
    	return view('dashboard.pages.ads.index',$provider->meta());
    }

    public function create()
    {
    	return view('dashboard.pages.ads.create');
    }

    public function store(StoreRequest $request)
    {
    	if ($store = $request->persist()->getAds()) {
            flashWebResponse('created', 'ads');
            return redirect()->route('ads.index', $store->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }
    public function show(ShowRequest $request, GoogleAd $googlead)
    {
        return view('dashboard.pages.ads.show', $request->getAdsData());
    }

    public function edit(Request $request,$id)
    {	
    	$googlead = GoogleAd::findOrFail($id);
        return view('dashboard.pages.ads.edit',['googlead' => $googlead]);
    }

    public function update(UpdateRequest $request, $googlead)
    {	
        // echo "<pre>"; print_r($googlead); die('test');
        if ($ads = $request->persist($googlead)->getAds()) {
            flashWebResponse('updated', 'ads');
            return redirect()->route('ads.edit', $ads->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function destroy(DestroyRequest $request, $googlead)
    {   
        if (request()->ajax()) {
            flashWebResponse('trashed', 'ads');
            return ($request->persist($googlead)->getAdsMsg()) ? trashedWebResponse('ads') : errorWebResponse();
        }
        return httpWebResponse();
    }
}
