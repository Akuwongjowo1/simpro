<?php
	$server = mysql_connect("localhost","root","zainuri123");
	$db = mysql_select_db("db_proyekbaru");
	
	if(!$server){
		echo "Maaf, Gagal tersambung dengan server !";
	}
	if(!$db){
		echo "Maaf, Gagal tersambung dengan database !";
	}
?>