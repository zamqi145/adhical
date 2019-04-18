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
			<h2>Tıklamalar</h2>
			<div class="col-md-3">
				<h3>URL</h3>	
				<?php
					$bak = $conn->query("SELECT * FROM tikipler ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						echo "<div class='siteler-div'>".$oku['url']."</div>";
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>IP</h3>
				<?php 
					$bak = $conn->query("SELECT * FROM tikipler ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						echo "<div class='siteler-div'>".$oku['ip']."</div>";
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Tıklanan ID</h3>
				<?php
					$bak = $conn->query("SELECT * FROM tikipler ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						echo "<div class='siteler-div'>".$oku['tiklananid']."</div>";
					}
				?>
			</div>
			<div class="col-md-1">
				<h3>Fiyat</h3>
				<?php
					$bak = $conn->query("SELECT * FROM tikipler ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						echo "<div class='siteler-div'>".$oku['fiyat']."</div>";
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Geçerlilik</h3>
				<?php
					$bak = $conn->query("SELECT * FROM tikipler ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						$gecerlilik = $oku['gecerlilik'];
						if($gecerlilik){
							echo "<div class='siteler-div'>Geçerli</div>";
						}
						else {
							echo "<div class='siteler-div'>Geçersiz</div>";
						}
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Detaylar</h3>
				<?php
					$bak = $conn->query("SELECT * FROM tikipler ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						$sayi = $oku['id'];
						echo '<a href="detaylar.php?tikid='.$sayi.'"><div class="siteler-div">Detaylar</div></a>';
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