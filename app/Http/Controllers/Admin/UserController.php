<?php namespace App\Http\Controllers\Admin;

use \App\Http\Controllers\Controller;

use \App\User;

class UserController extends Controller {
    public function index() {
        $users = User::all();
        $nav_title = 'Users';
        return view('admin/users/index', [
            'users' => $users,
            'nav_title' => $nav_title
        ]);
    }

    public function update($id) {
        $user = User::find($id);
        if (\Request::input('role') === 'teacher' &&
            $user->role != 'admin') {
            $user->update(\Request::only(['role']));
        }
        $user->save();
        return \Redirect::back();
    }
}