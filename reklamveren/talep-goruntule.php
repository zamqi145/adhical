<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Destek - Reklamınız";
    $desc = "Bizimle kolay yoldan iletişime geçip olabilecek en kısa sürede yanıt alabilmeniz için hazırladığımız destek sayfası.";
    $keyw = "reklamınız reklam veren destek ekibi, reklamınız reklam veren destek, reklamınız reklam veren destek bölümü";
    $url = htmlspecialchars($_SERVER['REQUEST_URI']);
    $linkid = htmlspecialchars($_GET['id']);
	$sql = $conn->query("SELECT * FROM destek WHERE id='$linkid' "); 
	while($sqloku = mysqli_fetch_array($sql)){
		$sart = $sqloku['userid'];
	}
    if($sart==$id){
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<style type="text/css">
.dis-div {
	background-color: #fff; 
}
.bir {
	padding-top: 3%; 
	min-height: 150px;
}
.iki {
	min-height: 180px;
}
.uc {
	min-height: 400px;
}
.mesaj {
	padding: 20px;
	border: 1px solid #dfdfdf;	
}
.icerik {
	margin: 1%;
	padding: 2%;
	border: 1px solid lightgreen;
	background-color: lightgreen;
	border-radius: 5px;
	max-width: 400px;
	float: left;
}
.siz {
	margin: 3.2%;
	padding: 2%;
	border: 1px solid #dfdfdf;
	background-color: #dfdfdf;
	border-radius: 5px;
	max-width: 400px;
	float: right;
}
.col-md-8 {
	margin: auto;
}

.buton {
	float: right;
	margin-top: 20px;
}
textarea{
	resize:none
}
</style>
<div class="dis-div bir row">
	<?php
		$sql = $conn->query("SELECT * FROM destek WHERE id='$linkid' && userid='$id' "); 
		while($sqloku = mysqli_fetch_array($sql)){
			$baslik = $sqloku['baslik'];
			$mesaj = $sqloku['mesaj'];
			$talepid = $sqloku['talepid'];
			if($sqloku['durumu']){
				$durumu = 'Tamamlandı';
			}
			else {
				$durumu = 'Tamamlanmadı';
			}
			$tarih = $sqloku['tarih'];
			$saat = $sqloku['saat'];
		}
	?>
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="col-md-12"><h3>Konu: <?php echo $baslik; ?></h3></div>
		<div class="col-md-3"><b>Talep ID: <?php echo $talepid; ?></b></div>
		<div class="col-md-3"><b>Tarih: <?php echo $tarih."<br>".$saat; ?></b></div>
		<div class="col-md-3"><b>Durumu: <?php echo $durumu; ?></b></div>
	</div>
	<div class="col-md-2"></div>
</div>
<?php 
	$sqlimiz = $conn->query("SELECT * FROM destek WHERE talepid='$talepid' && userid='$id' ORDER BY id DESC"); 
	$sqlsayi = $sqlimiz->num_rows;
	if($sqlsayi<3){
		$height = $sqlsayi * 120;
	}
	else {
		$height = $sqlsayi * 80;
	}
echo '<div class="dis-div iki row" style="height: '.$height.'px">';
?>
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="col-md-12 mesaj">
			<?php
				while($sqlimizoku = mysqli_fetch_array($sqlimiz)){
					if($sqlimizoku['gonderici']){
						echo '<br /><br /><p style="font-size: 18px;">Destek Ekibimiz:</p> <div class="icerik">'.$sqlimizoku["mesaj"].'</div><br /><br /><br />';
					}
					else {
						echo '<p style="font-size: 18px; float: right;">Siz: <br /><div class="siz">'.$sqlimizoku["mesaj"].'</div><br /><br /><br />';
					}
				}
			?>
		</div>
	</div>
</div>
<div class="dis-div uc">
	<div class="col-md-2"></div>
	<div class="col-md-8" style="margin-top: 30px">
		<form action="../islem/destek-cevap.php?talepid=<?php echo $talepid ?>&durumu=<?php echo $durumu ?>" method="POST">
			<textarea name="cevap" maxlength="1500" style="width: 100%;" rows="10" placeholder="Cevabınız.."></textarea>
			<div class="buton">
				<input type="submit" value="Gönder" />
			</div>
		</form>
	</div>
</div>

<?php  include("footer.php");}
else {
	echo '<meta charset="UTF-8">';
	echo "Bu destek talebi sizin gözükmüyor..";
	$ip = $_SERVER['REMOTE_ADDR'];
	$sorg = $conn->query("SELECT * FROM acikarayanuser WHERE userid='$id' ");
	$sayisi = $sorg->num_rows;
	if($sayisi>0){
		while($oku=mysqli_fetch_array($sorg)){
			$sayimiz = $oku['tekrar'];
		}
		$tek = $sayimiz+1;
		$conn->query("UPDATE acikarayanuser SET tekrar=$tek WHERE userid='$id' ");
	}
	else {
		$tarih = date("Y-m-d");
		$saat = date("H:i:s");
		$conn->query("INSERT INTO acikarayanuser(userid,ip,url,tekrar,tarih,saat) VALUES('$id','$ip','$url',1,'$tarih','$saat') ");
	}
  	header("refresh:2; url=https://www.reklaminiz.com/reklamveren/destek ");
}
}

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