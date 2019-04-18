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
			<h2>Açık Arayanlar</h2>
			<div class="col-md-6">
				<h3>Üye Olmayan</h3>
				<div class="col-md-4">
					<h4>Saat</h4>
					<?php
						$bak = $conn->query("SELECT * FROM acikarayan ORDER BY id DESC LIMIT 10");
						while ($oku = mysqli_fetch_array($bak)) {
							echo '<div class="siteler-div">'.$oku['saat'].'</div>';
						}
					?>					
				</div>
				<div class="col-md-4">
					<h4>Tarih</h4>
					<?php
						$bak = $conn->query("SELECT * FROM acikarayan ORDER BY id DESC LIMIT 10");
						while ($oku = mysqli_fetch_array($bak)) {
							echo '<div class="siteler-div">'.$oku['tarih'].'</div>';
						}
					?>
				</div>
				<div class="col-md-4">
					<h4>Detay</h4>
					<?php
						$bak = $conn->query("SELECT * FROM acikarayan ORDER BY id DESC LIMIT 10");
						while ($oku = mysqli_fetch_array($bak)) {
							echo '<div class="siteler-div">Detay</div>';
						}
					?>
				</div>
			</div>
			<div class="col-md-6">
				<h3>Üye Olan</h3>
				<div class="col-md-4">
					<h4>Kullanıcı</h4>
					<?php
						$bak = $conn->query("SELECT * FROM acikarayanuser ORDER BY id DESC LIMIT 10");
						while($oku = mysqli_fetch_array($bak)){
							$userid = $oku['userid'];
							$sorgu = $conn->query("SELECT * FROM users WHERE id='$userid' ");
							while($okuyucu = mysqli_fetch_array($sorgu)){
								echo '<div class="siteler-div">'.$okuyucu['username'].'</div>';
							}
						}
					?>					
				</div>
				<div class="col-md-4">
					<h4>Tarih</h4>
					<?php
						$bak = $conn->query("SELECT * FROM acikarayanuser ORDER BY id DESC LIMIT 10");
						while ($oku = mysqli_fetch_array($bak)) {
							echo '<div class="siteler-div">'.$oku['tarih'].'</div>';
						}
					?>
				</div>
				<div class="col-md-4">
					<h4>Detay</h4>
					<?php
						$bak = $conn->query("SELECT * FROM acikarayanuser ORDER BY id DESC LIMIT 10");
						while ($oku = mysqli_fetch_array($bak)) {
							echo '<div class="siteler-div">Detay</div>';
						}
					?>
				</div>
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