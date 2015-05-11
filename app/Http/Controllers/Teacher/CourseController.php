<?php namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Zcourse;
use App\Zpattern;

class CourseController extends Controller {
    /**
     * Create a new course
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        $nav_title = 'New Application';
        return view('teacher/courses/create', [
            'nav_title' => $nav_title,
            'zpatterns' => Zpattern::all()
        ]);
    }

    public function store() {
        $zcourse = new Zcourse(\Request::all());
        $zcourse->applicant_id = \Auth::user()->id;
        $zcourse->save();

        return redirect(\URL::route('teacher.courses.index'));
    }
}
