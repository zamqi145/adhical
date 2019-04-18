<?php include("../connect.php"); $id=$_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Kampanyalar - Reklamınız";
    $desc = "Reklam alabilmeniz, reklam analizlerine bakabilmeniz ve gelirlerinizi inceleyebilmeniz için hazırladığımız reklam veren profil sayfası.";
    $keyw = "reklamınız reklam veren profili, reklamınız reklam analizleri, reklamınız gelirleri";
    $ayar = $conn->query("SELECT * FROM ayarlar WHERE id='1' ");
    while ($okuyucu = mysqli_fetch_array($ayar)) {
        $rvslider1 = $okuyucu['rvslider1'];
        $rvslider2 = $okuyucu['rvslider2'];
        $rvslider3 = $okuyucu['rvslider3'];
    }
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<style type="text/css">
@media screen and (min-width: 1199px){
    .footer-big {
        position: relative !important;
    }
}
.rvs1, .rvs2, .rvs3 {
    max-width: 100%;
}
@media screen and (max-width:1200px) {
    .rvs1, .rvs2, .rvs3 {
        text-align: center;
    }
}
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0">
    <h1>Kampanyalarımız</h1>
    <h3 class="sh3">Aktif kampanyalarımıza buradan ulaşabilirsiniz.</h3>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 k1">
        <a href="reklam-ver"><img class="rvs1" src="<?php echo $rvslider1; ?>" alt="Reklam çekişi" title="3 kişiye 100 TL değerinde reklam hediye"></a>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 k2">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k3">
            <a href="reklam-ver"><img class="rvs2" src="<?php echo $rvslider2; ?>" alt="Çekiliş Hakkı" title="10TL reklam için 1 çekiliş hakkı kazanın"></a>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k4">
            <a href="reklam-ver"><img class="rvs3" src="<?php echo $rvslider3; ?>" alt="Çekiliş Hakkı" title="10TL reklam için 1 çekiliş hakkı kazanın"></a>
        </div>
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
  	header("refresh:10; url=../islem/cikis.php");
}
?>