<?php
include("../connect.php");
$id = $_SESSION['id'];
if($id){
	$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
	while ($oku = mysqli_fetch_array($sor)) {
		$hesapturu = $oku['hesapturu'];
	}
	if($hesapturu == '4'){
		$title		 = 	stripslashes(strip_tags(htmlspecialchars($_POST['title'])));
		$desc		 =	stripslashes(strip_tags(htmlspecialchars($_POST['desc'])));
		$keyw		 = 	stripslashes(strip_tags(htmlspecialchars($_POST['keyw'])));
		$hakkimizda  = 	stripslashes(strip_tags(htmlspecialchars($_POST['hakkimizda'])));
		$asbaslik1	 = 	stripslashes(strip_tags(htmlspecialchars($_POST['asbaslik1'])));
		$asaciklama1 = 	stripslashes(strip_tags(htmlspecialchars($_POST['asaciklama1'])));
		$asbaslik2	 = 	stripslashes(strip_tags(htmlspecialchars($_POST['asbaslik2'])));
		$asaciklama2 = 	stripslashes(strip_tags(htmlspecialchars($_POST['asaciklama2'])));
		$asslider1 	 = 	stripslashes(strip_tags(htmlspecialchars($_POST['asslider1'])));
		$asslider2   = 	stripslashes(strip_tags(htmlspecialchars($_POST['asslider2'])));
		$rvslider1 	 = 	stripslashes(strip_tags(htmlspecialchars($_POST['rvslider1'])));
		$rvslider2 	 = 	stripslashes(strip_tags(htmlspecialchars($_POST['rvslider2'])));
		$rvslider3 	 = 	stripslashes(strip_tags(htmlspecialchars($_POST['rvslider3'])));
		$conn->query("UPDATE ayarlar SET title='$title' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET description='$desc' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET keywords='$keyw' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET hakkimizda='$hakkimizda' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET asbaslik1='$asbaslik1' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET asaciklama1='$asaciklama1' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET asbaslik2='$asbaslik2' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET asaciklama2='$asaciklama2' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET asslider1='$asslider1' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET asslider2='$asslider2' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET rvslider1='$rvslider1' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET rvslider2='$rvslider2' WHERE id='1' ");
		$conn->query("UPDATE ayarlar SET rvslider3='$rvslider3' WHERE id='1' ");
		header("refresh: 0, url=ayarlar.php");
	}
	else {
		header("refresh: 0, url=../islem/cikis.php");
	}
}
else {
	header("refresh: 0, url=../");
}
?>