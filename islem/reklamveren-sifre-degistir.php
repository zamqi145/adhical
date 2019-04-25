<meta charset="UTF-8">
<?php
	include("../connect.php");
	$id = $_SESSION['id'];
	$password = stripslashes(strip_tags(htmlspecialchars($_POST['password'])));
	$newpassword = stripslashes(strip_tags(htmlspecialchars($_POST['newpassword'])));
	$repeatnewpassword = stripslashes(strip_tags(htmlspecialchars($_POST['repeatnewpassword'])));
	$md5password = stripslashes(strip_tags(htmlspecialchars(md5($password))));
	$md5newpassword = stripslashes(strip_tags(htmlspecialchars(md5($newpassword))));
	if(($password!="") && ($newpassword!="") && ($repeatnewpassword!="")){
		$sql = $conn->query("SELECT * FROM users WHERE id='$id' ");
		while($oku = mysqli_fetch_array($sql)){
			$epassword = $oku['password'];
		}
		if($epassword==$md5password){
			if($newpassword==$repeatnewpassword){
				$guncelle = $conn->query("UPDATE users SET password='$md5newpassword' WHERE id='$id' ");
				if($guncelle){
					echo "<strong style='color: #3c763d'>Güncelleme işlemi başarılı.</strong>";
				}
				else {
					echo "<strong style='color: red'>Güncelleme işlemi başarısız.</strong>";
				}
			}
			else {
				echo "<strong style='color: red'>Girilen yeni şifreler eşleşmiyor.</strong>";
			}
		}
		else {
			echo "<strong style='color: red'>Eski şifrenizi hatalı girdiniz.</strong>";
		}
	}
	else {
		echo "<strong style='color: red'>Lütfen boş alan bırakmayınız.</strong>";
	}
?>
