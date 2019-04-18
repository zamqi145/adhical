<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Reklam Analizi - Reklamınız";
    $desc = "Reklam analizlerine bakabilmeniz ve giderinizi inceleyebilmeniz için hazırladığımız reklam analiz sayfası.";
    $keyw = "reklamınız reklam veren profili, reklamınız reklam analizleri, reklamınız reklam gelirleri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<style type="text/css">
@media screen and (min-width: 1199px){
    .footer-big {
        position: relative !important;
    }
}
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0">
	<h1>Reklam Analizleri</h1>
	<div class="col-md-1 col-sm-1"></div>
	<div class="col-md-2 col-sm-2" >
		<div>
			<h2>Reklam Sayısı</h2>
			<p>
			<?php 
				$bak = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' ");
				$say = $bak->num_rows;
				if($say>0){
					echo $say;
				}
				else {
					echo "Hiç reklamınız bulunmuyor..";
				}
			?>
			</p>
		</div>
	</div>
	<div class="col-md-3 col-sm-3">
		<div>
			<h2>Tıklanma</h2>
			<p>
			<?php 
				$tiklama = 0;
				$bak = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' ");
				$say = $bak->num_rows;
				if($say>0){
					while ($say = mysqli_fetch_array($bak)) {
						$tiklama += $say['tiklama'];
					}
					echo $tiklama;
				}
				else {
					echo "Hiç reklamınız bulunmuyor..";
				}
			?>
			</p>
		</div>
	</div>
	<div class="col-md-3 col-sm-3" >
		<div>
			<h2>Görüntülenme</h2>
			<p>
			<?php 
				$gorme = 0;
				$bak = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' ");
				$say = $bak->num_rows;
				if($say>0){
					while ($say = mysqli_fetch_array($bak)) {
						$gorme += $say['gorme'];
					}
					echo $gorme;
				}
				else {
					echo "Hiç reklamınız bulunmuyor..";
				}
			?>
			</p>
		</div>
	</div>
	<div class="col-md-2 col-sm-2" >
		<div>
			<h2>Tıklanma Oranı</h2>
			<p>
			<?php 
				$bak = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' ");
				$say = $bak->num_rows;
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
					echo "Hiç reklamınız bulunmuyor..";
				}
			?>
			</p>
		</div>
	</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top: 3%; padding-bottom: 6.5%">
	<center>
		<h2>Detaylı Analiz Listeleyici</h2>
		<form action="detayli-reklam-analizi" method="POST">
			<?php
				$sor = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' ");
				$say = $sor->num_rows;
				if($say>0){
					echo '<select name="reklamad">';
					while ($oku = mysqli_fetch_array($sor)) {
						echo '<option>'.$oku['ad'].'</option>';
					}
					echo '</select><br /><br /><input class="input-css" type="submit" value="Detaylı İncele" />';
				}
				else {
					echo "Hiç reklamınız bulunmuyor.";
				}	
			?>			
		</form>
	</center>
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