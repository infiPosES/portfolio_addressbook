window.onload = function() {
	let userImg = document.getElementById('userImg'); //이미지 태그
	let imgUploadBtn = document.getElementById('imgUploadBtn'); //이미지 업로드
	let alertBox = document.getElementById('alertBox'); //알림창
	let alertNofi = document.getElementById('alertNofi'); //알림내용
	let alertCheckBtn = document.getElementById('alertCheckBtn'); //알림창 확인버튼
	let closeBox = document.getElementById('closeBox'); //X버튼
	let cancelBtn = document.getElementById('cancelBtn'); //취소버튼
	let saveBtn = document.getElementById('saveBtn'); //저장 버튼
	let addAddressBox = document.getElementById('addAddressBox'); //section
	let userName = document.getElementById('userName'); //이름
	let userPhoneNum = document.getElementById('userPhoneNum'); //연락처1
	let userPhoneNum2 = document.getElementById('userPhoneNum2'); //연락처2
	let userPhoneNum3 = document.getElementById('userPhoneNum3'); //연락처3
	let userEmail = document.getElementById('userEmail'); //이메일
	let userGroup = document.getElementById('userGroup'); //그룹
	let userJob = document.getElementById('userJob'); //직장
	let userSNS = document.getElementById('userSNS'); //SNS1
	let userSNS2 = document.getElementById('userSNS2'); //SNS2
	let userSNS3 = document.getElementById('userSNS3'); //SNS3
	let userAddress = document.getElementById('userAddress'); //주소
	let userMemo = document.getElementById('userMemo'); //메모
	let submitAdd = document.getElementById('submit'); //form전송
	//fileUpload - image Preview
        let readUrl = (input) => {
 		if(input.files && input.files[0]) {
			let reader = new FileReader();
				 reader.onload = function(e) {
				 userImg.setAttribute('src', e.target.result);
			 }
			 reader.readAsDataURL(input.files[0]);
		 }
	 }
	 imgUploadBtn.addEventListener('change', function() {
	 readUrl(imgUploadBtn);
 });
	//이름 정규식
	userName.addEventListener('blur', function(e) {
		let nameReg = /^.{1,15}$/;
		let resultReg = nameReg.test(userName.value);
		if ($('.nofiName').length == 0 && !resultReg) {
			$('#userName').after("<p class=\"nofiText nofiName\">올바른 형식이 아닙니다.</p>");
		}else {	
			if(resultReg) {
				$('.nofiName').remove();
			}
		}
	});
	//연락처1 정규식
	userPhoneNum.addEventListener('blur', function(e) {
		let phoneNumReg = /^0([0-9]){7,12}$/;
		let resultReg = phoneNumReg.test(userPhoneNum.value);
		if ($('.nofiNum1').length == 0 && !resultReg) {
			$('#userPhoneNum').after("<p class=\"nofiText nofiNum1\">올바른 형식이 아닙니다.</p>");
		}else {	
			if(resultReg) {
				$('.nofiNum1').remove();
			}
		}
	});
	//연락처2 정규식
	userPhoneNum2.addEventListener('blur', function(e) {
		let phoneNumReg = /^0([0-9]){7,12}$/;
		let resultReg = phoneNumReg.test(userPhoneNum2.value);
		if (userPhoneNum2.value != "" && $('.nofiNum2').length == 0 && !resultReg) {
			$('#userPhoneNum2').after("<p class=\"nofiText nofiNum2\">올바른 형식이 아닙니다.</p>");
		}else {	
			if(userPhoneNum2=="" || resultReg) {
				$('.nofiNum2').remove();
			}
		}
	});
	//연락처3 정규식
	userPhoneNum3.addEventListener('blur', function(e) {
		let phoneNumReg = /^0([0-9]){7,12}$/;
		let resultReg = phoneNumReg.test(userPhoneNum3.value);
		if (userPhoneNum3.value != "" && $('.nofiNum3').length == 0 && !resultReg) {
			$('#userPhoneNum3').after("<p class=\"nofiText nofiNum3\">올바른 형식이 아닙니다.</p>");
		}else {	
			
			if(userPhoneNum3.value =="" || resultReg) {
				$('.nofiNum3').remove();
			}
		}
	});
	//이메일 정규식
	userEmail.addEventListener('blur', function(e) {
		let emailReg = /^[0-9a-zA-Z]+@[0-9a-zA-Z]+.[0-9a-zA-Z]{2,3}$/;
		let resultReg = emailReg.test(userEmail.value);
		if (userEmail.value != "" && $('.nofiEmail').length == 0 && !resultReg) {
			$('#userEmail').after("<p class=\"nofiText nofiEmail\">올바른 형식이 아닙니다.</p>");
		}else {	
			
			if(userEmail.value =="" || resultReg) {
				$('.nofiEmail').remove();
			}
		}
	});

	//그룹 정규식
	userName.addEventListener('blur', function(e) {
		let groupReg = /^.{1,20}$/;
		let resultReg = groupReg.test(userGroup.value);
		if (userGroup.value!="" && $('.nofiGroup').length == 0 && !resultReg) {
			$('#userGroup').after("<p class=\"nofiText nofiGroup\">올바른 형식이 아닙니다.</p>");
		}else {	
			if(userGroup.value == "" || resultReg) {
				$('.nofiName').remove();
			}
		}
	});
	//직장 정규식
	userJob.addEventListener('blur', function(e) {
		let jobReg = /^.{1,20}$/;
		let resultReg = jobReg.test(userJob.value);
		if (userJob.value!="" && $('.nofiJob').length == 0 && !resultReg) {
			$('#userJob').after("<p class=\"nofiText nofiJob\">올바른 형식이 아닙니다.</p>");
		}else {	
			if(userJob.value == "" || resultReg) {
				$('.nofiJob').remove();
			}
		}
	});
	//SNS 정규식
	userSNS.addEventListener('blur', function(e) {
		let SNSReg = /^.{1,20}$/;
		let resultReg = SNSReg.test(userSNS.value);
		if (userSNS.value!="" && $('.nofiSNS').length == 0 && !resultReg) {
			$('#userSNS').after("<p class=\"nofiText nofiSNS\">올바른 형식이 아닙니다.</p>");
		}else {	
			if(userSNS.value =="" || resultReg) {
				$('.nofiSNS').remove();
			}
		}
	});
	//SNS2 정규식
	userSNS2.addEventListener('blur', function(e) {
		let SNSReg = /^.{1,20}$/;
		let resultReg = SNSReg.test(userSNS2.value);
		if (userSNS2.value!="" && $('.nofiSNS2').length == 0 && !resultReg) {
			$('#userSNS2').after("<p class=\"nofiText nofiSNS2\">올바른 형식이 아닙니다.</p>");
		}else {	
			if(userSNS2.value =="" || resultReg) {
				$('.nofiSNS2').remove();
			}
		}
	});
	//SNS3 정규식
	userSNS3.addEventListener('blur', function(e) {
		let SNSReg = /^.{1,20}$/;
		let resultReg = SNSReg.test(userSNS3.value);
		if (userSNS3.value!="" && $('.nofiSNS3').length == 0 && !resultReg) {
			$('#userSNS3').after("<p class=\"nofiText nofiSNS3\">올바른 형식이 아닙니다.</p>");
		}else {	
			if(userSNS3.value =="" || resultReg) {
				$('.nofiSNS3').remove();
			}
		}
	});
	//주소 정규식
	userAddress.addEventListener('blur', function(e) {
		let addressReg = /^.{1,40}$/;
		let resultReg = addressReg.test(userAddress.value);
		if (userAddress.value!="" && $('.nofiAddress').length == 0 && !resultReg) {
			$('#userAddress').after("<p class=\"nofiText nofiAddress\">올바른 형식이 아닙니다.</p>");
		}else {	
			if(userAddress.value == "" || resultReg) {
				$('.nofiAddress').remove();
			}
		}
	});
	//메모 정규식
	userMemo.addEventListener('blur', function(e) {
		let memoReg = /^.{1,4000}$/;
		let resultReg = memoReg.test(userMemo.value);
		if(userMemo.value!="" && $('.nofiMemo').length == 0 && !resultReg) {
			$('#userMemo').after('<p class=\"nofiText nofiMemo\">올바른 형식이 아닙니다.</p>');
		}else {
			if(userMemo.value == "" || resultReg) {
				$('.nofiMemo').remove();
			}
		}
	});	
	let checkValue = (event) => {
		if($('.nofiText').length!=0) {
			event.preventDefault();
		}
	}
	this.addEventListener("click", function(e) {
			switch(e.target.id) {
			case "cancelBtn":location.href="http://pager.kr/~c10st06/Portfolio/addressbook/main.php"; break;
		
			case "closeBox":location.href="http://pager.kr/~c10st06/Portfolio/addressbook/main.php"; break;
			case "saveBtn":	
				alertBox.style.visibility="visible";
				alertNofi.innerHTML = "입력한 값을 확인해 주세요.";
				checkValue(e); break;
			case "alertCheckBtn": 
				alertBox.style.visibility="hidden";
				break;
		}
	});
}
