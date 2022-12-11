<?php

namespace App\Http\Controllers\Web\Dashboard\Mebership;

use App\Http\Controllers\Controller;
use App\Models\Meberships;
use App\Models\Storemasters;
use App\Models\Storepermisions;
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
        $storemasters = Storemasters::get();
        $storepermisions = Storemasters::join('storepermisions','storepermisions.store_id','storemasters.id')->where('storepermisions.meberships_id',$meberships->id)->whereNull('storepermisions.deleted_at')->pluck('storepermisions.store_id')->all();


        return view('dashboard.pages.mebership.edit',['meberships' => $meberships,'storemasters' => $storemasters, 'storepermisions' =>$storepermisions]);
    }

    public function update(Request $request,Meberships $meberships)
    {
        $request->validate([
            'name'     => 'required|string',
            'levelstatus'     => 'required',
        ]);

        $data = [
            'name'     => $request->name,
            'levelstatus'     => $request->levelstatus,
            'amount'     => $request->amount,
            'description'     => $request->description,
        ];

        $meberships->update($data);

        Storepermisions::where('meberships_id',$meberships->id)->delete();

        $stores = $request->store;
        $data = [];
        foreach ($stores as $value) {
           $data[] = ['store_id' => $value, 'meberships_id' => $meberships->id];
        }
        Storepermisions::insert($data);

        flashWebResponse('updated', 'level');
        return redirect()->route('mebership-edit', $meberships->id);
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
