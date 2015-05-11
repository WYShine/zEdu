<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Zcourse;

class CourseController extends Controller {
    public function index() {
        $nav_title = 'Applications Management';
        $state = \Request::input('state', 'pending');
        $zcourses = Zcourse::where('state', '=', $state)
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin/courses/index', [
            'zcourses' => $zcourses,
            'nav_title' => $nav_title,
            'state' => $state
        ]);
    }
}