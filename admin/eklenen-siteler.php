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
			<h2>Eklenen Siteler</h2>
			<div class="col-md-4">
				<h3>Site Linki</h3>	
				<?php
					$sayfasay 	 = $sayfa-1;
					$sayilarimiz = $sayfasay*10+1;
					$sayfacarpim = $sayfa*10;
					$bak = $conn->query("SELECT * FROM siteler WHERE id>='$sayilarimiz' && id<='$sayfacarpim'");
					while($oku = mysqli_fetch_array($bak)){	
						echo "<div class='siteler-div'>".$oku['link']."</div>";
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Onay Kodu</h3>
				<?php
					$sayfasay 	 = $sayfa-1;
					$sayilarimiz = $sayfasay*10+1;
					$sayfacarpim = $sayfa*10;
					$bak = $conn->query("SELECT * FROM siteler WHERE id>='$sayilarimiz' && id<='$sayfacarpim'");
					while($oku = mysqli_fetch_array($bak)){	
						echo "<div class='siteler-div'>".$oku['onaykodu'].".html</div>";	
					}
				?>
			</div>
			<div class="col-md-3">
				<h3>Durumu</h3>
				<?php 
					$sayfasay 	 = $sayfa-1;
					$sayilarimiz = $sayfasay*10+1;
					$sayfacarpim = $sayfa*10;
					$bak = $conn->query("SELECT * FROM siteler WHERE id>='$sayilarimiz' && id<='$sayfacarpim'");
					while($oku = mysqli_fetch_array($bak)){	
						if($sayi < 10){
							$onaydurumu = $oku['onayd'];
							if($onaydurumu){
								echo "<div class='siteler-div'>Onaylandı</div>";
							}
							else {
								echo "<div class='siteler-div'>Onaylanmadı</div>";
							}
						}
					}
				?>
			</div>
			<div class="col-md-3">
				<h3>Detaylar</h3>
				<?php
					$sayfasay 	 = $sayfa-1;
					$sayilarimiz = $sayfasay*10+1;
					$sayfacarpim = $sayfa*10;
					$bak = $conn->query("SELECT * FROM siteler WHERE id>='$sayilarimiz' && id<='$sayfacarpim'");
					while($oku = mysqli_fetch_array($bak)){	
						$siteninid = $oku['id'];
						echo '<a href="detaylar.php?siteid='.$siteninid.'"><div class="siteler-div">Detaylar</div></a>';
					}
				?>
			</div>
			<div class="col-md-12 col-sm-12" style="margin-top: 40px;">
				<?php
					$sayfasayilardan = 0;				
					$sayfanumara = $sayfa;
					$bak = $conn->query("SELECT * FROM siteler");
					$say = $bak->num_rows;
					$tumsayfa = ceil($say/10);
					if($sayfanumara>$tumsayfa-9){
						$sayfanumara = $tumsayfa-9;
					}
					if($sayfanumara>1){
						echo '<a href="eklenen-siteler.php"><input style="color: black" type="button" value="İlk Sayfa"></a>';
						$snum = $sayfanumara - 1;
						if($snum > 1){
							echo '<a href="verilen-reklamlar.php?s='.$snum.'"><input style="color: black" type="button" value="'.$snum.'"></a>';
						}
					}	
					while($sayfasayilardan<10){
						$sayfasayilardan++;
						echo '<a href="eklenen-siteler.php?s='.$sayfanumara.'"><input style="color: black" type="button" value="'.$sayfanumara.'"></a>';
						$sayfanumara++;
					}
					if($sayfa<ceil($say/10)){
						echo '<a href="eklenen-siteler.php?s='.$tumsayfa.'"><input style="color: black" type="button" value="Son Sayfa"></a>';
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