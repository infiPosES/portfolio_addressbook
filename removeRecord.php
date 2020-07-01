<?
/*
전화번호부 PHP
removeRecord.php
작성자: 김은숙
작성일: 20-03-19
수정일: 20-03-20
*/

//쿠키, 세션 확인
session_start();
if(!isset($_SESSION['adminId']) && !isset($_COOKIE['adminId'])) {
	echo "<meta http-equiv='refresh' content='0; url=./main.php'>";
	exit;
}
include 'connectDB.php';
?>
<!--안내창-->
<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no">
		<title>ContactBox :: 연락처 삭제</title>
 		<link rel="shortcut icon" href="./img/fabicon64.ico">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2|Noto+Sans+KR&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
		<link rel="stylesheet" href="./css/removeRecord.css" type="text/css">
	</head>	
	<body>
		<!--삭제 확인 박스-->
		<div class="alertBox" id="alertBox">삭제하시겠습니까?
			<div class="buttonBox">
			<form action = "./removeRecord.php?num=<? echo $_GET['num'] ?>" method="POST">
				<button class="alertBtn cancelBtn" id="cancelBtn" name="cancelBtn" tabindex=1>취소</button>
				<button class="alertBtn removeBtn" id="removeBtn" name="removeBtn" tabindex=2>삭제</button>
			</form>
			</div>
		</div>
<?
if(isset($_POST['cancelBtn'])) {
	//취소 시
	echo "<script>alertBox.innerHTML = '삭제가 취소되었습니다.'; location.href=\"./main.php\";</script>";
}
if(isset($_POST['removeBtn'])){
	//삭제 실행
	$sqlRemove = "DELETE FROM `contactBook` WHERE num={$_GET['num']}";
	$result = mysqli_query($conn, $sqlRemove);
	echo "<script>alertBox.innerHTML = '삭제 되었습니다.';location.href=\"./main.php\";</script>";
	if(!$result) {
		echo "Could not successfully run query ($sqlRemove) from DB : ".mysqli_error($conn);
	exit;
	}
}
?>
</body>
</html>
<? mysqli_close($conn); ?>
