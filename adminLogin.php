<?
/*
전화번호부 연락처 PHP
adminLogin.php
작성자: 김은숙
작성일: 20-03-12
수정일: 20-03-19(.2)
*/
?>
<!doctype html>
<html lang="ko">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<title>ContactBox :: 관리자 로그인</title>
		<link rel="shortcut icon" href="./img/fabicon64.ico">
		<link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2|Noto+Sans+KR&display=swap" rel="stylesheet">
        	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
        	<link rel="stylesheet" href="./css/adminLogin.css" type="text/css">
    </head>
	</head>
	<body>
		<section class="loginBox">
			<article class="loginHeader">
				<i class="xi-close closeBtn" id="closeBtn"></i>
				<p class="loginTitle">관리자 로그인</p>
			</article>
			<article class="inputBox">
				<form action="./checkLogin.php" method="POST">
					<input type="text" name="adminId" class="adminLogin adminId" id="adminId" placeholder="ID 입력" autofocus required tabindex=1>
					<input type="password" name="adminPw" class="adminLogin adminPw" id="adminPw" placeholder="PASSWORD 입력" required tabindex=2>
					<input type="submit" name="submit" value="LOGIN" class="adminSubmit" tabindex=3>
				</form> 
			</article>
		</section>
		<div class="alertLogin" id="alertLogin">
			<div class="alertLine">
				<div class="closeAlert" id="closeAlert"><i class="xi-close" id="closeAlert2"></i></div>
			</div>
			<div class="alertDisc" id="alertDisc">
				관리자 ID: admin<br>
				관리자 PW: 1234
			</div>
		<script>
			let closeBtn = document.getElementById('closeBtn');
			let closeAlert = document.getElementById('closeAlert');
			let closeAlert2 = document.getElementById('closeAlert2');
			let alertLogin = document.getElementById('alertLogin');
			this.addEventListener('click', function(e) {
				switch(e.target.id) {
					case "closeBtn": location.href="./main.php"; break;
					case "closeAlert": alertLogin.style.visibility="hidden"; break;	
					case "closeAlert2": alertLogin.style.visibility="hidden"; break;	
				}
			});
		</script>	
	</body>
</html>

