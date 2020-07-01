<?
/*
전화번호부 PHP
imgDownload.php
작성자: 김은숙
작성일: 20-03-18
수정일: 20-03-23
*/
include "./connectDB.php";
$sql = "SELECT * FROM `contactBook` WHERE `num`={$_GET['num']}";
$result = mysqli_query($conn, $sql);
if(!$result) {
	echo "Could not successfully run query ($sql) from DB: ".mysqli_error($conn);
	exit;
}
if(isset($_POST['downloadImg'])){
	function mb_basename($path) {return end(explode('/', $path));}
	function utf2euc($str) {return iconv("UTF-8", "cp949//IGNORE",$str);}
	function is_ie() {
	if(!isset($_SERVER['HTTP_USER_AGENT'])) return false;
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false) return true;
	if(strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 6.1')!== false) return true;
	return false;
	}
	$row = mysqli_fetch_assoc($result);
	$filepath = '/home/c10st06/public_html/Portfolio/addressbook/userImg/'.$row['imgTempName'];
	$filesize = filesize($filepath);
	$filename = mb_basename($filepath);
	//echo $filename."<br>";
	//echo $row['imgTempName'];
	//if( is_ie() ) $filename = utf2euc($row['imgTempName']);
	if( is_ie() ) $filename = utf2euc($filename);
	header("Pragma: public");
	header("Expires: 0");
	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename=\"{$row['imgTempName']}\"");
	//header("Content-Disposition: attachment; filename=\"$filename'\"");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: $filesize");
	readfile($filepath); 
}
?>
