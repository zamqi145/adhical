<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '1'){
	$titl = "Ödeme Bildir - Reklamınız";
    $desc = "Reklam verenlerin ödemelerini bildirdiği sayfa. Bu sayfadan yaptığınız ödemeleri incelenmesi için yöneticilere ödemenizi bildirebilirsiniz.";
    $keyw = "reklamınız reklam veren ödeme bildir sayfası, reklamınız ödeme bildir, reklamınız ödeme bildirme";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 k0">
	<h1>Ödeme Bildir</h1>
	<div class="col-sm-12 col-md-12 col-xm-12">
		<form action="../islem/odeme-bildir.php" method="POST">
			<h3>Reklam Adını Gir</h3>
			<input class="odeme-input" type="text" maxlength="20" name="reklamad" placeholder="Reklam Adı" required/>
			<br /><br />
			<input class="odeme-input" type="text" maxlength="20" name="hesapad" placeholder="Banka Adı" required/>
			<br /><br />
			<input class="odeme-input" type="text" maxlength="20" name="odemeyapan" placeholder="Ödeme Yapan" required/>
			<br /><br />
			<input class="odeme-input" type="text" maxlength="20" name="kartno" placeholder="Kart NO / İBAN" required/>
			<br /><br />
			<input class="odeme-input" type="text" maxlength="20" name="odememiktari" placeholder="Ödeme Miktarı" required/>
			<br /><br />
			<input class="input-css" type="submit" value="Ödeme Bildir"> 
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