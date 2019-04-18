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
<?php
include("../connect.php");
$id = $_SESSION['id'];
if($id){
	define("FROM_FILE", "1");
	$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
	while ($oku = mysqli_fetch_array($sor)) {
		$hesapturu = $oku['hesapturu'];
	}
	if($hesapturu == '4'){
		$url  =  $_SERVER['REQUEST_URI'];
		$tamveri = explode("?", $url);
		$sonveri = explode("=", $tamveri[1]);
		if($sonveri[0]=="iletisimid"){
			$bak = $conn->query("SELECT * FROM iletisim WHERE id='$sonveri[1]'");
			while($yaz = mysqli_fetch_array($bak)){
				$durumu = $yaz['durumu'];
			}
			if($durumu){
				$conn->query("UPDATE iletisim SET durumu='0' WHERE id='$sonveri[1]' ");
			}
			else {
				$conn->query("UPDATE iletisim SET durumu='1' WHERE id='$sonveri[1]' ");
			}
			header("refresh: 0, url=iletisim.php");
		}
		else if($sonveri[0]=="destekid"){
			?>
			<div class="col-md-3 sidebar">
			<?php 
				include("sidebar.php"); 
			?>
			</div>
			<div class="col-md-9">
				<h2>Destek Cevapla</h2>
				<?php
					$sql = $conn->query("SELECT * FROM destek WHERE id='$sonveri[1]' "); 
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
				<div class="col-md-12" style="text-align: left">
					<div class="col-md-12"><h3>Konu: <?php echo $baslik; ?></h3></div>
					<div class="col-md-4"><b>Talep ID: <?php echo $talepid; ?></b></div>
					<div class="col-md-4"><b>Tarih: <?php echo $tarih."<br>".$saat; ?></b></div>
					<div class="col-md-4"><b>Durumu: <?php echo $durumu; ?></b></div>
				</div>
				<div class="col-md-12" style="min-height: 10px;">
					
				</div>
				<?php 
					$sqlimiz = $conn->query("SELECT * FROM destek WHERE talepid='$talepid' ORDER BY id DESC"); 
					$sqlsayi = $sqlimiz->num_rows;
					if($sqlsayi<3){
						$height = $sqlsayi * 120;
					}
					else {
						$height = $sqlsayi * 80;
					}
				echo '<div class="dis-div iki row" style="height: '.$height.'px">';
				?>
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="col-md-12 mesaj">
							<?php
								while($sqlimizoku = mysqli_fetch_array($sqlimiz)){
									if($sqlimizoku['gonderici']){
										echo '<br /><br /><p style="font-size: 18px; text-align:left;">Destek Ekibimiz:</p> <div class="icerik">'.$sqlimizoku["mesaj"].'</div><br /><br /><br />';
									}
									else {
										echo '<p style="font-size: 18px; float: right;">Kullanıcı: <br /><div class="siz">'.$sqlimizoku["mesaj"].'</div><br /><br /><br />';
									}
								}
							?>
						</div>
					</div>
				</div>
				<div class="dis-div uc">
					<div class="col-md-1"></div>
					<div class="col-md-10" style="margin-top: 30px">
						<form action="../../islem/destek-cevap.php?talepyaz=<?php echo $talepid ?>&durumu=<?php echo $durumu ?>" method="POST">
							<textarea name="cevap" maxlength="1500" style="width: 100%;" rows="10" placeholder="Cevabınız.."></textarea>
							<div class="buton">
								<input type="submit" value="Gönder" />
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php
		}
		else if($sonveri[0]=="siteid"){
			$siteveri = $conn->query("SELECT * FROM siteler WHERE id='$sonveri[1]' ");
			while ($siteoku = mysqli_fetch_array($siteveri)) {
				$userid 	= $siteoku['userid'];
				$userveri 	= $conn->query("SELECT * FROM users WHERE id='$userid' ");
				while($useroku = mysqli_fetch_array($userveri)){
					$kullanici = $useroku['username'];
					$numarasi  = $useroku['tel'];
					$kazanc  = $useroku['kazanc'];
					$eposta  = $useroku['eposta'];
					$onay  = $useroku['onay'];
				}
				$site 		= $siteoku['link'];
				$sitebol 	= explode(":", $site);
				if($sitebol[0]!='https' && $sitebol[0]!='http'){
					$site 	= 'http://'.$site;
				}
				$onaykodu	= $siteoku['onaykodu'];
				$onaydurumu = $siteoku['onayd'];
				$tarih 		= $siteoku['a_tarih'];
			}
			?>
			<div class="col-md-3 sidebar">
			<?php 
				include("sidebar.php"); 
			?>
			</div>
			<div class="col-md-9">
				<h2>Site Detayları</h2>
				<form action="detaylar.php?sitedetay" method="POST">
					<div class="col-md-4">
						<h3>Kullanıcı</h3>
						<div class='siteler-div'><?php echo $kullanici; ?></div>
					</div>
					<div class="col-md-4">
						<h3>Site</h3>
						<a href="<?php echo $site."/".$onaykodu.".html" ?>"><div class='siteler-div'><?php echo $site; ?></div></a>
					</div>
					<div class="col-md-4">
						<h3>Onay Kodu</h3>
						<a href="<?php echo $site."/".$onaykodu.".html" ?>"><div class='siteler-div'><?php echo $onaykodu.'.html'; ?></div></a>
					</div>
					<div class="col-md-4">
						<h3>Kazancı</h3>
						<div class='siteler-div'><?php echo $kazanc; ?></div>
					</div>
					<div class="col-md-4">
						<h3>E-Posta</h3>
						<div class='siteler-div'><?php echo $eposta; ?></div>
					</div>
					<div class="col-md-4">
						<h3>Onay</h3>
						<a href="<?php echo $site."/".$onaykodu.".html" ?>"><div class='siteler-div'><?php if($onay){echo "Onaylanmış Kullanıcı";}else{echo "Onaylanmamış Kullanıcı";} ?></div></a>
					</div>
					<div class="col-md-4">
						<h3>Numarası</h3>
						<div class='siteler-div'><?php echo $numarasi; ?></div>
					</div>
					<div class="col-md-4">
						<h3>Site Durumu</h3>
						<div class='siteler-div'><?php if($onaydurumu){echo 'Onaylanmış';}else{echo 'Onaylanmamış';} ?></div>
					</div>
					<div class="col-md-4">
						<h3>Tarih</h3>
						<?php $t = explode("-",$tarih); ?> 
						<div class='siteler-div'><?php echo $t[2]."-".$t[1]."-".$t[0]; ?></div>
					</div>
					<div class="col-md-12" style="min-height: 20px;"></div>
					<div class="col-md-12">
						<input type="hidden" name="siteid" value="<?php echo $sonveri[1]; ?>">
						<input type="hidden" name="onaydurumu" value="<?php echo $onaydurumu; ?>">
						<input style="border-radius: 5px; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; background-color: lightblue; border-color: lightblue;" type="submit" value="Site Durumunu Değiştir" />
					</div>
				</form>
			</div>
			<?php
		}
		else if($sonveri[0]=="sitedetay"){
			$referer 	= $_SERVER['HTTP_REFERER'];
			$onaydurumu = $_POST['onaydurumu'];
			$siteid 	= $_POST['siteid'];
			if($onaydurumu){
				$onaydurumu = 0;
			}
			else {
				$onaydurumu = 1;
			}
			$conn->query("UPDATE siteler SET onayd='$onaydurumu' WHERE id='$siteid'");
			header("refresh: 0, url=".$referer."");
		}
		else if($sonveri[0]=="yaskul"){
			$userid = $sonveri[1];
			$usersql = $conn->query("SELECT * FROM users WHERE id='$userid' ");
			while ($useroku = mysqli_fetch_array($usersql)) {
				$userinid	= $useroku['id'];
				$kullanici  = $useroku['username'];
				$sifrehakki = $useroku['sifreistemehakki'];
				$numara 	= $useroku['tel'];
				$url 		= $useroku['url'];
				$kazanc 	= $useroku['kazanc'];
				$harcama	= $useroku['harcama'];
				$eposta 	= $useroku['eposta'];
				$odemedurumu= $useroku['odemedurumu'];
				$hesapturu 	= $useroku['hesapturu'];
				$onay 		= $useroku['onay'];
				$yasseb 	= $useroku['yasaksebebi'];
				$ktarih 	= $useroku['ktarih'];
				$ip 		= $useroku['ip'];
			}
			$referer = $_SERVER['HTTP_REFERER'];
			?>
			<div class="col-md-3 sidebar">
			<?php 
				include("sidebar.php"); 
			?>
			</div>
			<div class="col-md-9">
				<h2>Yasaklı Kullanıcı Detayları</h2>
				<div class="col-md-4">
					<h3>Kullanıcı</h3>
					<?php
						echo '<div class="siteler-div">'.$kullanici.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Üye ID'si</h3>
					<?php
						echo '<div class="siteler-div">'.$userinid.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Numarası</h3>
					<?php
						echo '<div class="siteler-div">'.$numara.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Web Sitesi</h3>
					<?php
						echo '<div class="siteler-div">'.$url.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Kazancı</h3>
					<?php
						echo '<div class="siteler-div">'.$kazanc.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Harcaması</h3>
					<?php
						echo '<div class="siteler-div">'.$harcama.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>E-Posta Adresi</h3>
					<?php
						echo '<div class="siteler-div">'.$eposta.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Ödeme Durumu</h3>
					<?php
						echo '<div class="siteler-div">'; 
						if($odemedurumu){
							echo 'Ödeme Almak İstiyor';
						}
						else {
							echo 'Ödeme Almak İstemiyor';
						}
						echo '</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Hesap Türü</h3>
					<?php
						echo '<div class="siteler-div">'; 
						if($hesapturu == 1){
							echo 'Reklam Veren';
						}
						else if($hesapturu == 2){
							echo 'Yayıncı';
						}
						else if ($hesapturu == 3) {
							echo 'Analizci';
						}
						else if ($hesapturu == 4){
							echo 'Admin';
						}
						else {
							echo 'Hesap Türü Hatalı';
						}
						echo '</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Şifre İsteme Hakkı</h3>
					<?php
						echo '<div class="siteler-div">'.$sifrehakki.' şifre isteme hakkı kaldı.</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Kayıt Tarihi</h3>
					<?php
						echo '<div class="siteler-div">'.$ktarih.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>IP Adresi</h3>
					<?php
						echo '<div class="siteler-div">'.$ip.'</div>';
					?>
				</div>

				<div class="col-md-12">
					<h3>Yasaklanma Sebebi</h3>
					<?php
						echo '<div class="siteler-div">'.$yasseb.'</div>';
					?>
				</div>
				<div class="col-md-12 col-sm-12" style="min-height: 20px;"></div>
				<div class="col-md-12 col-sm-12">
					<a href="<?php echo $referer;?>"><input style="color: black; border-radius: 5px; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; background-color: lightblue; border-color: lightblue;" type="button" value='Geri Git'></a>
				</div>
			</div>
			<?php
		}
		else if($sonveri[0]=="ytik"){
			$ytikid = $sonveri[1];
			$ytiksql = $conn->query("SELECT * FROM yabancitik WHERE id = '$ytikid' ");
			while($ytikoku = mysqli_fetch_array($ytiksql)){
				$site = $ytikoku['link'];
				$sure = $ytikoku['sure'];
				$tiklananid = $ytikoku['tiklananid'];
				$tekrar = $ytikoku['tekrar'];
				$sehir = $ytikoku['sehir'];
				$ulke  = $ytikoku['ulke'];
			}
			$referer = $_SERVER['HTTP_REFERER'];
			?>
			<div class="col-md-3 sidebar">
			<?php 
				include("sidebar.php"); 
			?>
			</div>
			<div class="col-md-9">
				<h2>Yabancı Tıklama Detayları</h2>
				<div class="col-md-4">
					<h3>Kullanıcı</h3>
					<?php
						$sitesql = $conn->query("SELECT * FROM siteler WHERE link='$site' ");
						while ($siteoku = mysqli_fetch_array($sitesql)) {
							$userid = $siteoku['userid'];
							$usersql = $conn->query("SELECT * FROM users WHERE id = '$userid' ");
							while ($useroku = mysqli_fetch_array($usersql)) {
								$ktarih  = $useroku['ktarih'];
								echo '<div class="siteler-div">'.$useroku['username'].'</div>';
							}
						}
					?>
				</div>
				<div class="col-md-4">
					<h3>Web Sitesi</h3>
					<?php 
						echo '<div class="siteler-div">'.$site.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Süre</h3>
					<?php 
						echo '<div class="siteler-div">'.$sure.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Tıklanan Reklam ID</h3>
					<?php 
						echo '<div class="siteler-div">'.$tiklananid.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Tekrar</h3>
					<?php 
						echo '<div class="siteler-div">'.$tekrar.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Üyelik Tarihi</h3>
					<?php 
						echo '<div class="siteler-div">'.$ktarih.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Şehir</h3>
					<?php 
						echo '<div class="siteler-div">'.$sehir.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Ülke</h3>
					<?php 
						echo '<div class="siteler-div">'.$ulke.'</div>';
					?>
				</div>
				<div class="col-md-12" style="min-height: 20px;"></div>
				<div class="col-md-12"><a href="<?php echo $referer; ?>"><input style="color: black; border-radius: 5px; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; background-color: lightblue; border-color: lightblue;" type="button" value="Geri Git"></a></div>
			</div>
			<?php
		}
		else if($sonveri[0]=="tikid"){
			$tikid = $sonveri[1];
			$tiksql = $conn->query("SELECT * FROM tikipler WHERE id = '$tikid' ");
			while($tikoku = mysqli_fetch_array($tiksql)){
				$site = $tikoku['url'];
				$tiklananid = $tikoku['tiklananid'];
				$fiyat = $tikoku['fiyat'];
				$gecerlilik = $tikoku['gecerlilik'];
				$saat  = $tikoku['saat'];
				$tarih  = $tikoku['tarih'];
				$sehir  = $tikoku['sehir'];
				$ulke  = $tikoku['ulke'];
				$ip = $tikoku['ip'];
			}
			$referer = $_SERVER['HTTP_REFERER'];
			?>
			<div class="col-md-3 sidebar">
			<?php 
				include("sidebar.php"); 
			?>
			</div>
			<div class="col-md-9">
				<h2>Tıklama Detayları</h2>
				<div class="col-md-4">
					<h3>URL</h3>
					<?php 
						echo '<div class="siteler-div">'.$site.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Tıklanan ID</h3>
					<?php 
						echo '<div class="siteler-div">'.$tiklananid.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Fiyat</h3>
					<?php 
						echo '<div class="siteler-div">'.$fiyat.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Gecerlilik</h3>
					<?php 
						echo '<div class="siteler-div">';
						if($gecerlilik){
							echo "Geçerli";
						}
						else {
							echo "Geçersiz";
						}
						echo '</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Saat</h3>
					<?php 
						echo '<div class="siteler-div">'.$saat.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Tarih</h3>
					<?php 
						echo '<div class="siteler-div">'.$tarih.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Şehir</h3>
					<?php 
						echo '<div class="siteler-div">'.$sehir.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Ülke</h3>
					<?php 
						echo '<div class="siteler-div">'.$ulke.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>IP</h3>
					<?php 
						echo '<div class="siteler-div">'.$ip.'</div>';
					?>
				</div>
				<div class="col-md-12" style="min-height: 20px;"></div>
				<div class="col-md-12"><a href="<?php echo $referer; ?>"><input style="color: black; border-radius: 5px; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; background-color: lightblue; border-color: lightblue;" type="button" value="Geri Git"></a></div>
			</div>
			<?php
		}
		else if($sonveri[0]=="reklamid"){
			$reklamid = $sonveri[1];
			$reklamsql = $conn->query("SELECT * FROM verilenreklamlar WHERE id='$reklamid' ");
			while ($reklamoku = mysqli_fetch_array($reklamsql)) {
				$userid = $reklamoku['userid'];
				$ad = $reklamoku['ad'];
				$link = $reklamoku['link'];
				$genislik = $reklamoku['genislik'];
				$yukseklik = $reklamoku['yukseklik'];
				$alt = $reklamoku['alt'];
				$title = $reklamoku['title'];
				$baslik = $reklamoku['baslik'];
				$aciklama = $reklamoku['aciklama'];
				$resim = $reklamoku['resim'];
				$gorme = $reklamoku['gorme'];
				$tiklama = $reklamoku['tiklama'];
				$krs20 = $reklamoku['krs20'];
				$krs30 = $reklamoku['krs30'];
				$krs40 = $reklamoku['krs40'];
				$kalanodeme = $reklamoku['kalanodeme'];
				$odeme = $reklamoku['odeme'];
				$turu = $reklamoku['turu'];
				$indirim = $reklamoku['indirim'];
				$durumu = $reklamoku['durumu'];
				$aonay = $reklamoku['aonay'];
				$vtarih = $reklamoku['vtarih'];
			}
			$referer = $_SERVER['HTTP_REFERER'];
			$usersql = $conn->query("SELECT * FROM users WHERE id='$userid' ");
			while($useroku = mysqli_fetch_array($usersql)){
				$username = $useroku['username'];
			}
		?>
			<div class="col-md-3 sidebar">
			<?php 
				include("sidebar.php"); 
			?>
			</div>
			<div class="col-md-9">
				<h2>Verilen Reklam Detayları</h2>
				<div class="col-md-4">
					<h3>Kullanıcı</h3>
					<?php 
						echo '<div class="siteler-div">'.$username.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Kullanıcı ID</h3>
					<?php 
						echo '<div class="siteler-div">'.$userid.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Reklam Adı</h3>
					<?php 
						echo '<div class="siteler-div">'.$ad.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Reklam Linki</h3>
					<?php 
						echo '<div class="siteler-div">'.$link.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Boyut</h3>
					<?php 
						echo '<div class="siteler-div">'.$genislik.' x '.$yukseklik.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Reklam Türü</h3>
					<?php 
						echo '<div class="siteler-div">';
						if($turu == 1){
							echo 'Görüntülü Reklam';
						}
						else if($turu == 2) {
							echo 'Yan Metin Reklam';
						}
						else if($turu == 3) {
							echo 'Alt Alta Metin Reklam';
						}
						echo '</div>';
					?>
				</div>
				<?php 
				if($turu=='1'){
					echo '<div class="col-md-4">
						<h3>Title</h3>
						<div class="siteler-div">'.$title.'</div>';
					echo '</div>';
					echo '<div class="col-md-4">
						<h3>Alt</h3>';
					echo '<div class="siteler-div">'.$alt.'</div>';
					echo '</div>';
				}
				else {
					echo '<div class="col-md-4">
						<h3>Başlık</h3>';
					echo '<div class="siteler-div">'.$baslik.'</div>';
					echo '</div>
					<div class="col-md-4">
						<h3>Açıklama</h3>';
					echo '<div class="siteler-div">'.$aciklama.'</div>';
					echo '</div>';
				}
				?>
				<div class="col-md-4">
					<h3>Görme</h3>
					<?php 
						echo '<div class="siteler-div">'.$gorme.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Tıklama</h3>
					<?php 
						echo '<div class="siteler-div">'.$tiklama.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>20 Kuruşluk Tıklama</h3>
					<?php 
						echo '<div class="siteler-div">'.$krs20.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>30 Kuruşluk Tıklama</h3>
					<?php 
						echo '<div class="siteler-div">'.$krs30.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>40 Kuruşluk Tıklama</h3>
					<?php 
						echo '<div class="siteler-div">'.$krs40.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Kalan Ödeme</h3>
					<?php 
						echo '<div class="siteler-div">'.$kalanodeme.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Ödeme</h3>
					<?php 
						echo '<div class="siteler-div">'.$odeme.'</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>İndirim Kullanımı</h3>
					<?php 
						echo '<div class="siteler-div">';
						if($indirim==1){
							echo 'Kullanıldı';
						}
						else {
							echo "Kullanılmadı";
						}
						echo '</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Durumu</h3>
					<?php 
						echo '<div class="siteler-div">';
						if($durumu == 1 && $aonay == 1 && $kalanodeme>=2){
							echo 'Yayınlanıyor';
						}
						else if($durumu == 1 && $aonay == 0 && $kalanodeme>=2) {
							echo 'Admin Onayı Bekliyor';
						}
						else if($durumu == 0 && $aonay == 1 && $kalanodeme>=2) {
							echo "Reklam Veren Onayı Bekliyor";
						}
						else if($durumu == 0 && $aonay == 0) {
							echo "Hiç Onaylanmadı";
						}
						else if($durumu == 1 && $aonay == 1 && $kalanodeme<2) {
							echo "Bakiye Bitti";
						}
						echo '</div>';
					?>
				</div>
				<div class="col-md-4">
					<h3>Veriliş Tarihi</h3>
					<?php 
						echo '<div class="siteler-div">'.$vtarih.'</div>';
					?>
				</div>
				<?php
				if($turu == 1){
					echo '<div class="col-sm-12" style="margin-top: 20px;"><a href="'.$link.'"><img src="'.$resim.'" alt="'.$alt.'" title="'.$title.'" /></a></div>';
				}
				?>
				<div class="col-md-12" style="min-height: 20px;"></div>
				<div class="col-md-12"><a href="<?php echo $referer; ?>"><input style="color: black; border-radius: 5px; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; background-color: lightblue; border-color: lightblue; margin-bottom: 20px;" type="button" value="Geri Git"></a></div>
			</div>
		<?php
		}
?>

<?php
	}
	else {
		header("refresh: 0, url=../islem/cikis.php");
	}
}
else {
	header("refresh: 0, url=../");
}
?>