<?php 
	include("../connect.php");
	$userid = $_SESSION['id'];
	$link = stripslashes(strip_tags(htmlspecialchars($_POST['link'])));
	$yontem = stripslashes(strip_tags(htmlspecialchars($_POST['yontem'])));
	if($link!=""){
		if($yontem!=""){
			header("refresh:0; url=onay-kodu.php?link=".$link.""); 			
		}
		else {
			echo "Lütfen onay yöntemi alanını boş bırakmayın.";
			header("refresh:0; url=../yayinci/site-basvurusu.php");  
		}
		}
	else {
		echo "Lütfen link alanını boş bırakmayın.";
		header("refresh:0; url=../yayinci/site-basvurusu.php"); 	
	}
?>
