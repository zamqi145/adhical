<meta charset="UTF-8">
<?php
	include("../connect.php");
	$referer = $_SERVER['HTTP_REFERER'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$yorum = stripslashes(strip_tags(htmlspecialchars($_POST["yorum"])));
	$konu = explode("=", $referer);
	$blogsql = $conn->query("SELECT * FROM blog WHERE seourl='$konu[1]' ");
	while($blogoku = mysqli_fetch_array($blogsql)){
		$konuid = $blogoku['id'];
	}
	$name = stripslashes(strip_tags(htmlspecialchars($_POST["ad"])));
	$eposta = stripslashes(strip_tags(htmlspecialchars($_POST["eposta"])));
	$date = date("Y-m-d");
	if($name!="" && $eposta!=""){
		$conn->query("INSERT INTO blogyorum(konuid,name,eposta,yorum,tarih,ip) VALUES('$konuid','$name','$eposta','$yorum','$date','$ip') ");
		header("refresh: 0, url=$referer");
	}
	else {
		echo 'Lütfen boş alan bırakmayın!';
		header("refresh: 3, url=$referer");
	}	
?>
