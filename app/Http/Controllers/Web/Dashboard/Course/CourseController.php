<?php

namespace App\Http\Controllers\Web\Dashboard\Course;

use App\Models\Course;
use App\Http\Controllers\Controller;
use App\Http\DataProviders\Web\Dashboard\Course\IndexDataProvider;
use App\Http\DataProviders\Web\Dashboard\Course\CourselistDataProvider;
use App\Http\Requests\Web\Dashboard\Course\CreateRequest;
use App\Http\Requests\Web\Dashboard\Course\DestroyRequest;
use App\Http\Requests\Web\Dashboard\Course\EditRequest;
use App\Http\Requests\Web\Dashboard\Course\IndexRequest;
use App\Http\Requests\Web\Dashboard\Course\StoreRequest;
use App\Http\Requests\Web\Dashboard\Course\UpdateRequest;
use App\Http\Requests\Web\Dashboard\Course\CourselistRequest;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request, IndexDataProvider $provider)
    {
        return view('dashboard.pages.course.index',$provider->meta());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {
        return view('dashboard.pages.course.create',$request->getCourse());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        if($course = $request->persist()->getCourse()){
            flashWebResponse('created', 'Course');
            return redirect()->route('course', $course->id);
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
    public function edit(EditRequest $request, Course $course)
    {
        return view('dashboard.pages.course.edit', $request->getCourse());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Course $course)
    {
        if ($update = $request->persist()->getCourses()) {
            flashWebResponse('updated', 'Course');
            return redirect()->route('course-edit', $update->id);
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
    public function destroy(DestroyRequest $request, Course $course)
    {
        if (request()->ajax()) {
            flashWebResponse('trashed', 'Course');
            return ($request->persist()->getMsg()) ? trashedWebResponse('Course') : errorWebResponse();
        }
        return httpWebResponse();
    }

    public function courseList(CourselistRequest $request, CourselistDataProvider $provider)
    {
        return view('dashboard.pages.course.courselist',$provider->meta());
    }
}
