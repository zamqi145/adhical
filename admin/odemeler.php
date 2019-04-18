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
			<h2>Ödemeler</h2>
			<div class="col-md-2">
				<h3>Kullanıcı</h3>	
				<?php
					$bak = $conn->query("SELECT * FROM odemeler ORDER BY id DESC LIMIT 10");
					$sayi = 0;
					while($oku = mysqli_fetch_array($bak)){
						$id[$sayi] = $oku['userid'];
						$sayi++;
					}
					$sayi = 0;
					while($sayi<10){
						$bak = $conn->query("SELECT * FROM users WHERE id = '$id[$sayi]' ");
						while($oku = mysqli_fetch_assoc($bak)){
							$kullanici = $oku['username'];	
						}
						echo "<div class='siteler-div'>".$kullanici."</div>";
						$sayi++;
					}
				?>
			</div>
			<div class="col-md-3">
				<h3>Reklam Adı</h3>	
				<?php
					$bak = $conn->query("SELECT * FROM odemeler ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						echo "<div class='siteler-div'>".$oku['reklamad']."</div>";
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Ödeyen</h3>	
				<?php
					$bak = $conn->query("SELECT * FROM odemeler ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						echo "<div class='siteler-div'>".$oku['odemeyapan']."</div>";
					}
				?>
			</div>
			<div class="col-md-3">
				<h3>Kart No</h3>	
				<?php
					$bak = $conn->query("SELECT * FROM odemeler ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						echo "<div class='siteler-div'>".$oku['kartno']."</div>";
					}
				?>
			</div>
			<div class="col-md-2">
				<h3>Durumu</h3>	
				<?php
					$bak = $conn->query("SELECT * FROM odemeler ORDER BY id DESC LIMIT 10");
					while($oku = mysqli_fetch_array($bak)){
						$onay = $oku['onay'];
						if($onay == 2){
							echo "<div class='siteler-div'>Onaylandı</div>";
						}
						else if($onay == 1){
							echo "<div class='siteler-div'>Beklemede</div>";
						}
						else if($onay == 0){
							echo "<div class='siteler-div'>Reddedildi</div>";
						}
						else {
							echo "<div class='siteler-div'>Geçersiz Değer</div>";
						}
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