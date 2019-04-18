<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '2'){
	$titl = "Reklam Analizi - Reklamınız";
    $desc = "Reklam analizlerine bakabilmeniz ve gelirlerinizi inceleyebilmeniz için hazırladığımız reklam analiz sayfası.";
    $keyw = "reklamınız reklam yayıncı profili, reklamınız reklam analizleri, reklamınız reklam gelirleri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 1%; margin-bottom: 10%;">
	<h1>Detaylı Reklam Analizleri (BETA)</h1>
	<h3 style="margin-bottom: 3.1%;">Oluşturduğunuz reklamlar hakkında detaylı bilgiye ulaşmak için burayı kullanabilirsiniz..</h3>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Reklam Adı</h2>
		<p>
		<?php 
			$bak = $conn->query("SELECT * FROM reklamlar WHERE userid='$id'");
			$say = $bak->num_rows;
			if($say>0){
				while ($say = mysqli_fetch_array($bak)) {
					
					echo "<p class='color-black'>".$say['ad']."</p><br /><br />";
				}
			}
			else {
				echo "Hiç reklamınız bulunmuyor..";
			}
		?>
		</p>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Reklam Boyutu</h2>
		<p>
		<?php 
			$bak = $conn->query("SELECT * FROM reklamlar WHERE userid='$id' ");
			$say = $bak->num_rows;
			if($say>0){
				while ($say = mysqli_fetch_array($bak)) {
					$genislik = $say['genislik'];
					$yukseklik = $say['yukseklik'];
					echo "<p class='color-black'>".$genislik." x ".$yukseklik." reklam</p><br /><br />";
				}
			}
			else {
				echo "Hiç reklamınız bulunmuyor..";
			}
		?>
		</p>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Oluşturulma Tarihi</h2>
		<p>
		<?php 
			$bak = $conn->query("SELECT * FROM reklamlar WHERE userid='$id' ");
			$say = $bak->num_rows;
			if($say>0){
				while ($say = mysqli_fetch_array($bak)) {
					echo "<p class='color-black'>".$say['vtarih']."</p><br /><br />";
				}
			}
			else {
				echo "Hiç reklamınız bulunmuyor..";
			}
		?>
		</p>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Reklam Durumu</h2>
		<p>
		<?php 
			$sor = $conn->query("SELECT * FROM reklamlar WHERE userid='$id' ");
		 	if(mysqli_num_rows($sor)>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
		    			if($oku['durumu']=='1'){
		    				echo "<p class='color-black'>Aktif</p> <br/><br/>";
		    			}
		    			else if($oku['durumu']=='0'){
		    				echo "<p class='color-black'>Pasif (admin onayı için bekleyiniz.)</p><br/><br/>";
		    			}
		    			else {
		    				echo "<p class='color-black'>Hata </p><br/><br/>";
		    			}
			    	}
		  		}
		  	}
		  	else {
		  		echo "Hiç reklam oluşturulmamış.";
		  	}
		?>
		</p>
	</div>
	<!--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Tıklanma</h2>
		<p>-->
		<?php 
			/* $tiklama = 0;
			$bak = $conn->query("SELECT * FROM reklamlar WHERE userid='$id' ");
			$say = $bak->num_rows;
			if($say>0){
				while ($say = mysqli_fetch_array($bak)) {
					echo "<p class='color-black'>".$say['tiklanma']."</p><br /><br />";
				}
			}
			else {
				echo "Hiç reklamınız bulunmuyor..";
			}*/
		?>
		<!--</p>
	</div>-->
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