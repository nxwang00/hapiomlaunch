<?php

namespace App\Http\Controllers\Web\Dashboard\Mebership;

use App\Http\Controllers\Controller;
use App\Models\Meberships;
use App\Models\Storemasters;
use App\Http\DataProviders\Web\Dashboard\Mebership\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\Mebership\CreateRequest;
use App\Http\Requests\Web\Dashboard\Mebership\DestroyRequest;
use App\Http\Requests\Web\Dashboard\Mebership\EditRequest;
use App\Http\Requests\Web\Dashboard\Mebership\IndexRequest;
use App\Http\Requests\Web\Dashboard\Mebership\StoreRequest;
use App\Http\Requests\Web\Dashboard\Mebership\UpdateRequest;
use Illuminate\Http\Request;

class MebershipController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
    	return view('dashboard.pages.mebership.index',$provider->meta());
    }

    public function create(CreateRequest $request)
    {
    	return view('dashboard.pages.mebership.create',$request->getStore());
    }

    public function store(StoreRequest $request)
    {
    	if ($level = $request->persist()->getLevel()) {
            flashWebResponse('created', 'store level');
            return redirect()->route('mebership', $level->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }
    public function edit(Request $request,$meberships)
    {   
        $meberships = Meberships::findOrFail($meberships);
        $storemasters = Storemasters::join('storepermisions','storepermisions.store_id','storemasters.id')->where('storepermisions.meberships_id',$meberships->id)->get();
        return view('dashboard.pages.mebership.edit',['meberships' => $meberships,'storemasters' => $storemasters]);
    }

    public function update(UpdateRequest $request, Meberships $meberships)
    {   
        if ($update = $request->persist()->getMeberships()) {
            flashWebResponse('updated', 'level');
            return redirect()->route('mebership-edit', $update->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function destroy(DestroyRequest $request, Meberships $mebership)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'level');
            return ($request->persist()->getMsg()) ? trashedWebResponse('level') : errorWebResponse();
        }
        return httpWebResponse();
    }
}
