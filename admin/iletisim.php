<?php
include("../connect.php");
$id = $_SESSION['id'];
if($id){
	$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
	while ($oku = mysqli_fetch_array($sor)) {
		$hesapturu = $oku['hesapturu'];
	}
	if($hesapturu == '4'){
		define("FROM_FILE", "1");
?>
		<div class="col-md-3 sidebar">
			<?php 
				include("sidebar.php"); 
			?>
		</div>
		<div class="col-md-9">
			<h2>İletişim</h2>
			<div class="col-md-2">
				<h3>Kullanıcı</h3>
				<?php
					$bak = $conn->query("SELECT * FROM iletisim ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						echo '<div class="siteler-div">'.$oku['ad'].'</div>';
					}
				?>
			</div>
			<div class="col-md-3">
				<h3>E-Posta</h3>
				<?php
					$bak = $conn->query("SELECT * FROM iletisim ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						echo "<div class='siteler-div'>".$oku['eposta']."</div>";
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Numara</h3>
				<?php 
					$bak = $conn->query("SELECT * FROM iletisim ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)) {
						echo "<div class='siteler-div'>".$oku['tel']."</div>";
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Durumu</h3>
				<?php 
					$bak = $conn->query("SELECT * FROM iletisim ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)) {
						$durumu = $oku['durumu'];
						if($durumu){
							echo "<div class='siteler-div'>Dönüş Yapıldı</div>";
						}
						else {
							echo "<div class='siteler-div'>Dönüş Yapılmadı</div>";
						}
					}
				?>
			</div>
			<div class="col-md-3">
				<h3>Durumu Değiştir</h3>
				<?php 
					$bak = $conn->query("SELECT * FROM iletisim ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)) {
						$sayi 	= $oku['id'];
						$durumu = $oku['durumu'];
						echo '<a href="detaylar.php?iletisimid='.$sayi.'"><div class="siteler-div">Durumu Değiştir</div></a>';
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