<?php

namespace App\Http\Controllers\Web\Dashboard\Ads;

use App\Http\Controllers\Controller;
use App\Models\GoogleAd;
use App\Models\Groupmaster;
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
        $groups = Groupmaster::where('group_type', 1)->get();

    	return view('dashboard.pages.ads.index',['groups' => $groups, 'results' => $provider->meta()]);
    }

    public function create()
    {
        $groups = Groupmaster::where('group_type', 1)->get();

    	return view('dashboard.pages.ads.create', ['groups' => $groups]);
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
        $groups = Groupmaster::where('group_type', 1)->get();

        return view('dashboard.pages.ads.show', ['groups' => $groups, $request->getAdsData()]);
    }

    public function edit(Request $request,$id)
    {	
    	$googlead = GoogleAd::findOrFail($id);
        $groups = Groupmaster::where('group_type', 1)->get();
        return view('dashboard.pages.ads.edit',['googlead' => $googlead, 'groups' => $groups]);
    }

    public function update(UpdateRequest $request, $googlead)
    {	
        // echo "<pre>"; print_r($googlead); die('test');
        if ($request->persist($googlead)->getAds()) {
            flashWebResponse('updated', 'ads');
            return redirect()->route('ads.index');
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
