<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Destek - Reklamınız";
    $desc = "Bizimle kolay yoldan iletişime geçip olabilecek en kısa sürede yanıt alabilmeniz için hazırladığımız destek sayfası.";
    $keyw = "reklamınız reklam veren destek ekibi, reklamınız reklam veren destek, reklamınız reklam veren destek bölümü";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<style type="text/css">
@media screen and (min-width:1000px){
	.id, .baslik, .tarih, .durum{
		min-width: 200px !important;
	}
}
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0">
	<h1 class="sh3">Yeni Destek Talebi</h1>
	<div class="col-lg-1 col-md-1"></div>
	<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
		<form action="../islem/talep.php" method="POST">
			<input style="width: 83%" type="text" name="baslik" placeholder="Talebinizin Konusu" maxlength="120" required /><br><br>
		    <textarea style="width: 83%" rows="10" name="mesaj" placeholder="Mesajınız" maxlength="1500" required></textarea><br><br>
		    <input class="input-css" type="submit" value="Yeni Talep Oluştur">
		</form>
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