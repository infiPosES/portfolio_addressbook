<?
/*
전화번호부 PHP
checkLogin.php
작성자: 김은숙
작성일: 20-03-18
수정일: 20-03-18 (.2)
*/
echo "<link rel=\"shortcut icon\" href=\"./img/fabicon64.ico\">";
include 'connectDB.php';
$sqlPw = "SELECT * FROM `contactBook` WHERE `name`='김은숙'";
$resultPw = mysqli_query($conn, $sqlPw);
if(!$resultPw) {
	echo "Could not successfully run query ($sqlPw) from DB: ".mysqli_error($conn);
	exit;
}
$row = mysqli_fetch_assoc($resultPw);
$adminID = $row['adminID'];
$adminPW = $row['adminPW'];
$adminId = $_POST['adminId'];
$adminPw = md5($_POST['adminPw']);
if(isset($_POST['submit'])){
	//로그인 성공
	if($adminID == $adminId && $adminPW == $adminPw) {
		session_start();
		setcookie('adminId', $adminId);
		$_SESSION['adminId'] = "admin";
		echo "<script>location.href='main.php';</script>";
	}
	//실패
	else {
		session_start();
		session_destroy();
		setcookie('adminId');
		echo "<script>location.href='adminLogin.php';</script>";

	}
}
//로그아웃 시
else {
	session_start();
	session_destroy();
        setcookie('adminId');
	echo "<script>location.href='main.php';</script>";
}
?>

