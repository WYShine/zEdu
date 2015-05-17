<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Telnet;
use App\Zaccount;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class Account extends Controller {
	public function store($userId) {
		try {
			$account = Zaccount::where("state", "=", "available")->firstOrFail();
			$account->state = "using";
			$account->user_id = $userId;
			$account->save();
			$user = User::find($userId);
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

