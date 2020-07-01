<?
/*
전화번호부 연락처 추가 PHP
addAddress.php
작성자: 김은숙
작성일: 20-03-12
수정일: 20-04-01 
*/

//쿠키, 세션 확인
session_start();
if(!isset($_SESSION['adminId']) && !isset($_COOKIE['adminId'])) {
	echo "<meta http-equiv='refresh' content='0; url=./main.php'/>";
	exit;
}
include "./connectDB.php";
//파일업로드
$targetDir = "/home/c10st06/public_html/Portfolio/addressbook/userImg/";
@$imgNameAll = $targetDir.basename($_FILES['imgUploadBtn']['name']);
@$imgName = basename($_FILES['imgUploadBtn']['name']);
$imgFileType = pathinfo($imgNameAll, PATHINFO_EXTENSION);
@$targetFileUrl = $targetDir.basename($_FILES['imgUploadBtn']['tmp_name']).".".$imgFileType;
@$tmpName = basename($_FILES['imgUploadBtn']['tmp_name']).".".$imgFileType;
$uploadOk = 1;
@$submitAdd = $_POST["submitAdd"];	
?>
<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, inintial-width=1 user-scalable=no"/>
		<link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css"/>
		<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2|Noto+Sans+KR&display=swap" rel="stylesheet"/>
		<link rel="stylesheet" href="./css/addAddress.css" type="text/css"/>
		<link rel="shortcut icon" href="./img/fabicon64.ico"/>
		<title>contentBox :: 연락처 추가</title>
	<?	echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>";
		echo "<script src=\"./js/addAddress.js\"></script>"; 
	?>
	</head>
	<body>
		<!--addAddressBox-->
		<section class="addAddressBox">		
			<!--title-->
			<article class="header">
				<p class="headerTitle">연락처 추가</p>
				<i class="xi-close closeBox" id="closeBox"></i>
			</article>
			<!--title end-->
			<!--table-->
			<article class="addressBox">
				<!--addAddress form-->
				<form action="./addAddress.php" method="POST" enctype="multipart/form-data" name="addAddressForm" id="addAddressForm">
					<!--이미지-->				
					<div class="userImgBox">
						<img class="userImg" id="userImg" src="./img/user.png" alt="기본이미지"/>
						<label for="imgUploadBtn" class="imgLabel">이미지 업로드</label>
						<input type="file" class="imgUploadBtn" id="imgUploadBtn" name="imgUploadBtn" tabindex=13 />
					</div>
					<!--이미지 end-->				
					<!--정보값 입력-->
					<div class="infoInput">
						<!--이름-->				
						<label for="userName" class="userLabel"> <i class="xi-lightbulb-o requiredIcon"></i> 이름(Name)</label>
						<input type="text" class="inputUser userName" name="userName" id="userName" placeholder="이름(필수)" required autofocus tabindex=1 />
						<!--이름 end-->				
						<!--연락처-->				
						<label for="userPhoneNum" class="userLabel"> <i class="xi-lightbulb-o requiredIcon"></i> 연락처1(Phone Number)</label> <!--필수값-->
						<input type="text" class="inputUser phoneNum" name="userPhoneNum" id="userPhoneNum" placeholder="연락처1(필수) 구분자 없이 입력하세요. (예:01012345678)" required tabindex=2 />
						<label for="userPhoneNum2" class="userLabel">연락처2(Phone Number)</label>
						<input type="text" class="inputUser phoneNum2" name="userPhoneNum2" id="userPhoneNum2" placeholder="연락처2" tabindex=3 />
						<label for="userPhoneNum3" class="userLabel">연락처3(Phone Number)</label>
						<input type="text" class="inputUser phoneNum3" name="userPhoneNum3" id="userPhoneNum3" placeholder="연락처3" tabindex=4 />
						<p class="writeTip">* 최대 3개까지 등록 가능합니다.</p>
						<!--연락처 end-->
						<!--이메일-->				
						<label for="userEmail" class="userLabel">E-mail</label>
						<input type="email" class="inputUser userEmail" name="userEmail" id="userEmail" placeholder="sample@sample.com" tabindex=5 />
						<!--이메일 end-->				
						<!--그룹-->				
						<label for="userGroup" class="userLabel">그룹</label>
						<input type="text" class="inputUser userGroup" name="userGroup" id="userGroup" placeholder="그룹명 입력" tabindex=6 />
						<!--그룹 end-->				
						<!--직업-->				
						<label for="userJob" class="userLabel">직장/소속</label>
						<input type="text" class="inputUser userJob" name="userJob" id="userJob" placeholder="직장/소속 입력" tabindex=7 />
						<!--직업 end-->				
						<!--메신저, SNS-->				
						<label for="userSNS" class="userLabel">메신저/SNS</label>
						<input type="text" class="inputUser userSNS" name="userSNS" id="userSNS" placeholder="SNS(instagram, facebook.. 등)" tabindex=8 />
						<input type="text" class="inputUser userSNS2" name="userSNS2" id="userSNS2" placeholder="SNS(instagram, facebook.. 등)" tabindex=9 />
						<input type="text" class="inputUser userSNS3" name="userSNS3" id="userSNS3" placeholder="SNS(instagram, facebook.. 등)" tabindex=10 />
						<p class="writeTip">* 최대 3개까지 등록 가능합니다.</p>
						<!--메신저, SNS end-->				
						<!--주소-->				
						<label for="userAddress" class="userLabel">주소</label>
						<input type="text" class="inputUser userAddress" name="userAddress" id="userAddress" placeholder="주소 입력" tabindex=11 />
						<!--주소 end-->				
						<!--메모-->				
						<p class="userLabel">메모</p>
						<textarea name="userMemo" id="userMemo" class="userMemo" placeholder="메모 입력" tabindex=12></textarea> 
						<!--메모 end-->
										
					</div>
					<!--정보값 입력칸 end-->
					<!--cancelBtn, saveBtn-->				
					<div class="btnBox">
						<button class="btn cancelBtn" id="cancelBtn" name="cancelBtn" tabindex=15>취소</button>
						<input type="submit" id="submitAdd" name="submitAdd" class="btn saveBtn" tabindex=14 value="저장"/>
					</div>
					<!--cancelBtn, saveBtn end-->
				</form>
				<!--addAddress form end-->
			</article>
			<!--table end-->
		</section>
		<!--addAddressBox end-->
<? 
echo <<<htmlCode
		<div class="alertBox" id="alertBox">
			<p class="alertNofi" id="alertNofi"></p>
			<input id="alertCheckBtn" class="alertCheckBtn" type="button" value="확인" tabindex="1">
		</div>
		<script>
			let alertBox = document.getElementById('alertBox');
			let alertNofi = document.getElementById('alertNofi');
			let alertCheckBtn = document.getElementById('alertCheckBtn');
			alertCheckBtn.addEventListener('click', function() {
				alertBox.style.visibility = "hidden";
			});
		</script>
	</body>
</html>
htmlCode;
if(isset($submitAdd)) {
	$userName = $_POST['userName'];
	$userPhoneNum =  $_POST['userPhoneNum'];
	$userPhoneNum2 = $_POST['userPhoneNum2'];
	$userPhoneNum3 = $_POST['userPhoneNum3'];
	$userEmail = $_POST['userEmail'];
	$userGroup = $_POST['userGroup'];
	$userJob =  $_POST['userJob'];
	$userSNS =  $_POST['userSNS'];
	$userSNS2 = $_POST['userSNS2'];
	$userSNS3 = $_POST['userSNS3'];
	$userAddress = $_POST['userAddress'];
	$userMemo = $_POST['userMemo'];

	//파일업로드 이어서
	if($_FILES['imgUploadBtn']['name']!="") {
		$check = getimagesize($_FILES['imgUploadBtn']['tmp_name']);
		//이미지 맞는지 아닌지
		if($check !== false) {
			$uploadOk = 1;
		}else {
			echo "이미지 파일이 아닙니다.";
			$uploadOk = 0;
		}
		//이미지 이미 있는지
		if(file_exists ($targetFileUrl)) {
			echo "해당 이미지가 이미 존재합니다.";
			$uploadOk = 0;
		}
		//이미지 사이즈
		if ($_FILES['imgUploadBtn']['size'] > 1000000) {
			echo "해당 이미지가 너무 큽니다.";
			$uploadOk = 0;	
		}
		//파일 확장자 검사
		if($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif" ) {
			
			echo "jpg, png, gif파일 확장자만 업로드 가능합니다.";
			$uploadOk = 0;
		}
		//업로드 안되면
		if($uploadOk == 0) {
			echo "업로드 실패";
		}
		//업로드 구간
		else {
			if(!move_uploaded_file($_FILES["imgUploadBtn"]["tmp_name"], $targetFileUrl)) {
				echo "이미지 파일이 아닙니다.";
			}
		}
				//이미지 등록 시 저장
		$sql = "INSERT INTO `contactBook`(`name`, `contact1`,`contact2`,`contact3`,`email`,`groupName`,`imgTempName`,`imgName`,`job`,`sns1`,`sns2`,`sns3`,`address`,`memo`) VALUES (" . "'" . $userName . "','" . $userPhoneNum . "','" . $userPhoneNum2 . "','" . $userPhoneNum3 . "','" . $userEmail . "','" . $userGroup . "','". $tmpName ."','" . $imgName ."','" . $userJob . "','" . $userSNS . "','" . $userSNS2 . "','" . $userSNS3 . "','" . $userAddress . "','" . $userMemo . "')";
	}
		//이미지 등록 없을 시 저장
	else {
		$sql = "INSERT INTO `contactBook`(`name`, `contact1`,`contact2`,`contact3`,`email`,`groupName`,`imgTempName`,`job`,`sns1`,`sns2`,`sns3`,`address`,`memo`) VALUES (" . "'" . $userName . "','" . $userPhoneNum . "','" . $userPhoneNum2 . "','" . $userPhoneNum3 . "','" . $userEmail. "','" . $userGroup . "','user.png','". $userJob . "','" . $userSNS . "','" . $userSNS2 . "','" . $userSNS3 . "','" . $userAddress . "','" . $userMemo . "')";
	}
	$result = mysqli_query($conn,$sql);
	//취소 버튼 클릭시
	if(!isset($_POST['cancelBtn'])) {
		echo "<meta http-equiv='refresh' content='0; url=./main.php'>";
	}
	else{
		if(!$result) {
			echo "Could not successfully run query ($sql) from DB:".mysqli_error($conn);
			exit;
		} else {
			unset($submitAdd);
			mysqli_close($conn);
			echo "<meta http-equiv='refresh' content='0; url=./main.php'>";
		}
	}
}
?>

