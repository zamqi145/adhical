<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Kupon Kodu - Reklamınız";
    $desc = "Kupon kodlarınızın bulunduğu sayfa. Bu sayfadan kupon kodlarınızı ve bütçelerini inceleyebilirsiniz.";
    $keyw = "reklamınız kupon kodu sayfası, reklamınız kupon kodu, reklamınız kuponları, reklamınız kupon";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0">
	<div class="col-md-3 col-sm-3">
		<h2>Kupon Sırası</h2>
		<div style="padding-top: 15px; ">
		<?php  
			$i = 1;
			$sor = $conn->query("SELECT * FROM kupon WHERE userid='$id' ");
			$say = $sor->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					echo '<p style="color: #000 !important">'.$i.'</p>';
					$i++;
				}
			}
			else {
				echo "Hiç kupon kodu girmemişsiniz.";
			}
		?>
		</div>
		<br /><br />
	</div>
	<div class="col-md-3 col-sm-3">
		<h2>Kupon Kodu</h2>
		<div style="padding-top: 15px; ">
		<?php  
			$sor = $conn->query("SELECT * FROM kupon WHERE userid='$id' ");
			$say = $sor->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					echo '<p style="color: #000 !important">'.$oku['kupon_kod'].'</p>';
				}
			}
			else {
				echo "Hiç kupon kodu girmemişsiniz.";
			}
		?>
		</div>
		<br /><br />
	</div>
	<div class="col-md-3 col-sm-3">
		<h2>Kupon Miktari</h2>
		<div style="padding-top: 15px; ">
		<?php  
			$sor = $conn->query("SELECT * FROM kupon WHERE userid='$id' ");
			$say = $sor->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					echo '<p style="color: #000 !important">'.$oku['kupon_miktari'].'</p>';
				}
			}
			else {
				echo "Hiç kupon kodu girmemişsiniz.";
			}
		?>
		</div>
		<br /><br />
	</div>
	<div class="col-md-3 col-sm-3">
		<h2>Aktiflik Durumu</h2>
		<div style="padding-top: 15px; ">
		<?php  
			$sor = $conn->query("SELECT * FROM kupon WHERE userid='$id' ");
			$say = $sor->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					if($oku['aktiflik_durumu']==1){
						$durum = 'Onaylanmış';
					}
					else{
						$durum = 'Onaylanmamış';
					}
					echo '<p style="color: #000 !important">'.$durum.'</p>';
				}
			}
			else {
				echo "Hiç kupon kodu girmemişsiniz.";
			}
		?>
		</div>
		<br /><br />
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