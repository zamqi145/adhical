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
			<h2>Ayarlar</h2>
			<form action="ayar-kayit.php" method="POST">
				<div class="col-md-6 col-sm-12">
					<?php
						$ayarlar = $conn->query("SELECT * FROM ayarlar WHERE id='1'");
						while ($ayaroku  =  mysqli_fetch_array($ayarlar)) {
							$title		 =  $ayaroku['title'];
							$desc		 =  $ayaroku['description'];
							$keyw		 =  $ayaroku['keywords'];
							$hakkimizda	 =	$ayaroku['hakkimizda'];
							$asbaslik1 	 =  $ayaroku['asbaslik1'];
							$asaciklama1 =  $ayaroku['asaciklama1'];
							$asbaslik2 	 =  $ayaroku['asbaslik2'];
							$asaciklama2 =  $ayaroku['asaciklama2'];
							$asslider1   = 	$ayaroku['asslider1'];
							$asslider2   = 	$ayaroku['asslider2'];
							$rvslider1   = 	$ayaroku['rvslider1'];
							$rvslider2   = 	$ayaroku['rvslider2'];
							$rvslider3   = 	$ayaroku['rvslider3'];
						}
					?>
					<div class="col-md-12" style="text-align: left;">
						<h3>Başlık :</h3>
						<?php
							echo '<textarea style="width: 100%"  rows="4" name="title" maxlength="255" required>'.$title.'</textarea>';
						?>
					</div>
					<div class="col-md-12" style="text-align: left;">
						<h3>Anahtar Kelime :</h3>
						<?php
							echo '<textarea style="width: 100%"  rows="4" name="keyw" maxlength="500" required>'.$keyw.'</textarea>';
						?>
					</div>		
					<div class="col-md-12" style="text-align: left;">
						<h3>Ana Sayfa Başlık 1 :</h3>
						<?php
							echo '<textarea style="width: 100%"  rows="4" name="asbaslik1" maxlength="500" required>'.$asbaslik1.'</textarea>';
						?>
					</div>
					<div class="col-md-12" style="text-align: left;">
						<h3>Reklam Veren Slider 1 :</h3>
						<?php
							echo '<textarea style="width: 100%"  rows="4" name="rvslider1" maxlength="500" required>'.$rvslider1.'</textarea>';
						?>
					</div>
					<div class="col-md-12" style="text-align: left;">
						<h3>Reklam Veren Slider 3 :</h3>
						<?php
							echo '<textarea style="width: 100%"  rows="4" name="rvslider3" maxlength="500" required>'.$rvslider3.'</textarea>';
						?>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="col-md-12" style="text-align: left;">
						<h3>Açıklama :</h3>
						<?php
							echo '<textarea style="width: 100%"  rows="4" name="desc" maxlength="300" required>'.$desc.'</textarea>';
						?>
					</div>	
					<div class="col-md-12" style="text-align: left">
						<h3>Hakkımızda</h3>
						<?php
							echo '<textarea style="width: 100%"  rows="4" name="hakkimizda" maxlength="10000" required>'.$hakkimizda.'</textarea>';
						?>
					</div>
					<div class="col-md-12" style="text-align: left;">
						<h3>Ana Sayfa Açıklama 1 :</h3>
						<?php
							echo '<textarea style="width: 100%"  rows="4" name="asaciklama1" maxlength="2500" required>'.$asaciklama1.'</textarea>';
						?>
					</div>
					<div class="col-md-12" style="text-align: left;">
						<h3>Reklam Veren Slider 2 :</h3>
						<?php
							echo '<textarea style="width: 100%"  rows="4" name="rvslider2" maxlength="500" required>'.$rvslider2.'</textarea>';
						?>
					</div>
				</div>
				<div class="col-md-12" style="min-height: 30px;"></div>
				<div class="col-md-12">
					<input style="border-radius: 5px; padding-top: 10px; padding-bottom: 10px; padding-left: 10px; padding-right: 10px; background-color: lightblue; border-color: lightblue;" type="submit" value="Kaydet" />
				</div>
				<div class="col-md-12" style="min-height: 60px;"></div>
			</form>
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