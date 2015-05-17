<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Telnet;
use App\User;
use App\Zaccount;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AccountController extends Controller {


	public function create() {
		$nav_title = 'TSO Account';
		$user = \Auth::user();
		if($user->zaccount) {
			$account = $user->zaccount;
		} else {
			$account = null;
		}
		return view('user/accounts/create', [
			'nav_title' => $nav_title,
			'user' => $user,
			'account' => $account
		]);
	}

	public function store() {
		try {
			$account = Zaccount::where("state", "=", "available")->firstOrFail();
			$account->state = "using";
			$account->user_id = \Auth::user()->id;
			$account->save();
			$user = \Auth::user();
			$user->zaccount_id = $account->id;
			$user->applied_account = 1;
			$user->save();
			$this->connectMain();
			return $account->id;
		} catch (ModelNotFoundException $e) {
			//没有可用的账号
			return "无可用账号";
		}
	}

	private function connectMain() {
//		$telnet = new Telnet("10.60.43.6",23);
//		$telnet->read_till("login:");
//		$telnet->write("ADM043\r\n");
//		$telnet->read_till("password:");
//		$telnet->write("XXXXXX\r\n");//enter your password
//		$telnet->read_till(":>");
//		$telnet->write("tso exec REXX.CLIST\r\n");//tso command
//		$telnet->read_till(":>");
//		$telnet->close();
	}
}

