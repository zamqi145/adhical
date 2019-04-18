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
			<h2>Kullanıcılar Hakkında</h2>
			<div class="col-md-4">
				<h3>Yasaklı Kullanıcılar</h3>
				<div class="col-md-6">
					<h4>Kullanıcı</h4>
					<?php
						$bak = $conn->query("SELECT * FROM users WHERE onay='0' ORDER BY id DESC LIMIT 10");
						while($oku = mysqli_fetch_array($bak)) {
							echo "<div class='siteler-div'>".$oku['username']."</div>";
						}
					?>
				</div>
				<div class="col-md-6">
					<h4>Detay</h4>
					<?php
						$bak = $conn->query("SELECT * FROM users WHERE onay='0' ORDER BY id DESC LIMIT 10");
						while($oku = mysqli_fetch_array($bak)) {
							echo '<a href="detaylar.php?yaskul='.$oku['id'].'"><div class="siteler-div">Detay</div></a>';
						}
					?>
				</div>
			</div>
			<div class="col-md-4">
				<h3>Yasaklı Siteler</h3>
				<div class="col-md-8">
					<h4>URL</h4>
					<?php
						$bak = $conn->query("SELECT * FROM ysite ORDER BY id DESC LIMIT 10");
						while($oku = mysqli_fetch_array($bak)) {
							echo "<div class='siteler-div'>".$oku['url']."</div>";
						}
					?>
				</div>
				<div class="col-md-4">
					<h4>Tarih</h4>
					<?php
						$bak = $conn->query("SELECT * FROM ysite ORDER BY id DESC LIMIT 10");
						while($oku = mysqli_fetch_array($bak)) {
							echo "<div class='siteler-div'>".$oku['ytarih']."</div>";
						}
					?>
				</div>
			</div>
			<div class="col-md-4">
				<h3>Yabancı Tıklama</h3>
				<div class="col-md-6">
					<h4>Kullanıcı</h4>
					<?php
						$bak = $conn->query("SELECT * FROM yabancitik ORDER BY id DESC LIMIT 10");
						while($oku = mysqli_fetch_array($bak)) {
							$url = $oku['link'];
							$sorgu = $conn->query("SELECT * FROM siteler WHERE link='$url' ");
							while ($okuyucu = mysqli_fetch_array($sorgu)) {
								$userid = $okuyucu['userid'];
								$sorg = $conn->query("SELECT * FROM users WHERE id='$userid' ");
								while ($okutucu = mysqli_fetch_array($sorg)) {
									echo "<div class='siteler-div'>".$okutucu['username']."</div>";
								}
							}
						}
					?>
				</div>
				<div class="col-md-6">
					<h4>Detay</h4>
					<?php
					    $bak = $conn->query("SELECT * FROM yabancitik ORDER BY id DESC LIMIT 10");
						while($oku = mysqli_fetch_array($bak)) {
							$url = $oku['link'];
							$sorgu = $conn->query("SELECT * FROM siteler WHERE link='$url' ");
							while ($okuyucu = mysqli_fetch_array($sorgu)) {
								$userid = $okuyucu['userid'];
								$sorg = $conn->query("SELECT * FROM users WHERE id='$userid' ");
								while ($okutucu = mysqli_fetch_array($sorg)) {
									echo '<a href="detaylar.php?ytik='.$oku['id'].'"><div class="siteler-div">Detay</div></a>';
								}
							}
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