<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Zresource;
use Illuminate\Http\Request;

class ResourceController extends Controller {

    protected $nav_title = 'Resources';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $nav_title = $this->nav_title;
        $state = \Request::input('state', Zresource::STATE_AVAILABLE);
        $zresources = \App\Zresource::where('state', '=', $state)
            ->orderBy('id', 'DESC')
            ->get();
		return view('admin/resources/index', compact('nav_title', 'zresources', 'state'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $nav_title = $this->nav_title;
        $patterns = array_unique(array_map(function($zpattern) {
            return $zpattern['description'];
        }, \App\Zpattern::all()->toArray()));

		return view('admin/resources/create', compact('nav_title', 'patterns'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$count = \Request::input('count', 1);
        $zpattern = \App\Zpattern::where('description', '=', \Request::input('pattern'))
            ->where('capacity', '=', \Request::input('capacity'))
            ->get()
            ->first();
        $zpattern_id = $zpattern->id;
        for ($i = 0; $i < $count; $i ++) {
            Zresource::create([
                'zpattern_id' => $zpattern_id,
                'password_teacher' => env('Z_TEACHER_PWD', '0000'),
                'password_student' => env('Z_STUDENT_PWD', '0000'),
                'ip' => env('Z_IP', '192.168.0.1'),
                'port' => env('Z_PORT', '3389')
            ]);
        }
        return \Redirect::route('admin.resources.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $zresource = Zresource::find($id);
        $user = \Auth::user();
        if (\Request::input('state') === Zresource::STATE_CLOSED) {
            $zcourse->closed_reason = "Closed by {$user->role}: {$user->email}";
        }
        $zresource->update(\Request::only(['state']));
        return \Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
