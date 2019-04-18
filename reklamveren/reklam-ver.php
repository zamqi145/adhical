<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
	$hesapturu = $oku['hesapturu'];
	$onay = $oku['onay'];
}
if($hesapturu == '1'){
	$titl = "Reklam Ver - Reklamınız";
    $desc = "Reklam verebilmeniz için hazırladığımız reklam verme sayfası.";
    $keyw = "reklamınız reklam verme, reklamınız reklam sistemi, internet reklamcılığı";
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
	<h1 class="sh3">Reklam Verin</h1>
	<?php
		if($onay=='1'){
			$adimsayisi = $_GET['adim'];
			$tursay = $_GET['tur'];
			if($adimsayisi==1 || $adimsayisi==""){
				echo '
					<div class="col-xs-1 col-md-1"></div>
					<div class="col-xs-10 col-md-10 col-sm-12 col-xs-12">
						<h3 class="sh3">Reklam Türü Seçiniz</h3>
						<a href="reklam-ver?adim=2&tur=1">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 reklam-tur">
								<h3>Görüntülü Reklam</h3>
								<img width="180px" height="180px" src="/img/reklamyerresmi/1.png" alt="Örnek Reklam Yeri" title="Örnek Reklam Yeri">
								<p>Web sitelerindeki reklam alanlarında hazırladığınız görsel ile reklam vermek için bu reklam türünü seçmelisiniz.</p>
							</div>
						</a>
						<a href="reklam-ver?adim=2&tur=2">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 reklam-tur">
								<h3>Düz Metin Reklam</h3>
								<img width="180px" height="180px" src="/img/reklamyerresmi/1.png" alt="Örnek Reklam Yeri" title="Örnek Reklam Yeri">
								<p>Web sitelerindeki reklam alanlarında hazırladığınız başlık ve açıklamanın alt alta yazılmış şekli ile reklam vermek için bu reklam türünü seçmelisiniz.</p>
							</div>
						</a>
						<a href="reklam-ver?adim=2&tur=3">
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 reklam-tur">
								<h3>Yan Metin Reklam</h3>
								<img width="180px" height="180px" src="/img/reklamyerresmi/2.png" alt="Örnek Reklam Yeri" title="Örnek Reklam Yeri">
								<p>Web sitelerindeki reklam alanlarında hazırladığınız başlık ve açıklamanın yan yana yazılmış şekli ile reklam vermek için bu reklam türünü seçmelisiniz.</p>
							</div>
						</a>
					</div>
				';
			}
			else if($adimsayisi==2 && $tursay==1){
				echo '<div class="col-md-2"></div>
				<div class="col-md-8 col-sm-12" style="height: auto; border: solid 1px; border-color: #515769; padding-top: 2%;padding-bottom: 1%;">
					<form action="../islem/reklam-ver.php?tur='.$tursay.'" method="POST" enctype="multipart/form-data">
						<div class="col-md-6 col-sm-6" style="padding-left: 5%;">
							<h3>Reklam Adı</h3>
							<input style="border-bottom: solid 1px !important; border:none;" type="text" maxlength="20" name="ad" placeholder="Reklam Adı" required/>
							<br /><br /><br />
							<h3>Reklam Başlığı</h3>
							<input style="border-bottom: solid 1px !important; border:none;" type="text" maxlength="100" name="title" placeholder="Reklam Başlığı" required/>
							<br /><br /><br />
							<h3>Reklam Kategorisi</h3>
							<select name="kategori">
							  <option>E-Ticaret</option>
							  <option>Blog</option>
							  <option>Haber</option>
							  <option>Sağlık</option>
							  <option>Eğitim</option>
							  <option>Yazılım</option>
							  <option>Tasarım</option>
							  <option>Hosting</option>
							  <option>İnternet</option>
							  <option>Parfüm</option>
							  <option>Youtube Kanalı</option>
							  <option>Reklamcılık</option>
							  <option>Tanıtım</option>
							  <option>Diğer</option>
							</select>
							<br /><br /><br />
							<h3>Reklam Boyutu</h3>
							<select name="boy">
							  <option>728 x 90</option>
							  <option>336 x 280</option>
							  <option>320 x 100</option>
							  <option>300 x 250</option>
							  <option>300 x 600</option>
							</select>
							<br /><br /><br />
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-4 col-sm-4">
							<h3>Web Site Linki</h3>
							<input style="border-bottom: solid 1px !important; border:none;" type="text" maxlength="50" name="link" placeholder="Web Site Linkiniz" required/>
							<br /><br /><br />
							<h3>Bütçeniz</h3>
							<input style="border-bottom: solid 1px !important; border:none;" type="text" maxlength="4" name="odeme" placeholder="Reklam Bütçeniz" required/>
							<br /><br /><br />
							<h3>Reklam Resmi</h3><br />
							<input type="file" name="resim" accept="image/jpeg,image/png,image/jpg" required/>
							<br /><br /><br />
						</div>
						<div class="col-md-12 col-sm-12">
							<center><input class="input-css" type="submit" value="Reklam Verin"></center>
						</div>
					</form>
				</div>';
			}
			else if(($adimsayisi == 2 && $tursay == 2) || ($adimsayisi==2 && $tursay == 3)){
				echo '<div class="col-md-1 col-sm-1"></div>
				<div class="col-md-10 col-sm-10" style="height: auto; border: solid 1px; border-color: #515769;padding-top: 5%;padding-bottom: 5%;">
					<form action="../islem/reklam-ver.php?tur='.$tursay.'" method="POST" enctype="multipart/form-data">
						<div class="col-md-6 col-sm-6" style="padding-left: 5%;">
							<h3>Reklam Adı</h3>
							<input style="border-bottom: solid 1px !important; border:none;" type="text" maxlength="20" name="ad" placeholder="Reklam Adı" required/>
							<br /><br /><br />
							<h3>Reklam Açıklaması</h3>
							<input style="border-bottom: solid 1px !important; border:none;" type="text" maxlength="1000" name="aciklama" placeholder="Reklam Açıklaması" required/>
							<br /><br /><br />
							<h3>Bütçeniz</h3>
							<input style="border-bottom: solid 1px !important; border:none;" type="text" maxlength="4" name="odeme" placeholder="Reklam Bütçeniz" required/>
							<br /><br /><br />
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-4 col-sm-4">
							<h3>Reklam Başlığı</h3>
							<input style="border-bottom: solid 1px !important; border:none;" type="text" maxlength="300" name="baslik" placeholder="Reklamınızın Başlığı" required/>
							<br /><br /><br />
							<h3>Web Site Linki</h3>
							<input style="border-bottom: solid 1px !important; border:none;" type="text" maxlength="50" name="link" placeholder="Web Site Linkiniz" required/>
							<br /><br /><br />
							<h3>Reklam Boyutu</h3>
							<select name="boy">
							  <option>728 x 90</option>
							</select>
							<br /><br /><br />
						</div>
						<div class="col-md-12 col-sm-12">
							<input type="hidden" value="2" name="tur">
							<center><input style="border-radius: 8px; background-color: lightblue; border-color: lightblue; padding: 7px;" type="submit" value="Reklam Verin"></center>
						</div>
					</form>
				</div>';
			}
			else {
				echo "<p style='color: red; text-align: center; font-size: 30px; margin-top: 40px;'>Geçersiz İşlem..</p>";
			}
		}
		else {
			echo '<h3>Onaysız hesap</h3>';
		}
	?>
</div>

<?php  include("footer.php");}
else {
		echo '<meta charset="UTF-8">';
		echo "Yetki dışı giriş";
  		header("refresh:2; url=../islem/cikis.php");
	}
}
else{
	echo '<meta charset="UTF-8">';
	echo "Lütfen Giriş Yapın";
  	header("refresh:2; url=../islem/cikis.php");
}
?>