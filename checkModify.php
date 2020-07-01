<?
/*
전화번호부 연락처 PHP
checkModify.php
작성자: 김은숙
작성일: 20-03-19
수정일: 20-04-01 알림창 삭제
스크립트 알림 끔.
*/

//쿠키, 세션 확인
session_start();
if(!isset($_SESSION['adminId']) && !isset($_COOKIE['adminId'])) {
	echo "<meta http-equiv='refresh' content='0; url=./main.php'>";
	exit;
}
echo "<link rel=\"shortcut icon\" href=\"./img/fabicon64.ico\">";
include 'connectDB.php';

//수정 - 파일 업로드
$targetDir = "/home/c10st06/public_html/Portfolio/addressbook/userImg/";
$imgName = $targetDir.basename($_FILES['imgUploadBtn']['name']);
$imgFileType = pathinfo($imgName, PATHINFO_EXTENSION);
$targetFileUrl = $targetDir.basename($_FILES['imgUploadBtn']['tmp_name']).".".$imgFileType;
$tmpName = basename($_FILES['imgUploadBtn']['tmp_name']).".".$imgFileType;
$uploadOk = 1;
//이미지 업로드
if(isset($_POST["submit"])) {
	$userName = $_POST['userName'];
        $userPhoneNum =  $_POST['userPhoneNum'];
        $userPhoneNum2 = $_POST['userPhoneNum2'];
        $userPhoneNum3 = $_POST['userPhoneNum3'];
        $userEmail = $_POST['userEmail'];
        $userGroup = $_POST['userGroup'];
        $userJob = $_POST['userJob'];
        $userSNS = $_POST['userSNS'];
        $userSNS2 = $_POST['userSNS2'];
        $userSNS3 = $_POST['userSNS3'];
        $userAddress = $_POST['userAddress'];
        $userMemo = $_POST['userMemo'];

	if($_FILES['imgUploadBtn']['name']!="") {
		$check = getimagesize($_FILES['imgUploadBtn']['tmp_name']);
		//이미지 맞는지 아닌지
		if($check !== false) {
			//echo  "<script> alert('이미지 파일입니다.".$check["mime"]."');</script>";
			$uploadOk = 1;
		}else {
			//echo "<script> alert('이미지 파일이 아닙니다.');history.back();</script>";
			$uploadOk = 0;
		}
		//이미지 이미 있는지
		if(file_exists ($targetFileUrl)) {
			//echo "<scirpt> alert('해당 이미지가 이미 존재합니다.');.history.back();</script>";
			$uploadOk = 0;
		}
		//이미지 사이즈
		if ($_FILES['imgUploadBtn']['size'] > 1000000) {
			//echo "<scirpt> alert('해당 이미지가 너무 큽니다. (1000MB 제한).');.history.back();</script>";
			$uploadOk = 0;
		}
		//파일 확장자 검사
		if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif" ) {
			//echo "<script>alert('JPG, JPEG, PNG , GIF 파일 확장자만 가능합니다.').history.back();</script>";
			$uploadOk = 0;
		}
		//업로드 안되면
		if($uploadOk == 0) {
			//echo "<scirpt> alert('업로드 실패')history.back();</script>";
		}
		//업로드 구간
		else {
			if(!move_uploaded_file($_FILES["imgUploadBtn"]["tmp_name"], $targetFileUrl)) {
				//echo "<scirpt> alert('업로드 실패').history.back();</script>";
			}
		//수정 - 저장(이미지 새로 업로드)
		$sqlModify = "UPDATE `contactBook` SET name= '" .$userName. "',contact1='" .$userPhoneNum. "',contact2='" .$userPhoneNum2. "',contact3='" . $userPhoneNum3 . "',email='" . $userEmail . "',groupName='" . $userGroup . "',imgTempName='" . $tmpName ."',imgName='" . $imgName ."',job='" . $userJob . "',sns1='" . $userSNS . "',sns2='" . $userSNS2 . "',sns3='" . $userSNS3 . "',address='" . $userAddress . "',memo='" . $userMemo . "' WHERE num=".$_GET['num'];
		}
	}
	else {
		//수정 - 저장(이미지 업로드 X)
		$sqlModify = "UPDATE `contactBook` SET name= '" .$userName. "',contact1='" .$userPhoneNum. "',contact2='" .$userPhoneNum2. "',contact3='" . $userPhoneNum3 . "',email='" . $userEmail . "',groupName='" . $userGroup . "',job='" . $userJob . "',sns1='" . $userSNS . "',sns2='" . $userSNS2 . "',sns3='" . $userSNS3 . "',address='" . $userAddress . "',memo='" . $userMemo . "' WHERE num=".$_GET['num'];
	}
	$resultModify = mysqli_query($conn,$sqlModify);
	if(!$resultModify) {
		echo "Could not successfully run query ($sqlModify) from DB:".mysqli_error($conn);
		exit;
	} else {
		echo "<meta http-equiv='refresh' content='0; url=./main.php'>";
	}
}else {	
	echo "<meta http-equiv='refresh' content='0; url=./main.php'>";
}
?>
