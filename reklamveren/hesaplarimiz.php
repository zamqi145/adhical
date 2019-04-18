<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Hesaplarımız - Reklamınız";
    $desc = "Reklamlar ödemeleri için hesap bilgilerimizin bulunduğu sayfa.";
    $keyw = "reklamınız hesaplarimiz, reklamınız hesaplarımız, reklamınız hesap bilgileri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0">
	<h1>Banka Hesaplarımız</h1>
	<div class="col-md-6 col-sm-6">
		<h2>Banka</h2>
	<?php 
		$sor = $conn->query("SELECT * FROM hesaplarimiz");
	 	if(mysqli_num_rows($sor)>'0'){
		 	while ($oku = mysqli_fetch_array($sor)) {
		    	echo $oku['banka']."<br /><br />";
	  		}
	  	}
	  	else {
	  		echo "Hiç hesap yok";
	  	}
		
	?>
	</div>
	<div class="col-md-6 col-sm-6">
		<h2>Kart Numarası</h2>
	<?php 
		$sor = $conn->query("SELECT * FROM hesaplarimiz");
	 	if(mysqli_num_rows($sor)>'0'){
		 	while ($oku = mysqli_fetch_array($sor)) {
		    	echo $oku['hesapno']."<br /><br />";
	  		}
	  	}
	  	else {
	  		echo "Hiç hesap yok";
	  	}
	?>
	</div>
	<div class="col-md-12 col-sm-12" style="margin-top: 5%">
		<h3>Lütfen ödeme esnasında not olarak reklam adını yazmayı unutmayınız.</h3>
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