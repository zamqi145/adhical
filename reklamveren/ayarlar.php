<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Reklam Veren Profili - Reklamınız";
    $desc = "Reklam alabilmeniz, reklam analizlerine bakabilmeniz ve gelirlerinizi inceleyebilmeniz için hazırladığımız reklam yayıncı profil sayfası.";
    $keyw = "reklamınız reklam veren profili, reklamınız reklam analizleri, reklamınız gelirleri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<style type="text/css">
@media screen and (min-width: 1199px){
	.footer-big {
		position: relative !important;
	}
}
</style>
<script src="https://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="sifre-degistir.js"></script>
<script type="text/javascript" >
	$(function(){
	});
</script>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0">
	<h1>Ayarlar</h1>
	<h3 class="sh3">Hesabınız hakkındaki bilgileri buradan görebilirsiniz.</h3>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<h2>Hesap Sahibi Bilgileri</h2>
		<div class="hesap-sahibi" style="border: solid 1px; padding: 15px; ">
		<?php 
			$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
			while ($oku = mysqli_fetch_array($sor)) {
			    if($oku['id'] == $id) {
					echo '<p>Hesap Sahibi: '.$oku['username'].'</p>'.'<p>E-Posta Adresi: '.$oku['eposta'].'</p>'.'<p>Telefon Numaranız: '.$oku['tel'].'</p>';
					echo '<p>Veresiye Durumu: ';
					if($oku['veresiyelimiti']==0){
						echo 'Maalesef Şuanda Veresiye Sistemini Kullanamazsınız.';
					}
					else {
						echo "Tebrikler ".$oku["veresiyelimiti"]." TL'ye kadar veresiye sistemimizi kullanabilirsiniz. (Kullanılan: ".$oku['veresiyeharcamasi'].")";
					}
					echo '</p><p>Veresiye Süresi: ';
					if($oku['veresiyelimiti']==0){
						echo 'Maalesef Şuanda Veresiye Sistemini Kullanamazsınız.';
					}
					else {
						echo $oku["veresiyesuresi"]." gün ödemenizi bekletebilirsiniz.";
					}
					echo '</p><p>Hesap Durumu: ';
					if($oku['onay']=='1'){echo "Aktif";}else{echo "Pasif";};
					echo '</p>';
			    }
			}
		?>
		</div>
		<br /><br />
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<center><h2>Şifre Değiştirme Alanı</h2>
		<div class="hesap-sahibi" style="border: solid 1px; padding: 15px; ">
			<div class="form">
		    <form id="frm">
		    	<div id="sonuc"></div><br />
		        <input type="password" name="password" placeholder="Eski şifreniz" required /><br /><br />
		        <input type="password" name="newpassword" placeholder="Yeni şifreniz" required /><br /><br />
		        <input type="password" name="repeatnewpassword" placeholder="Yeni şifrenizi tekrar girin" required /><br /><br />
		        <input type="button" value="Şifremi Değiştir" id="btn">
		    </form>
		    </div>
		</div></center>
		<br /><br />
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
	echo "Lütfen Giriş Yapın";
  header("refresh:2; url=../islem/cikis.php");
}
?>