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
        $state = \Request::input('state', Zresource::STATE_PENDING);
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
        $zpatterns = \App\Zpattern::all();

		return view('admin/resources/create', compact('nav_title', 'zpatterns'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$count = \Request::input('count', 1);
        $zpattern_id = \Request::input('zpattern_id');
        for ($i = 0; $i < $count; $i ++) {
            Zresource::create([
                'zpattern_id' => $zpattern_id,
                'password_teacher' => '0000',
                'password_student' => '0000',
                'ip' => '192.168.0.1',
                'port' => '3389'
            ]);
        }
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
		//
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
