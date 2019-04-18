<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Kupon Kodu Gir - Reklamınız";
    $desc = "Kupon kodu giriş sayfası. Bu sayfadan kupon kodlarınızı girebilirsiniz inceleyebilirsiniz.";
    $keyw = "reklamınız kupon kodu giriş sayfası, reklamınız kupon kodu girişi, reklamınız kupon girişi";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0">
	<div class="col-lg-2 col-md-2"></div>
	<div class="col-lg-8 col-md-8 col-sm-12 col-xm-12">
		<h2>Kupon Kodu</h2>
		<form action="../islem/kupon-gir.php" method="POST">
			<h3>Kupon Kodunuz</h3>
			<input type="text" maxlength="19" name="kupon_kod" placeholder="Kupon Kodu" required/>
			<br /><br />
			<h3>Uygulanacak Reklamı Seçin</h3>
			<select name="reklam">
				<?php 
					$sor = $conn->query("SELECT * FROM verilenreklamlar WHERE userid='$id' ");
					$say = $sor->num_rows;
					if($say>0){
						while ($oku = mysqli_fetch_array($sor)) {
							echo '<option>'.$oku['ad'].'</option>';
						}
					}
					else {
						echo "<option>Hiç reklam oluşturmamışsınız.</option>";
					}
				?>
			</select>
			<br /><br />
			<input class="input-css" type="submit" value="Kupon Gir"> 
		</form>
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