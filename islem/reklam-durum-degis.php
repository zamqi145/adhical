<meta charset="UTF-8">
<?php 
include("../connect.php");
$id = $_SESSION['id'];
if($id){
	$reklamad	= stripslashes(strip_tags(htmlspecialchars($_POST['reklamad'])));
	if($reklamad){
		$veri = $conn->query("SELECT * FROM verilenreklamlar WHERE ad='$reklamad' && userid='$id'");
		$verisay = $veri->num_rows;
		if($verisay){
			while ($verioku = mysqli_fetch_array($veri)) {
				$durumu = $verioku['durumu'];
			}
			if($durumu){
				$upda = $conn->query("UPDATE verilenreklamlar SET durumu='0' WHERE ad='$reklamad' && userid='$id'");
				echo "<strong style='color:#00d000'>Reklam  pasifleştirildi</strong>";
				header("refresh:0; url=../reklamveren/reklam-analizleri");
			}
			else {
				$upda = $conn->query("UPDATE verilenreklamlar SET durumu='1' WHERE ad='$reklamad' && userid='$id'");
				echo "<strong style='color:#00d000'>Reklam  aktifleştirildi</strong>";
				header("refresh:0; url=../reklamveren/reklam-analizleri"); 
			}
		}		
		else {
			echo "<strong style='color:red'>Bulunamadı</strong>";
		}	
	}
}
else{
	echo "<strong style='color:red'>Giriş Yapın!</strong>";
}
?>
