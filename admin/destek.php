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
			<h2>Destek</h2>
			<div class="col-md-3">
				<h3>Kullanıcı</h3>
				<?php
					$bak = $conn->query("SELECT * FROM destek ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						$userid = $oku['userid'];
						$sorgu = $conn->query("SELECT * FROM users WHERE id='$userid' ");
						while($okuyucu = mysqli_fetch_array($sorgu)){
							echo '<div class="siteler-div">'.$okuyucu['username'].'</div>';
						}
					}
				?>
			</div>
			<div class="col-md-3">
				<h3>Konu</h3>
				<?php
					$bak = $conn->query("SELECT * FROM destek ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						echo "<div class='siteler-div'>".$oku['baslik']."</div>";
					}
				?>
			</div>
			<div class="col-md-3">
				<h3>Durumu</h3>
				<?php 
					$bak = $conn->query("SELECT * FROM destek ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)) {
						$durumu = $oku['durumu'];
						if($durumu){
							echo "<div class='siteler-div'>Cevaplandı</div>";
						}
						else {
							echo "<div class='siteler-div'>Cevaplanmadı</div>";
						}
					}
				?>
			</div>
			<div class="col-md-3">
				<h3>Cevapla</h3>
				<?php 
					$bak = $conn->query("SELECT * FROM destek ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)) {
						$sayi = $oku['id'];
						echo '<a href="detaylar.php?destekid='.$sayi.'"><div class="siteler-div">Cevapla</div></a>';
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