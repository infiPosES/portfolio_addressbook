<?
/*
전화번호부 PHP
lookUp.php
작성자: 김은숙
작성일: 20-03-18
수정일: 20-03-31(htmlspecialchars해결필요함)
*/

include 'connectDB.php';
$getNum = $_GET['num'];
//조회
if(isset($getNum)) {
	$sqlLookUp = "SELECT * FROM `contactBook` where `num`=".$getNum;
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
?>

<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-width=1, user-scalable=no">
		<link rel="stylesheet" href="http://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2|Noto+Sans+KR&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="./css/addAddress.css" type="text/css">
		<title>contentBox :: 연락처 조회</title>
	 	<link rel="shortcut icon" href="./img/fabicon64.ico">
	</head>
	<body>
	<section class="addAddressBox">
		<!--title-->
		<article class="header">
			<p class="headerTitle">연락처 조회</p>
			<i class="xi-close closeBox" id="closeBox"></i>
		</article>
		<!--table-->
		<article class="addressBox">
			<!--이미지-->				
			<div class="userImgBox">
				<img class="userImg" src="./userImg/<?echo $row['imgTempName']?>" alt="<?echo $row['imgName']?>">
			</div>
			<form action="./main.php" method="POST" enctype="multipart/form-data">
			<!--정보값 입력칸-->
			<div class="infoInput">
				<!--이름-->				
				<label for="userName" class="userLabel">이름(Name)</label>
				<input type="text" class="inputUser userName" name="userName" id="userName" placeholder="이름 입력(필수)" required tabindex=1>
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
			<button class="returnBtn" id="returnBtn" tabindex=14>돌아가기</button>
			</form>
		</article>
	</section>
<script>
	document.getElementById('userName').value = "<?echo $row['name'];?>";
	document.getElementById('userPhoneNum').value = "<?echo $row['contact1'];?>";
	document.getElementById('userPhoneNum2').value = "<?echo $row['contact2'];?>";
	document.getElementById('userPhoneNum3').value = "<?echo $row['contact3'];?>";
	document.getElementById('userEmail').value = "<?echo $row['email'];?>";
	document.getElementById('userGroup').value = "<?echo $row['groupName'];?>";
	document.getElementById('userJob').value = "<?echo $row['job'];?>";
	document.getElementById('userSNS').value = "<?echo $row['sns1'];?>";
	document.getElementById('userSNS2').value = "<?echo $row['sns2'];?>";
	document.getElementById('userSNS3').value = "<?echo $row['sns3'];?>";
	document.getElementById('userAddress').value = "<?echo $row['address'];?>";
	document.getElementById('userMemo').value = "<?echo $row['memo'];?>";
	let inputTags = document.getElementsByTagName('input');
	let userMemo = document.getElementById('userMemo').setAttribute('readonly', 'true');
	i=0;
	while(i<inputTags.length) {
		inputTags[i].setAttribute('readonly','true');
		i++;
	}
	this.addEventListener("click", function(e) {
		let returnBtn = document.getElementById('returnBtn');
		let closeBox = document.getElementById('closeBox');
		switch(e.target.id) {
			case "returnBtn":location.href="http://pager.kr/~c10st06/Portfolio/addressbook/main.php"; break;
			case "closeBox":location.href="http://pager.kr/~c10st06/Portfolio/addressbook/main.php"; break;
		}
	});
</script>
</body>
</html>
<?
unset($submit);
mysqli_free_result($resultLookUp);
mysqli_close($conn);
?> 
