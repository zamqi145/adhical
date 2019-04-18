<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '2'){
	$titl = "Reklam Yayıncı Ayarları - Reklamınız";
    $desc = "Reklam yayıncı ayarlarınızın bulunduğu sayfa. Bu sayfadan hesap bilgilerinizi inceleyebilirsiniz.";
    $keyw = "reklamınız reklam yayıncı ayarlar sayfası, reklamınız hesap ayarları, reklamınız ayarları";
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
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-bottom: 3%; font-size: 18px;">
	<h1>Ayarlar</h1>
	<h3 style="margin-bottom: 2%;">Hesabınız hakkındaki bilgileri buradan görebilirsiniz.</h3>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<h2>Hesap Sahibi Bilgileri</h2>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hesap-sahibi" style="border: solid 1px; padding-top: 4%; padding-bottom: 5%; ">
			<form action="../islem/odeme-durumu.php" method="POST">
				<?php 
					$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
					while ($oku = mysqli_fetch_array($sor)) {
					    if($oku['id'] == $id) {
					    	$odemedurumu = $oku['odemedurumu'];
					    	if($odemedurumu=='1'){
					    		$odemedurumu = 'Ödeme Almak İstiyorum';
					    	}
					    	else if($odemedurumu=='0'){
					    		$odemedurumu = 'Ödeme Almak İstemiyorum';
					    	}
							echo '<p style="color: #000 !important">Hesap Sahibi: '.$oku['username'].'</p>'.'<p style="color: #000 !important">E-Posta Adresi: '.$oku['eposta'].'</p>';
							echo '<p style="color: #000 !important">Hesap Durumu: ';
							if($oku['onay']=='1'){echo "Aktif";}else{echo "Pasif";};
							echo '</p>';
							echo '<p style="color: #000 !important">Kayıtta Kullanılan Domain: '.$oku['url'].'</p>';
							echo '<p style="color: #000 !important">Bu Ayki Ödeme Durumunuz (Seçili olan: '.$odemedurumu.'):</p>
							<select name="odemedurumu" style="margin-bottom:1%;">
							  <option>Ödeme Almak İstiyorum</option>
							  <option>Ödeme Almak İstemiyorum</option>
							</select>
							<p style="color: #000 !important">Eğer Ödeme Almak İstiyorum seçeneğini seçerseniz kazancınız 20 TL üstündeyse hafta başı ödeme yapılır.</p>
							<input style="color: #000; background-color: aqua; border-color: aqua; padding: 10px; padding-left: 20px; padding-right: 20px; border-radius: 8px" type="submit" value="Bilgileri Güncelle"/>
							';
					    }
					}
				?>
			</form>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<h2>Şifre Değiştirme Alanı</h2>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border: solid 1px; padding-top: 1%;padding-bottom: 3%;">
			<form id="frm">
		    	<div id="sonuc"></div><br />
		        <p>Eski Şifreniz:</p><input type="password" name="password" placeholder="Eski Şifreniz" required /><br /><br />
		        <p>Yeni Şifreniz:</p><input type="password" name="newpassword" placeholder="Yeni Şifreniz" required /><br /><br />
		        <p>Yeni Şifreniz (Tekrar):</p><input type="password" name="repeatnewpassword" placeholder="Yeni Şifreniz (Tekrar)" required /><br /><br />
		        <input style="color: #000; background-color: aqua; border-color: aqua; padding: 10px; padding-left: 20px; padding-right: 20px; border-radius: 8px" type="submit" value="Şifremi Değiştir"/>
		    </form>
		</div>		
	</div>
</div>
<?php  include("footer.php"); }
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