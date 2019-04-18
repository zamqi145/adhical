<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Reklam Analizi - Reklamınız";
    $desc = "Reklam analizlerine bakabilmeniz ve giderinizi inceleyebilmeniz için hazırladığımız reklam analiz sayfası.";
    $keyw = "reklamınız reklam veren profili, reklamınız reklam analizleri, reklamınız reklam gelirleri";
    $reklamad = htmlspecialchars($_POST['reklamad']);
	if($reklamad!=""){
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<script src="https://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="reklam-durum-degis.js"></script>
<script type="text/javascript" >
	$(function(){
	});
</script>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0" style="">

	<h2 style="margin-bottom: 3%;"><?php echo $reklamad; ?> için Detaylı Reklam Analizi</h2>
	<div class="col-md-1"></div>
	<div class="col-md-3" style="padding-top: 1%; padding-bottom: 1%; border: solid 1px #5bff68; background-color: #5bff68;">
		<h3>Tıklanma Sayısı</h3>
		<?php 
			$sorgu = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' && ad='$reklamad'");
			$say = $sorgu->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sorgu)) {
					$tiklama = $oku['tiklama'];
				}
				echo $tiklama;
			}
			else {
				echo "Bu reklam bulunamadı. Lütfen bizimle iletişime geçin.";
			}
		?>
	</div>
	<div class="col-md-4" style="padding-top: 1%; padding-bottom: 1%; border: solid 1px #5dfff0; background-color: #5dfff0;">
		<h3>Görüntülenme Sayısı</h3>
		<?php 
			$sorg = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' && ad='$reklamad'");
			$say = $sorgu->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sorg)) {
					$gorme = $oku['gorme'];
				}
				echo $gorme;
			}
			else {
				echo "Bu reklam bulunamadı. Lütfen bizimle iletişime geçin.";
			}
		?>
	</div>
	<div class="col-md-3" style="padding-top: 1%; padding-bottom: 1%; border: solid 1px lightblue; background-color: lightblue;">
		<h3>Tıklanma Oranı</h3>
		<?php 
			if($say>0){
				$carpim = 100 * $tiklama;
				if($gorme!=0){
					$sonuc = $carpim / $gorme;
				}
				else {
					$sonuc = 0;
				}
				$yuzde = number_format($sonuc, 2, ",", ".");
				echo $yuzde."%";
			}
			else {
				echo "Bu reklam bulunamadı. Lütfen bizimle iletişime geçin.";
			}
		?>
	</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0" style="background-color: #fff; padding-bottom: 5%">
	<div class="col-md-1"></div>
	<div class="col-md-3" style="padding-top: 1%; padding-bottom: 1%; border: solid 1px #5bff68; background-color: #5bff68;">
		<h3>20 Kuruşluk Tıklamalar</h3>
		<?php 
			$sorgu = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' && ad='$reklamad'");
			$say = $sorgu->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sorgu)) {
					$tiklama20 = $oku['krs20'];
				}
				echo $tiklama20;
			}
			else {
				echo "Bu reklam bulunamadı. Lütfen bizimle iletişime geçin.";
			}
		?>
	</div>
	<div class="col-md-4" style="padding-top: 1%; padding-bottom: 1%; border: solid 1px #5dfff0; background-color: #5dfff0;">
		<h3>30 Kuruşluk Tıklamalar</h3>
		<?php 
			$sorg = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' && ad='$reklamad'");
			if($say>0){
				while ($oku = mysqli_fetch_array($sorg)) {
					$tiklama30 = $oku['krs30'];
				}
				echo $tiklama30;
			}
			else {
				echo "Bu reklam bulunamadı. Lütfen bizimle iletişime geçin.";
			}
		?>
	</div>
	<div class="col-md-3" style="padding-top: 1%; padding-bottom: 1%; border: solid 1px lightblue; background-color: lightblue;">
		<h3>40 Kuruşluk Tıklamalar</h3>
		<?php 
			$sor = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' && ad='$reklamad'");
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					$tiklama40 = $oku['krs40'];
				}
				echo $tiklama40;
			}
			else {
				echo "Bu reklam bulunamadı. Lütfen bizimle iletişime geçin.";
			}
		?>
	</div>
	<div class="col-md-12 col-sm-12">
	<?php 
		$aktifsorgu = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' && ad='$reklamad' ");
		$aktifsay = $aktifsorgu->num_rows;
		if($aktifsay>0){
			while ($aktifdon = mysqli_fetch_array($aktifsorgu)) {
				$aktiflik = $aktifdon['durumu'];
			}
			if($aktiflik){
				echo '<form action="../islem/reklam-durum-degis.php" method="POST"><input type="hidden" name="reklamad" value="'.$reklamad.'"/><br /><br /><input  class="input-css" type="submit" name="aktiflik" value="Pasifleştir"/></form>';
			}
			else {
				echo '<form action="../islem/reklam-durum-degis.php" method="POST"><input type="hidden" name="reklamad" value="'.$reklamad.'"/><br /><br /><input  class="input-css" type="submit" name="aktiflik" value="Aktifleştir" /></form>';	
			}
		}
		else {
			echo "<br /><br /><br />Bu reklam bulunamadı. Lütfen bizimle iletişime geçin.";
		}
	?>
	</div>
</div>



<?php  include("footer.php");}
else {
	echo '<meta charset="UTF-8">Lütfen Reklam Seçin';
	header("refresh:2; url=reklam-analizleri");
}
}
else {
		echo '<meta charset="UTF-8">Yetki dışı giriş';
  		header("refresh:2; url=../islem/cikis.php");
	}
}}
else{
	echo '<meta charset="UTF-8">Lütfen Giriş Yapın';
  	header("refresh:2; url=../islem/cikis.php");
}
?>
