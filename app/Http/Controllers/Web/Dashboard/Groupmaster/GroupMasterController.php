<?php

namespace App\Http\Controllers\Web\Dashboard\Groupmaster;

use App\Http\Controllers\Controller;
use App\Http\DataProviders\Web\Dashboard\Groupmaster\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\Groupmaster\EditRequest;
use App\Http\Requests\Web\Dashboard\Groupmaster\IndexRequest;
use App\Http\Requests\Web\Dashboard\Groupmaster\CreateRequest;
use App\Http\Requests\Web\Dashboard\Groupmaster\StoreRequest;
use App\Http\Requests\Web\Dashboard\Groupmaster\UpdateRequest;
use App\Http\Requests\Web\Dashboard\Groupmaster\DestroyRequest;
use Illuminate\Http\Request; 
use App\Models\Groupmaster;
use Auth;

class GroupMasterController extends Controller
{

    public function index(IndexRequest $request, IndexDataProvider $provider)
    {  
    	return view('dashboard.pages.groupmaster.index',$provider->meta());
    }
    public function create(CreateRequest $request)
    {
        return view('dashboard.pages.groupmaster.create', $request->getAdmin());
    } 

    public function store(StoreRequest $request)
    {
    	if ($request->persist()->getGroup()) {
            flashWebResponse('created', 'Group');
            return redirect()->route('group');
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function edit(EditRequest $request,$id)
    {   
        return view('dashboard.pages.groupmaster.edit',$request->getData());
    }

    public function update(UpdateRequest $request, Groupmaster $group)
    {   
        if ($update = $request->persist()->getGroup()) {
            flashWebResponse('updated', 'Group');
            return redirect()->route('group-edit', $update->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function destroy(DestroyRequest $request, Groupmaster $group)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'Group');
            return ($request->persist()->getMsg()) ? trashedWebResponse('level') : errorWebResponse();
        }
        return httpWebResponse();
    }
}
