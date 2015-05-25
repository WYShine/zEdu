<?php namespace App\Services;

class FTP{
	var $conn_id = null;
	$ftp_server="10.60.43.6:23";//指定ftp服务器
	$ftp_uid="adm035";//指定登陆用户名
	$ftp_pwd="dfdf";//指定登陆密码
	$local_file="log"; //指定你下载到本地的文件的文件名
	$server_file = "'ZCLOUD.OUTPUT.MSGFILE(C001)'"

	function __construct($id){
		$server_file = "'ZCLOUD.OUTPUT.MSGFILE(" . $id . ")'";
		$conn_id=ftp_connect($ftp_server);//连接ftp服务器 用ftp_connet()函数\
		$ftp_result=ftp_login($conn_id,$ftp_uid,$ftp_pwd);//登陆ftp服务器 用ftp_connet()函数
		if (ftp_get($conn_id, $local_file, $server_file, FTP_ASCII))//从服务器下载文件 用ftp_get()函数
		{
		echo "Succeed! \n";
		} 
		else {
		echo "There was a problem\n";
		}
		ftp_close($conn_id); //断开ftp服务器连接
	}
	function getLog(){
		return $lines = file($local_file);
	}
}

?>



$lines=file($local_file); //读取下载到本地的文件 
foreach($lines as $weather)
{
echo"<tr>";
$attr=explode(",",$weather);
foreach($attr as $value)
{
echo "<td align="center">".$value."</td> ";
}
echo "</tr>";
}
