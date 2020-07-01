<?
/*
전화번호부 PHP
connectDB.php
작성자: 김은숙
작성일: 20-03-18
수정일: 20-03-18 (V1.0)
*/


$conn = mysqli_connect("localhost","c10st06","fqnxrKJmsOUyEYmk","c10st06");
if(!$conn) {
        echo "unable to connect to DB:" .mysqli_error($conn);
        exit;
}
if(!mysqli_select_db($conn, 'c10st06')) {
        echo "unable to select my DB: ".mysqli_error($conn);
        exit;
}
?>
