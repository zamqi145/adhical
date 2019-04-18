<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '2'){
	$titl = "Ödemeler - Reklamınız";
    $desc = "Reklamlardan aldığınız ödemelerin kayıtlarının bulunduğu sayfa.";
    $keyw = "reklamınız ödemeler, reklamınız ödemelerim, reklamınız aldığım ödemeler";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 1%; margin-bottom: 1%;">
	<h1>Aldığınız Ödemeler</h1>
	<h3 style="margin-bottom: 3.1%;">Sistemimizden Aldığınız Ödemeler</h3>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Hesap Sahibi</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM odemeler WHERE userid='$id' ");
		 	if(mysqli_num_rows($sor)>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
			    		echo $oku['hesapad']."<br /><br />";
			    	}
		  		}
		  	}
		  	else {
		  		echo "Hiç ödeme alınmamış";
		  	}
		?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Kart Numarası</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM odemeler WHERE userid='$id' ");
			if(mysqli_num_rows($sor)>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
				    	echo $oku['kartno']."<br /><br />";
				    }
			  	}
		  	}
		  	else {
		  		echo "Hiç ödeme alınmamış";
		  	}
		?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Ödeme Miktarı</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM odemeler WHERE userid='$id' ");
			if(mysqli_num_rows($sor)>'0'){ 
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
				    	echo $oku['odememiktari']."TL <br /><br />";
				    }
		  		}
		  	}
		  	else {
		  		echo "Hiç ödeme alınmamış";
		  	}
		?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Ödeme Tarihi</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM odemeler WHERE userid='$id' ");
			if(mysqli_num_rows($sor)>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
				    	$gun= substr($oku['odemetarihi'], 8,4);
						$ay= substr($oku['odemetarihi'], 5, 2);
						$yil= substr($oku['odemetarihi'], 0, 4);
				    	echo $gun."-".$ay."-".$yil."<br /><br />";
				    }
			  	}
		  	}
		  	else {
		  		echo "Hiç ödeme alınmamış";
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