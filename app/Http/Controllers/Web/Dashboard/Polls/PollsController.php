<?php

namespace App\Http\Controllers\Web\Dashboard\Polls;

use App\Http\Controllers\Controller;
use App\Models\Polls;
use App\Models\Pollsresult;
use App\Http\DataProviders\Web\Dashboard\Polls\IndexDataProvider;
use App\Http\Requests\Web\Dashboard\Polls\IndexRequest;
use App\Http\Requests\Web\Dashboard\Polls\DetailRequest;
use App\Http\Requests\Web\Dashboard\Polls\CreateRequest;
use App\Http\Requests\Web\Dashboard\Polls\StoreRequest;
use App\Http\Requests\Web\Dashboard\Polls\EditRequest;
use App\Http\Requests\Web\Dashboard\Polls\UpdateRequest;
use App\Http\Requests\Web\Dashboard\Polls\DestroyRequest;
use App\Http\Requests\Web\Dashboard\Polls\ResultRequest;
use Illuminate\Http\Request;

class PollsController extends Controller
{
    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
    	return view('dashboard.pages.polls.index',$provider->meta());
    }

    public function create(CreateRequest $request)
    {
    	return view('dashboard.pages.polls.create',$request->getPolls());
    }

    public function store(StoreRequest $request)
    {
    	if($level = $request->persist()->getPolls()){
    		flashWebResponse('created', 'Polls');
            return redirect()->route('polls', $level->id);
    	}
    	flashWebResponse('error');
        return redirect()->back();
    }

    public function edit(EditRequest $request, Polls $polls)
    {
        return view('dashboard.pages.polls.edit', $request->getPolls());
    }

    public function update(UpdateRequest $request, Polls $polls)
    {
        
        if ($update = $request->persist()->getPolls()) {
            flashWebResponse('updated', 'Polls');
            return redirect()->route('polls-edit', $update->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function destroy(DestroyRequest $request, Polls $polls)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'Polls');
            return ($request->persist()->getMsg()) ? trashedWebResponse('Polls') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function polls_result(ResultRequest $request)
    {
        if($result = $request->persist()->getResult()){
            
            flashWebResponse('created', 'Pollsresult');
            return redirect()->route('dashboard', $result->id);
        }
        flashWebResponse('error');
        return redirect()->back();
    }

    public function polls_detail(DetailRequest $request, Polls $polls)
    {
        $polls_id = $polls->id;
        $pollsResult = Pollsresult::join('polls', 'pollsresults.polls_id', '=', 'polls.id')
               ->where('pollsresults.polls_id',$polls_id)->get(['pollsresults.*', 'polls.question', 'polls.option_a', 'polls.option_b', 'polls.option_c', 'polls.option_d']);

        // $pollsResult = Pollsresult::where('polls_id',$polls_id)->get();
        return view('dashboard.pages.polls.detail',$request->getPollDetails())->with('results',$pollsResult);

    }
}




