<?
/*
전화번호부 PHP
alertBox.php
작성자: 김은숙
작성일: 20-03-19
수정일: 20-03-20
*/

//쿠키, 세션 확인
if(isset($_cookie['adminId'])) {
	session_start();
	if(!isset($_SESSION['adminId']) && !isset($_COOKIE['adminId'])) {
		echo "<meta http-equiv='refresh' content='0; url=./main.php'>";
		exit;
	}
}
?>
<!--안내창-->
<!doctype html>
<!--
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
		<title>ContactBox :: 연락처 삭제</title>
 		<link rel="shortcut icon" href="./img/fabicon64.ico">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2|Noto+Sans+KR&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
		<link rel="stylesheet" href="./css/alertBox.css" type="text/css">
	</head>	
	<body>
-->
		<!--확인 박스-->
		<div class="alertBox" id="alertBox">
			<p class="alertNofi" id="alertNofi"></p>
			<input id="alertCheckBtn" class="alertCheckBtn" type="button" value="확인" tabindex="1">
		</div>
<!--
	</body>
</html>
-->
