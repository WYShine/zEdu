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
}