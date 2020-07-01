window.onload = function() {
	//전체선택	
	$('#checkAll').on('click', function() {
		$(this).toggleClass('checkHandler');
		if($(this).hasClass('checkHandler')) {
			$('.checkBoxLine').attr('checked',true);
		} 
		else {
			$('.checkBoxLine').attr('checked',false);
		}
	});
	//버튼 클릭시 
	this.addEventListener('click', function(e) {	
		let portfolioAlert = document.getElementById('portfolioAlert');
		let xiClose = document.getElementById('xiClose');
		let logo = document.getElementById('logo');
		let userUpdate = document.getElementById('userUpdate');
		let checkRemove = document.getElementById('checkRemove');
		let cancelBtn = document.getElementById('cancelBtn');
		let bodyWrap = document.getElementById('bodyWrap');
		let headerWrap = document.getElementById('headerWrap');
		switch (e.target.id) {
			case 'xiClose' : portfolioAlert.style.display="none"; break;
			case 'logo' : location.href="./main.php"; break;
			case 'userUpdate': location.href="./addAddress.php"; break;
			case 'checkRemove' : 
				location.href="#";
				alertBox.style.visibility='visible'; 
				portfolioAlert.style.opacity='0';
				wrap.style.opacity='0'; 
				headerWrap.style.opacity='0'; 
				break;
			case 'cancelBtn' : 
				location.href="#";
				alertBox.style.visibility='hidden'; 
				portfolioAlert.style.opacity='1';
				wrap.style.opacity='1'; 
				headerWrap.style.opacity='1'; 
				break;
		}
	});
	this.addEventListener('keyup',function(e) {
		let tableList = document.getElementsByClassName('tableList');
		let searchContact = document.getElementById('searchContact').value;
		let searchResultNone = document.getElementById('searchResultNone');
		let displayCount=0;
		switch(e.target.id) {
			case 'searchContact': 
				// 전체에서 검색
				let filter = searchContact.toUpperCase();
				let i=0;
				while(i<tableList.length) {
					let txtValue = tableList[i].innerText || tableList[i].textContent; 
					if(txtValue.toUpperCase().indexOf(filter) > -1) {
						tableList[i].style.display = "block";
						displayCount=1;
					}else {
						tableList[i].style.display="none";
					}
					i++;
				}
				//검색 데이터 없을 때 안내문
				if(displayCount==0) {
					searchResultNone.style.display="block";
				}else {
					searchResultNone.style.display="none";
				}
			break;
		}	
	});
}
