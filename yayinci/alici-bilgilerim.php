<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '2'){
	$titl = "Alıcı Bilgilerim - Reklamınız";
    $desc = "Reklamlardan aldığınız ödemelerin yapılacağı kartın bilgilerinin bulunduğu sayfa.";
    $keyw = "reklamınız ödemeler, reklamınız ödemelerim, reklamınız aldığım ödemeler, reklamınız alıcı bilgileri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 1%; margin-bottom: 1%;">
	<h1>Alıcı Bilgilerim</h1>
	<h3 style="margin-bottom: 3.1%;">Ödeme yapılacak hesap bilgileri.</h3>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<h2>Hesap Sahibi</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM alicibilgi WHERE userid='$id' ");
		 	if(mysqli_num_rows($sor)>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
			    			echo $oku['hesapsahibi']."<br /><br />";
			    	}
		  		}
		  	}
		  	else {
		  		echo "Hiç alıcı bilgisi eklenmemiş";
		  	}
			
		?>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<h2>Banka</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM alicibilgi WHERE userid='$id' ");
			if(mysqli_num_rows($sor)>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
				    	echo $oku['banka']."<br /><br />";
				    }
			  	}
		  	}
		  	else {
		  		echo "Hiç alıcı bilgisi eklenmemiş";
		  	}
		?>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<h2>Kart No / İban</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM alicibilgi WHERE userid='$id' ");
			if(mysqli_num_rows($sor)>'0'){ 
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
				    	echo $oku['kartno1']." ".$oku['kartno2']." ".$oku['kartno3']." ".$oku['kartno4']."<br /><br />";
				    }
		  		}
		  	}
		  	else {
		  		echo "Hiç alıcı bilgisi eklenmemiş";
		  	}
		?>
	</div>
</div>
<?php  include("footer.php");}
else {
		echo '<meta charset="UTF-8">';
		echo "Yetki dışı giriş";
  		header("refresh:2; url=../islem/cikis.php");
	}
}}
else{
	echo '<meta charset="UTF-8">';
	echo "Lütfen Giriş Yapın";
  	header("refresh:2; url=../islem/cikis.php");
}
?>