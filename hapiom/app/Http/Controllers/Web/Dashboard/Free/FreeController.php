<?php

namespace App\Http\Controllers\Web\Dashboard\Free;

use App\Models\Free;
use App\Http\Controllers\Controller;
use App\Http\DataProviders\Web\Dashboard\Free\IndexDataProvider;
use App\Http\DataProviders\Web\Dashboard\Free\FreelistDataProvider;
use App\Http\Requests\Web\Dashboard\Free\CreateRequest;
use App\Http\Requests\Web\Dashboard\Free\DestroyRequest;
use App\Http\Requests\Web\Dashboard\Free\EditRequest;
use App\Http\Requests\Web\Dashboard\Free\IndexRequest;
use App\Http\Requests\Web\Dashboard\Free\StoreRequest;
use App\Http\Requests\Web\Dashboard\Free\UpdateRequest;
use App\Http\Requests\Web\Dashboard\Free\FreelistRequest;
use Illuminate\Http\Request;

class FreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
        return view('dashboard.pages.free.index',$provider->meta());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {
        return view('dashboard.pages.free.create',$request->getFree());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if($free = $request->persist()->getFree()){
            flashWebResponse('created', 'Free');
            return redirect()->route('free', $free->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditRequest $request, Free $free)
    {
        return view('dashboard.pages.free.edit', $request->getFree());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Free $free)
    {
        if ($update = $request->persist()->getFree()) {
            flashWebResponse('updated', 'Free');
            return redirect()->route('free-edit', $update->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request, Free $free)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'Free');
            return ($request->persist()->getMsg()) ? trashedWebResponse('Free') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function freelist(FreelistRequest $request, FreelistDataProvider $provider)
    {
        return view('dashboard.pages.free.freelist',$provider->meta());
    }
}
