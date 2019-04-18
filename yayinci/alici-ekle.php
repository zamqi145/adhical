<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '2'){
	$titl = "Alıcı Bilgileri Oluştur - Reklamınız";
    $desc = "Alıcı bilgileri oluşturabilmenizi yayıncı profil sayfası.";
    $keyw = "reklamınız alici oluşturma, reklamınız alici bilgileri oluşturma";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 1%; margin-bottom: 1%;">
	<h1>Alıcı Ekle</h1>
	<h3 style="margin-bottom: 2%">Ödeme alacağınız hesap bilgilerini ekleyin.</h3>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php if($oku['onay']=='1'){
			echo '<form action="../islem/alici-ekle.php" method="POST">
				<h3>Alıcı Bilgilerinizi Oluşturun</h3>
				<input type="text" maxlength="50" name="hesapsahibi" placeholder="Hesap Sahibi" required/>
				<br /><br />
				<input type="text" maxlength="30" name="banka" placeholder="Banka Adı" required/>
				<br /><br />
				<input style="width: 50px" type="text" maxlength="4" name="kartno1" placeholder="_ _ _ _" required/>
				<input style="width: 50px" type="text" maxlength="4" name="kartno2" placeholder="_ _ _ _" required/>
				<input style="width: 50px" type="text" maxlength="4" name="kartno3" placeholder="_ _ _ _" required/>
				<input style="width: 50px" type="text" maxlength="4" name="kartno4" placeholder="_ _ _ _" />
				<br /><br />
				<input style="color: #000; background-color: aqua; border-color: aqua; padding: 10px; padding-left: 20px; padding-right: 20px; border-radius: 8px" type="submit" value="Alıcı Ekle"/>
				</form>
				<h4 style="margin-top: 2%;">Ödemeler papara ve ininal dışında sanal bankalara yapılmamaktadır. Ayrıca havale/eft ücretleri kullanıcı ödemelerinden düşülmektedir.</h4 st><br />';
			}
			else{
				echo "Hesabınız henüz onaylanmamıştır. Lütfen onay alana kadar bekleyiniz.";
			} 
		?>
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