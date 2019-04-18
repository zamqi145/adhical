<?php 
	$id = $_SESSION['id']; 
	if($id){
		$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
		while ($oku = mysqli_fetch_array($sor)) {
			if($oku['hesapturu'] == '1') {
				header("refresh: 0; url=https://adhical.com/reklamveren/profil.php");
			}
			else if($oku['hesapturu'] == '2'){
				header("refresh: 0; url=https://adhical.com/yayinci/profil.php");
			}
			else {
				echo "a";
			}
		}
	}
	else {
		header("refresh: 0; url=https://adhical.com/");
	}
	
?>