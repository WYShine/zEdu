<?php namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Zcourse;
use App\Zpattern;
use Illuminate\Database\Eloquent\Builder;

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

    /**
     * Store a new course
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store() {
        $zcourse = new Zcourse(\Request::all());
        $zcourse->applicant_id = \Auth::user()->id;
        $zcourse->save();

        return redirect(\URL::route('teacher.courses.index'));
    }

    /**
     * Show all course applications of the teacher
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $nav_title = 'My Applications';
        $zcourses = Zcourse::where('applicant_id',  '=', \Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('teacher/courses/index', [
            'nav_title' => $nav_title,
            'zcourses' => $zcourses
        ]);
    }

    /**
     * Show a specific course
     *
     * @return \Illuminate\View\View
     */
    public function show($courseId) {
        $zcourse = Zcourse::find($courseId);
        $nav_itle = 'My Applications';
        return view('teacher/courses/show', [
            'zcourse' => $zcourse,
            'nav_title' => $nav_itle
        ]);
    }
}
