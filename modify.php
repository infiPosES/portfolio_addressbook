<?
/*
전화번호부 PHP
modify.php
작성자: 김은숙
작성일: 20-03-18
수정일: 20-03-28(.2)
*/

//쿠키, 세션 확인
session_start();
if(!isset($_SESSION['adminId']) && !isset($_COOKIE['adminId'])) {
	echo "<meta http-equiv='refresh' content='0; url=./main.php'>";
	exit;
}
include 'connectDB.php';

//조회
if(isset($_GET['num'])) {
	$sqlLookUp = "SELECT * FROM `contactBook` where `num`={$_GET['num']}";
	$resultLookUp = mysqli_query($conn,$sqlLookUp);
	if(!$resultLookUp) {
		echo "Could not successfully run query ($sqlLookUp) from DB:".mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($resultLookUp)==0) {
		echo "No rows found, nothing to print so am exiting.";
		exit;
	}
	$row = mysqli_fetch_assoc($resultLookUp);
}
$num = $_GET['num'];
?>
<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-width=1, userscalable=no">
		<link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2|Noto+Sans+KR&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="./css/addAddress.css" type="text/css">
		<title>contentBox :: 연락처 수정</title>
 		<link rel="shortcut icon" href="./img/fabicon64.ico">
<?      
	echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>";
	echo "<script src=\"./js/addAddress.js\"></script>";
?>
</head>
	<body>
	<section class="addAddressBox" id="addAddressBox">
		<!--title-->
		<article class="header">
			<p class="headerTitle">연락처 수정</p>
			<i class="xi-close closeBox" id="closeBox"></i>
		</article>
		<!--table-->
		<article class="addressBox">
		<form action="./checkModify.php?num=<?echo $num;?>" method="POST" enctype="multipart/form-data">
				<!--이미지-->				
				<div class="userImgBox">
					<img class="userImg" id="userImg" src="./userImg/<?echo $row['imgTempName']?>" alt="<?echo $row['imgName']?>">
					<label for="imgUploadBtn" class="imgLabel">이미지 업로드</label>
					<input type="file" class="imgUploadBtn" name="imgUploadBtn" id="imgUploadBtn" tabindex=13>
				</div>
				<!--정보값 입력칸-->
				<div class="infoInput">
					<!--이름-->				
					<label for="userName" class="userLabel">이름(Name)</label>
					<input type="text" class="inputUser userName" name="userName" id="userName" placeholder="이름 입력(필수)" required autofocus tabindex=1>
					<!--연락처(필수)-->				
					<label for="userPhoneNum" class="userLabel">핸드폰(Contact)</label>
					<input type="text" class="inputUser phoneNum" name="userPhoneNum" id="userPhoneNum" placeholder="연락처 입력(필수)" required tabindex=2>
					<input type="text" class="inputUser phoneNum2" name="userPhoneNum2" id="userPhoneNum2" placeholder="연락처" tabindex=3>
					<input type="text" class="inputUser phoneNum3" name="userPhoneNum3" id="userPhoneNum3" placeholder="연락처" tabindex=4>
					<p class="writeTip">* 최대 3개까지 등록 가능합니다.</p>
					<!--이메일-->				
					<label for="userEmail" class="userLabel">E-mail</label>
					<input type="email" class="inputUser userEmail" name="userEmail" id="userEmail" placeholder="sample@sample.com" tabindex=5>
					<!--그룹-->				
					<label for="userGroup" class="userLabel">그룹</label>
					<input type="text" class="inputUser userGroup" name="userGroup" id="userGroup" placeholder="그룹명 입력" tabindex=6>
					<!--직업-->				
					<label for="userJob" class="userLabel">직장/소속</label>
					<input type="text" class="inputUser userJob" name="userJob" id="userJob" placeholder="직장/소속 입력" tabindex=7>
					<!--메신저, SNS-->				
					<label for="userSNS" class="userLabel">메신저/SNS</label>
					<input type="text" class="inputUser userSNS" name="userSNS" id="userSNS" placeholder="SNS(instagram, facebook.. 등)" tabindex=8>
					<input type="text" class="inputUser userSNS2" name="userSNS2" id="userSNS2" placeholder="SNS(instagram, facebook.. 등)" tabindex=9>
					<input type="text" class="inputUser userSNS3" name="userSNS3" id="userSNS3" placeholder="SNS(instagram, facebook.. 등)" tabindex=10>
					<p class="writeTip">* 최대 3개까지 등록 가능합니다.</p>
					<!--주소-->				
					<label for="userAddress" class="userLabel">주소</label>
					<input type="text" class="inputUser userAddress" name="userAddress" id="userAddress" placeholder="주소" tabindex=11>
					<!--메모-->				
					<p class="userLabel">메모</p>
					<textarea name="userMemo" id="userMemo" class="userMemo" placeholder="메모" tabindex=12></textarea> 
					</div>
					<div class="btnBox">
						<button class="btn cancelBtn" id="cancelBtn" name="cancelBtn" tabindex=15>취소</button> 
						<input type="submit" class="btn saveBtn" id="saveBtn" name="submit" tabindex=14 value="저장">
					</div>
			</form>
		</article>
	</section>
	<!--alertBox-->
	<? include "./alertBox.php"; ?>
	<!--alertBox end-->

<script>
<?
echo	"document.getElementById('userName').value = '".$row['name']."';";
echo	"document.getElementById('userPhoneNum').value = '".$row['contact1']."';";
echo	"document.getElementById('userPhoneNum2').value = '".$row['contact2']."';";
echo	"document.getElementById('userPhoneNum3').value = '".$row['contact3']."';";
echo	"document.getElementById('userEmail').value = '".$row['email']."';";
echo	"document.getElementById('userGroup').value = '".$row['groupName']."';";
echo	"document.getElementById('userJob').value = '".$row['job']."';";
echo	"document.getElementById('userSNS').value = '".$row['sns1']."';";
echo	"document.getElementById('userSNS2').value = '".$row['sns2']."';";
echo	"document.getElementById('userSNS3').value = '".$row['sns3']."';";
echo	"document.getElementById('userAddress').value = '".$row['address']."';";
echo	"document.getElementById('userMemo').value = '".$row['memo']."';";
?>
</script>
</body>
</html>

<?
mysqli_close($conn);
?> 
