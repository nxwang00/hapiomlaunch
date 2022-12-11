<?php

namespace App\Http\Controllers\Web\Dashboard\Session;

use App\Models\Session_detail;
use App\Http\Controllers\Controller;
use App\Http\DataProviders\Web\Dashboard\Session\IndexDataProvider;
use App\Http\DataProviders\Web\Dashboard\Session\SessionlistDataProvider;
use App\Http\Requests\Web\Dashboard\Session\CreateRequest;
use App\Http\Requests\Web\Dashboard\Session\DestroyRequest;
use App\Http\Requests\Web\Dashboard\Session\EditRequest;
use App\Http\Requests\Web\Dashboard\Session\IndexRequest;
use App\Http\Requests\Web\Dashboard\Session\StoreRequest;
use App\Http\Requests\Web\Dashboard\Session\UpdateRequest;
use App\Http\Requests\Web\Dashboard\Session\SessionlistRequest;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
        return view('dashboard.pages.session.index',$provider->meta());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {
        return view('dashboard.pages.session.create',$request->getCourse());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if($course = $request->persist()->geSession()){
            flashWebResponse('created', 'Session');
            return redirect()->route('session', $course->id);
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
    public function edit(EditRequest $request, Session_detail $session_detail)
    {
        return view('dashboard.pages.session.edit', compact('session_detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Session_detail $session_detail)
    {
        if ($update = $request->persist()->getFree()) {
            flashWebResponse('updated', 'Session');
            return redirect()->route('session-edit', $update->id);
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
    public function destroy(DestroyRequest $request, Session_detail $session_detail)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'Session');
            return ($request->persist()->getMsg()) ? trashedWebResponse('Session') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function sessionList(SessionlistRequest $request, SessionlistDataProvider $provider)
    {
        return view('dashboard.pages.session.sessionlist',$provider->meta());

    }
}
