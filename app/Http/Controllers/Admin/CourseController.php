<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Zcourse;

class CourseController extends Controller {

    /**
     * Course management
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $nav_title = 'Applications';
        $state = \Request::input('state', Zcourse::STATE_PENDING);
        $zcourses = Zcourse::where('state', '=', $state)
            ->orderBy('id', 'DESC')
            ->get();
        return view('admin/courses/index', [
            'zcourses' => $zcourses,
            'nav_title' => $nav_title,
            'state' => $state
        ]);
    }

    /**
     * Update course
     *
     * @param $zcourseId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($zcourseId) {
        $zcourse = Zcourse::find($zcourseId);
        if (\Request::input('state') === Zcourse::STATE_USING &&
            count($zcourse->zpattern->zresources_available) === 0) {
            return \Redirect::back();
        }
        $user = \Auth::user();
        if (\Request::input('state') === Zcourse::STATE_CLOSED) {
            $zcourse->closed_reason = "Closed by {$user->role}: {$user->email}";
        }
        $zcourse->update(\Request::only(['state']));
        return \Redirect::back();
    }
}