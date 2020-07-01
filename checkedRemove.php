<?
/*
전화번호부 PHP
checkedRemove.php
작성자: 김은숙
작성일: 20-03-23
수정일: 20-03-23
*/

//쿠키, 세션 확인
session_start();
if(!isset($_SESSION['adminId']) && !isset($_COOKIE['adminId'])) {
	echo "<meta http-equiv='refresh' content='0; url=./main.php' />";
	exit;
}
echo "<link rel=\"shortcut icon\" href=\"./img/fabicon64.ico\" />";
include 'connectDB.php';
$sql = "SELECT * FROM `contactBook`";
$result = mysqli_query($conn, $sql);
//에러검출시
if(!$result){
	echo "Could not successfully run query ($sql) from DB: ".mysqli_error($conn);
	exit;
}
if(mysqli_num_rows($result) == 0){
	echo "No rows found, nothing to print so am exiting";
	exit;
}
//삭제 실행
if(isset($_POST['removeBtn'])) {
	while($row = mysqli_fetch_assoc($result)) {
		if(@$chkVal = $_POST["chk".$row['num']]=="on") {
			$sqlRemove = "DELETE FROM `contactBook` WHERE num=".(int)$row['num'];
	        	$resultRemove = mysqli_query($conn, $sqlRemove);
        		if(!$resultRemove) {
        			echo "Could not successfully run query ($sqlRemove) from DB : ".mysqli_error($conn);
        			exit;
			}
		}
	}
	echo "<meta http-equiv='refresh' content='0; url=./main.php '/>"; 
}
mysqli_free_result($result);
mysqli_close($conn); 
?>
