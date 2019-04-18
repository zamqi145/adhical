<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Ödemeler - Reklamınız";
    $desc = "Reklam veren ödemelerinizin bulunduğu sayfa. Bu sayfadan ödemeleri inceleyebilirsiniz.";
    $keyw = "reklamınız reklam veren ödemeler sayfası, reklamınız ödemeler, reklamınız ödemeleri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<style type="text/css">
@media screen and (min-width: 1199px){
    .footer-big {
        position: relative !important;
    }
}
</style>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0 o1">
	<h1>Yapılan Ödemeler</h1>
	<div class="col-md-3 col-sm-3">
		<h2>Ödeme Yapan</h2>
		<div style="padding-top: 15px; ">
		<?php  
			$sor = $conn->query("SELECT * FROM odemeler WHERE userid='$id' ");
			$say = $sor->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					echo '<p style="color: #000 !important">'.$oku['odemeyapan'].'</p>';
				}
			}
			else {
				echo "Hiç Ödemeniz Bulunmuyor.";
			}
		?>
		</div>
		<br /><br />
	</div>
	<div class="col-md-2 col-sm-2">
		<h2>Banka</h2>
		<div style="padding-top: 15px; ">
		<?php  
			$sor = $conn->query("SELECT * FROM odemeler WHERE userid='$id' ");
			$say = $sor->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					echo '<p style="color: #000 !important">'.$oku['hesapad'].'</p>';
				}
			}
			else {
				echo "Hiç Ödemeniz Bulunmuyor.";
			}
		?>
		</div>
		<br /><br />
	</div>
	<div class="col-md-2 col-sm-2">
		<h2>İban</h2>
		<div style="padding-top: 15px; ">
		<?php  
			$sor = $conn->query("SELECT * FROM odemeler WHERE userid='$id' ");
			$say = $sor->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					echo '<p style="color: #000 !important">'.$oku['kartno'].'</p>';
				}
			}
			else {
				echo "Hiç Ödemeniz Bulunmuyor.";
			}
		?>
		</div>
		<br /><br />
	</div>
	<div class="col-md-2 col-sm-2">
		<h2>Miktar</h2>
		<div style="padding-top: 15px; ">
		<?php  
			$sor = $conn->query("SELECT * FROM odemeler WHERE userid='$id' ");
			$say = $sor->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					echo '<p style="color: #000 !important">'.$oku['odememiktari'].'</p>';
				}
			}
			else {
				echo "Hiç Ödemeniz Bulunmuyor.";
			}
		?>
		</div>
		<br /><br />
	</div>
	<div class="col-md-3 col-sm-3">
		<h2>Onay Durumu</h2>
		<div style="padding: 15px; ">
		<?php  
			$sor = $conn->query("SELECT * FROM odemeler WHERE userid='$id' ");
			$say = $sor->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					if($oku['onay']=='2'){
						echo '<p style="color: #000 !important">Onaylandı</p>';
					}
					else if($oku['onay']=='1'){
						echo '<p style="color: #000 !important">Onay Bekleniyor</p>';
					}
					else if($oku['onay']=='0'){
						echo '<p style="color: #000 !important">Onaylanmadı</p>';
					}
					else {
						echo '<p style="color: #000 !important">HATA</p>';
					}
				}
			}
			else {
				echo "Hiç Ödemeniz Bulunmuyor.";
			}
		?>
		</div>
		<br /><br />
	</div>
	<div style="text-align: center;">
		<a href="https://www.reklaminiz.com/reklamveren/hesaplarimiz"><input class="input-css" type="button" value="Banka Hesaplarımız"></a>
	</div>	
</div>
<?php  include("footer.php");}
else {
		echo '<meta charset="UTF-8">';
		echo "Yetki dışı giriş";
  		header("refresh:2; url=../islem/cikis.php");
	}
}}
else{
	echo '<meta charset="UTF-8">';
	echo "Lütfen Giriş Yapın";
  	header("refresh:2; url=../islem/cikis.php");
}
?>