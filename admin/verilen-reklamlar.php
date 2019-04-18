<?php
include("../connect.php");
$id = $_SESSION['id'];
if($id){
	$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
	while ($oku = mysqli_fetch_array($sor)) {
		$hesapturu = $oku['hesapturu'];
	}
	if($hesapturu == '4'){
		$sayfa = $_GET['s'];
		if($sayfa==""){
			$sayfa = 1;
		}
		define("FROM_FILE", "1");
?>
		<div class="col-md-3 sidebar">
			<?php 
				include("sidebar.php"); 
			?>
		</div>
		<div class="col-md-9">
			<h2>Verilen Reklamlar</h2>
			<div class="col-md-2">
				<h3>Kullanıcı</h3>	
				<?php
					$sayfasay 	 = $sayfa-1;
					$sayilarimiz = $sayfasay*10+1;
					$sayfacarpim = $sayfa*10;
					$bak = $conn->query("SELECT * FROM verilenreklamlar WHERE id>='$sayilarimiz' && id<='$sayfacarpim' ");
					while($oku = mysqli_fetch_array($bak)){
						$userid = $oku['userid'];
						$sorgu = $conn->query("SELECT * FROM users WHERE id='$userid' ");
						while($okuyucu = mysqli_fetch_array($sorgu)){
							echo '<div class="siteler-div">'.$okuyucu['username'].'</div>';
						}
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Reklam Adı</h3>
				<?php 
					$sayfasay 	 = $sayfa-1;
					$sayilarimiz = $sayfasay*10+1;
					$sayfacarpim = $sayfa*10;
					$bak = $conn->query("SELECT * FROM verilenreklamlar WHERE id>='$sayilarimiz' && id<='$sayfacarpim' ");
					while($oku = mysqli_fetch_array($bak)){
						echo '<div class="siteler-div">'.$oku['ad'].'</div>';
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Görme</h3>
				<?php 
					$sayfasay 	 = $sayfa-1;
					$sayilarimiz = $sayfasay*10+1;
					$sayfacarpim = $sayfa*10;
					$bak = $conn->query("SELECT * FROM verilenreklamlar WHERE id>='$sayilarimiz' && id<='$sayfacarpim' ");
					while($oku = mysqli_fetch_array($bak)){
						echo '<div class="siteler-div">'.$oku['gorme'].'</div>';
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Tıklama</h3>
				<?php 
					$sayfasay 	 = $sayfa-1;
					$sayilarimiz = $sayfasay*10+1;
					$sayfacarpim = $sayfa*10;
					$bak = $conn->query("SELECT * FROM verilenreklamlar WHERE id>='$sayilarimiz' && id<='$sayfacarpim' ");
					while($oku = mysqli_fetch_array($bak)){
						echo '<div class="siteler-div">'.$oku['tiklama'].'</div>';
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Durumu</h3>
				<?php 
					$sayfasay 	 = $sayfa-1;
					$sayilarimiz = $sayfasay*10+1;
					$sayfacarpim = $sayfa*10;
					$bak = $conn->query("SELECT * FROM verilenreklamlar WHERE id>='$sayilarimiz' && id<='$sayfacarpim' ");
					while($oku = mysqli_fetch_array($bak)){
						$aonay  = $oku['aonay'];
						$durumu = $oku['durumu'];
						$kalanodeme = $oku['kalanodeme'];
						if($aonay==1 && $durumu==1 && $kalanodeme>=2){
							echo '<div class="siteler-div">Yayında</div>';
						}
						else if($aonay==1 && $durumu==0 && $kalanodeme>=2) {
							echo '<div class="siteler-div">Yayıncı Onaylamadı</div>';
						}
						else if($aonay==0 && $durumu==1 && $kalanodeme>=2) {
							echo '<div class="siteler-div">Admin Onaylamadı</div>';
						}
						else if($aonay==0 && $durumu==0) {
							echo '<div class="siteler-div">Hiç Onaylanmadı</div>';
						}
						else {
							echo '<div class="siteler-div">Bakiye Bitti</div>';
						}
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Detay</h3>
				<?php 
					$bak = $conn->query("SELECT * FROM verilenreklamlar WHERE id>='$sayilarimiz' && id<='$sayfacarpim' ");
					while($oku = mysqli_fetch_array($bak)){
						$reklamid = $oku['id'];
						echo '<a href="detaylar.php?reklamid='.$reklamid.'"><div class="siteler-div">Detaylar</div></a>';
					}
				?>
			</div>
			<div class="col-md-12 col-sm-12" style="margin-top: 40px;">
				<?php
					$sayfasayilardan = 0;				
					$sayfanumara = $sayfa;
					$bak = $conn->query("SELECT * FROM verilenreklamlar");
					$say = $bak->num_rows;
					$tumsayfa = ceil($say/10);
					if($sayfanumara>$tumsayfa-9){
						if($tumsayfa-9>0){
							$sayfanumara = $tumsayfa-9;
						}
					}
					if($sayfanumara>1){
						echo '<a href="verilen-reklamlar.php"><input style="color: black" type="button" value="İlk Sayfa"></a>';
						$snum = $sayfanumara - 1;
						if($snum>1){
							echo '<a href="verilen-reklamlar.php?s='.$snum.'"><input style="color: black" type="button" value="'.$snum.'"></a>';
						}
					}	
					while($sayfasayilardan<10){
						$sayfasayilardan++;
						if($sayfanumara<=ceil($say/10)){
							echo '<a href="verilen-reklamlar.php?s='.$sayfanumara.'"><input style="color: black" type="button" value="'.$sayfanumara.'"></a>';
							$sayfanumara++;
						}
					}
					if($sayfa<ceil($say/10)){
						echo '<a href="verilen-reklamlar.php?s='.$tumsayfa.'"><input style="color: black" type="button" value="Son Sayfa"></a>';
					}
				?>
			</div>
		</div>
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