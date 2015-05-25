<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Services\Telnet;
use App\Services\FTP;

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
					'nav_title' => "Uninstall CICS"
					]);
			}
			if($_GET['type'] == 'iDB2'){
				return view('admin/demonstration/installDB2', [
					'nav_title' => "Install DB2"
					]);
			}
			if($_GET['type'] == 'uDB2'){
				return view('admin/demonstration/uninstallDB2', [
					'nav_title' => "Uninstall DB2"
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
		$telnet = $this->getTelnet();
		$telnet->write("tso exec \"'ZCLOUD.CICS.REXX(CIINSTM) '\" \"'". $CICS_id. "'\" \r\n");
		$telnet->close();
		$ftp = new FTP($CICS_id);
		$logs = $ftp->getLog();
		return view('admin/demonstration/showLogs', [
					'nav_title' => "Show Logs",
					'logs'    =>  $logs;
					]);
	}



	protected function uninstallCICS($CICS_id){
		$telnet = $this->getTelnet();
		$telnet->write("tso exec \"'ZCLOUD.CICS.REXX(CIUNINM) '\" \"'". $CICS_id. "'\" \r\n");
		$telnet->close();
		$ftp = new FTP($CICS_id);
		$logs = $ftp->getLog();
		return view('admin/demonstration/showLogs', [
					'nav_title' => "Show Logs",
					'logs'    =>  $logs;
					]);
	}

	protected function installDB2($DB2_id){
		$telnet = $this->getTelnet();
		$telnet->write("tso exec \"'ZCLOUD.DB2.REXX(@AAAA) '\" \"'". $DB2_id. "'\" \r\n");
		$telnet->close();
		$ftp = new FTP($DB2_id);
		$logs = $ftp->getLog();
		return view('admin/demonstration/showLogs', [
					'nav_title' => "Show Logs",
					'logs'    =>  $logs;
					]);
	}

	protected function uninstallDB2($DB2_id){
		$telnet = $this->getTelnet();
		$telnet->write("tso exec \"'ZCLOUD.DB2.REXX(师太还没告诉我) '\" \"'". $DB2_id. "'\" \r\n");
		$telnet->close();
		$ftp = new FTP($DB2_id);
		$logs = $ftp->getLog();
		return view('admin/demonstration/showLogs', [
					'nav_title' => "Show Logs",
					'logs'    =>  $logs;
					]);
	}

	protected function getTelnet(){
		$telnet = new Telnet("10.60.43.6",23);
		echo $telnet->read_till("login:");
		$telnet->write("ADM035\r\n");
		echo $telnet->read_till("password:");
		$telnet->write("dfdf\r\n");//enter your password
		echo $telnet->read_till(":>");
	}
}
