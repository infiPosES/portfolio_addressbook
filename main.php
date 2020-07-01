<?
/*
전화번호부 PHP
main.php
작성자: 김은숙
작성일: 20-03-12
수정일: 20-03-29(선택삭제 알림창 추가)
 */
include "./connectDB.php";
$sql = "SELECT * FROM `contactBook`";
$result = mysqli_query($conn, $sql);
if(!$result) {
        echo "Could not successfully run query ($sql) from DB: ".mysqli_error($conn);
	exit;
}
session_start();
?>

<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no" />
		<title>ContactBox :: 연락처</title>
		<link rel="shortcut icon" href="./img/fabicon64.ico" />
		<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2|Noto+Sans+KR&display=swap" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css" />
		<link rel="stylesheet" href="./css/main.css" type="text/css" />
		<link rel="stylesheet" href="./css/removeRecord.css" type="text/css">
<?	
echo	"<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script>";
echo	"<script src=\"./js/main.js\"></script>";
?>
	</head>
	<body>
	<!--Portfolio 알림-->
	<div class="portfolioAlert" id="portfolioAlert">
		이 사이트는 포트폴리오용으로 제작되었습니다.<i class="xi-close" id="xiClose"></i>
	</div>
	<!--Portfolio 알림 end-->
	<!--header-->
	<header class="headerWrap" id="headerWrap">
		<img src="./img/logo1.png" alt="Contact Box" class="logo" id="logo" />
<? 	
if(isset($_SESSION['adminId']) && isset($_COOKIE['adminId'])) {
	echo "<div class=\"adminLogin\" id=\"adminLogin\">안녕하세요. {$_SESSION['adminId']}님 <a class=\"logout\" href=\"./adminLogout.php\">로그아웃</a></div>";	
	}	
else {
	echo "<div class=\"adminLogin\" id=\"adminLogin\"><a class=\"anchorLogin\" href=\"./adminLogin.php\">관리자 로그인</a></div>";
	}
?>
	</header>
	<!--header end-->
				<section id="wrap" class="wrap">
			<!--연락처 검색-->
			<article class="searchBox">
				<input type="text" name="searchContact" id="searchContact" class="searchContact" plasceholder="검색할 연락처를 입력하세요.">
				<i class="xi-search searchIcon"></i>
			</article>
			<!--연락처 검색 end-->
<?	if(isset($_SESSION['adminId']) && isset($_COOKIE['adminId'])) {
		echo "<ul class=\"adminMenu\"><li class=\"adminMenuBtn userUpdate\" id=\"userUpdate\">연락처 추가</li><li class=\"adminMenuBtn checkRemove\" id=\"checkRemove\">선택 삭제</li></ul>";}	 ?>
			<!--연락처 리스트-->
			<ul class="contactList">
				<!--연락처 리스트 제목-->
				<li class="tableTitle">
					<div class="userInfo userNameT">이름</div>
						<div class="userInfo userContactT">연락처</div>
						<div class="userInfo userEmailT">이메일</div>
						<div class="userInfo userGroupT">그룹</div>
						<div class="userInfo userJobT">직장</div>
<?	//전체선택, 해제
	if(isset($_SESSION['adminId']) && isset($_COOKIE['adminId'])) {
		echo "<input type=\"checkbox\" class=\"info checkAllT\" id=\"checkAll\" name=\"chkAll\" >";
	}	
?>
				</li>
				<!--연락처 리스트 제목 end-->
<?
	//form
	echo	"<form name=\"checkedRemove\" action=\"./checkedRemove.php\" method=\"POST\">";
		while($row = mysqli_fetch_assoc($result)) {
			if(isset($_SESSION['adminId']) && isset($_COOKIE['adminId'])) {
				//관리자 삭제 방지 javascript
				echo "<script> $('#chk1').attr('disabled', 'true'); $('#removeUser1').css('visibility','hidden'); </script>";
				//관리자 모드 리스트
				echo "<li class=\"tableList\">";
				echo "<div class=\"userInfo userName\">{$row['name']}</div>";
				echo "<div class=\"userInfo userContact\">{$row['contact1']}</div>";
				echo "<div class=\"userInfo userEmail\">{$row['email']}</div>";
				echo "<div class=\"userInfo userGroup\">{$row['groupName']}</div>";
				echo "<div class=\"userInfo userJob\">{$row['job']}</div>";
				echo "<a class=\"userInfo info\" href=\"./modify.php?num={$row['num']}\"><i class=\"Info xi-pen-o\"></i></a>";
				echo "<a id=\"removeUser{$row['num']}\" class=\"userInfo info\" href=\"./removeRecord.php?num={$row['num']}\"><i class=\"iInfo xi-trash\"></i></a>";
				echo "<input type=\"checkbox\" class=\"info checkBoxLine\" id=\"chk{$row['num']}\" name=\"chk{$row['num']}\">";
				echo "</li>";
			}
			else {
				//일반 모드 리스트
				echo "<li class=\"tableList\">";
				echo "<div class=\"userInfo userName\">{$row['name']}</div>";
				echo "<div class=\"userInfo userContact\">{$row['contact1']}</div>";
				echo "<div class=\"userInfo userEmail\">{$row['email']}</div>";
				echo "<div class=\"userInfo userGroup\">{$row['groupName']}</div>";
				echo "<div class=\"userInfo userJob\">{$row['job']}</div>";
				echo "<a class=\"userInfo moreInfo\" href=\"./lookUp.php?num={$row['num']}\">more<i class=\"iInfo xi-plus-min\"></i></a>";
				echo "</li>";
			}
		}
?>
				<li id="searchResultNone" class="tableList searchResultNone">검색 결과가 없습니다.</li>
			</ul>
			<!--연락처 리스트 end-->
		</section>
<?
if(isset($_SESSION['adminId']) && isset($_COOKIE['adminId'])) {
//선택삭제 확인창
	echo "<div class=\"alertBox\" id=\"alertBox\">삭제하시겠습니까?";
	echo "<div class=\"buttonBox\">";
	echo "<div class=\"alertBtn cancelBtn\" id=\"cancelBtn\" name=\"cancelBtn\" tabindex=1>취소</div>";
	echo "<input type=\"submit\" class=\"alertBtn removeBtn\" id=\"removeBtn\" name=\"removeBtn\" value=\"삭제\" tabindex=2/>";
	echo "</form>";
	echo "</div>";
	echo "<div>";
	echo "</body>";
	echo "</html>";
}
mysqli_free_result($result);
mysqli_close($conn);	
?>
