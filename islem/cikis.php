<meta charset="UTF-8">
<?php 
	session_start();
	session_destroy();
	echo "Çıkış yapılıyor..";
	header("refresh:0; url=../");
?>
