<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\Telnet;

use Illuminate\Http\Request;

class DemoController extends Controller {

	public function index(){
		$nav_title = "Demonstration";

		return view('admin/demonstration/index', [
            'nav_title' => $nav_title
        ]);
	}

	public function create(){
		if(isset($_GET['type'])){
			if($_GET['type'] == 'iCICS'){
				return view('admin/demonstration/installCICS', [
					'nav_title' => "Install CICS"
					]);
			}
			if($_GET['type'] == 'uCICS'){
				return view('admin/demonstration/uninstallCICS', [
					'nav_title' => "Install CICS"
					]);
			}
			if($_GET['type'] == 'iDB2'){
				return view('admin/demonstration/installDB2', [
					'nav_title' => "Install CICS"
					]);
			}
			if($_GET['type'] == 'uDB2'){
				return view('admin/demonstration/uninstallDB2', [
					'nav_title' => "Install CICS"
					]);
			}
		}
	}

	public function store(){
		$type = \Request::input('type');
		switch ($type) {
			case 'iCICS':
				$this->installCICS(\Request::input('CICS_id'));
				break;

			case 'uCICS':
				$this->uninstallCICS(\Request::input('CICS_id'));
				break;

			case 'iDB2':
				$this->installDB2(\Request::input('DB2_id'));
				break;

			case 'uDB2':
				$this->uninstallDB2(\Request::input('DB2_id'));
				break;
		}
	}

	protected function installCICS($CICS_id){

		$telnet = new Telnet("10.60.43.6",23);
		echo $telnet->read_till("login:");
		$telnet->write("ADM035\r\n");
		echo $telnet->read_till("password:");
		$telnet->write("dfdf\r\n");//enter your password
		echo $telnet->read_till(":>");
		$telnet->write("tso exec \"'ZCLOUD.CICS.REXX(CIINSTM)'\"\r\n");//tso command
		echo $telnet->read_till(":>");
		
		// ob_end_clean();  
		// ob_implicit_flush(1);  
		// while(1){  
		// 	$log = $telnet->read_till("\r\n");
		//     //部分浏览器需要内容达到一定长度了才输出  
		//     echo $log; 
		//     sleep(1);  
		//     //ob_end_flush();  
		//     //ob_flush();  
		//     //flush();  
		// }
		$telnet->close();
	}

	protected function uninstallCICS($CICS_id){
		echo $CICS_id;
	}

	protected function installDB2($DB2_id){
		echo $DB2_id;
	}

	protected function uninstallDB2($DB2_id){
		echo $DB2_id;
	}
}
