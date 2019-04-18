<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){	
	$titl = "Reklamlarım - Reklamınız";
    $desc = "Reklam alabilmeniz, reklam analizlerine bakabilmeniz ve gelirlerinizi inceleyebilmeniz için hazırladığımız reklam veren profil sayfası.";
    $keyw = "reklamınız reklam veren profili, reklamınız reklam analizleri, reklamınız gelirleri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<script src="https://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://reklaminiz.com/reklamveren/reklam-durumu.js"></script>
<script type="text/javascript" >
    $(function(){
    });
</script>
<style type="text/css">
@media screen and (min-width: 1199px){
    .footer-big {
        position: relative !important;
    }
}
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 r1 r2">
	<h1>Verdiğim Reklamlarım</h1>
	<h3 class="sh3">Sistemimize verdiğiniz reklamlar hakkında genel bilgiye buradan ulaşabilirsiniz.</h3>
<?php
	$sql = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' ");
	$sqlsayi = $sql->num_rows;
	echo '
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<h2>Reklam Adı</h2>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<h2>Reklam Boyutu</h2>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<h2>Kalan Ödeme</h2>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<h2>Reklam Durumu</h2>
			</div>
		</div>
	';
	if($sqlsayi > '0'){
		while( $sqlsayi > '0' ){
			$sqlim = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' ");
			$oku = mysqli_fetch_array($sql);
			$sqlimsayi = $sqlsayi;
			while($sqlimsayi){
				$ad = $oku['ad'];
				$genislik = $oku['genislik'];
				$yukseklik = $oku['yukseklik'];
				$kalanodeme = $oku['kalanodeme'];
				$butce = $oku['odeme'];
				if($oku['durumu']){
					$aktiflik = 'Aktif';
				}
				else {
					$aktiflik = 'Pasif';
				}
				if($oku['durumu'] && $oku['aonay'] && $oku['kalanodeme']<'2'){
					$yayin = 'Tamamlandı';
				}
				else if($oku['durumu'] && $oku['aonay']){
					$yayin = 'Yayınlanıyor';
				}
				else {
					$yayin = 'Yayınlanmıyor';
				}
				$sqlimsayi--;
			}
			$boyut = $genislik." x ".$yukseklik;
			echo '
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						'.$ad.'<br /><br />
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						'.$boyut.'<br /><br />
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						'.$kalanodeme.'<br /><br />
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						'.$yayin.'<br /><br />
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
					Hiç Reklamınız Yok<br /><br />
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					Hiç Reklamınız Yok<br /><br />
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					Hiç Reklamınız Yok<br /><br />
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					Hiç Reklamınız Yok<br /><br />
				</div>
			</div>
		';
	}
?>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 3%;">
		<a href="reklam-ver?adim=1"><button  class="input-css">Reklam Ver</button></a>
	</div>
</div>
<?php  include("footer.php");}
else {
		echo '<meta charset="UTF-8">';
		echo "Yetki dışı giriş";
  		header("refresh:0; url=../");
	}
}}
else{
  	header("refresh:0; url=../");
}
?>