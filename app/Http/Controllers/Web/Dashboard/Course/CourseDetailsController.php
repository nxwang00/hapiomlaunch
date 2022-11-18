<?php

namespace App\Http\Controllers\Web\Dashboard\Course;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use App\Http\Requests\Web\Dashboard\Course\CourseRequest;
use Illuminate\Http\Request;

class CourseDetailsController extends Controller
{
    public function index(CourseRequest $request, Course $course)
    {
    	return view('dashboard.pages.course.coursedetails', $request->getCourse());
    }
    
}
