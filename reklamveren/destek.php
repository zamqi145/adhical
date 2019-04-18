<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Destek - Reklamınız";
    $desc = "Bizimle kolay yoldan iletişime geçip olabilecek en kısa sürede yanıt alabilmeniz için hazırladığımız destek sayfası.";
    $keyw = "reklamınız reklam veren destek ekibi, reklamınız reklam veren destek, reklamınız reklam veren destek bölümü";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0">
	<h1>Destek Taleplerim</h1>
	<h3 class="sh3">Sistemimizde açtığınız destek taleplerine buradan ulaşabilirsiniz.</h3>
<?php
	$sql = $conn->query("SELECT * FROM destek WHERE userid='$id' && ilkmesaj='1' ");
	$sqlsayi = $sql->num_rows;
	echo '
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<h2>Talep ID</h2>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<h2>Başlık</h2>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<h2>Tarih</h2>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<h2>Talep Durumu</h2>
			</div>
		</div>
	';
	if($sqlsayi > '0'){
		while( $sqlsayi > '0' ){
			$sqlim = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' ");
			$oku = mysqli_fetch_array($sql);
			$sqlimsayi = $sqlsayi;
			while($sqlimsayi){
				$talepid = $oku['talepid'];
				$baslik = $oku['baslik'];
				$mesaj = $oku['mesaj'];
				$tarih = $oku['tarih'];
				if($oku['durumu']){
					$durumu = 'Tamamlandı';
				}
				else {
					$durumu = 'Cevaplanmadı';
				}
				$sqlimsayi--;
			}
			$desteksql = $conn->query("SELECT * FROM destek WHERE userid='$id' && talepid='$talepid' && ilkmesaj='1' ");
			while($destekoku = mysqli_fetch_array($desteksql)){
				$destekid = $destekoku['id'];
			}
			echo '
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						'.$talepid.'<br /><br />
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<a class="a" href="talep-goruntule.php?id='.$destekid.'"> '.$baslik.'</a><br /><br />
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						'.$tarih.'<br /><br />
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						'.$durumu.'<br /><br />
					</div>
				</div>
			';
			$sqlsayi--;
		}
	}
	else {
		echo '
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					Hiç Destek Talebiniz Yok<br /><br />
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					Hiç Destek Talebiniz Yok<br /><br />
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					Hiç Destek Talebiniz Yok<br /><br />
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					Hiç Destek Talebiniz Yok<br /><br />
				</div>
			</div>
		';
	}
?>
	<div class="col-md-12 col-sm-12">
		<a href="talep" style="color: black"><input class="input-css" type="submit" value="Yeni Talep Oluştur" /></a>
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