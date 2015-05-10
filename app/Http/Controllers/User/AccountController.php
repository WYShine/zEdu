<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Telnet;

class Account extends Controller {
	public function store($userId) {
		
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

