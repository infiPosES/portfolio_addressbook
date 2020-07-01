<?
/*
전화번호부 연락처 PHP
adminLogout.php
작성자: 김은숙
작성일: 20-03-12
수정일: 20-03-19(.2)
*/
echo "<link rel=\"shortcut icon\" href=\"./img/fabicon64.ico\">";
setcookie('adminId');
session_start();
session_destroy();
echo "<meta http-equiv='refresh' content='0;url=./main.php'>";
?>
