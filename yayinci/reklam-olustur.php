<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '2'){
	$titl = "Reklam Oluştur - Reklamınız";
    $desc = "Reklam oluşturabilmenizi ve reklam durumuna bakabilmeniz için hazırladığımız reklam yayıncı profil sayfası.";
    $keyw = "reklamınız reklam oluşturma, reklamınız reklam sistemi";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 1%; margin-bottom: 10%;">
	<h1>Reklam Oluştur</h1>
	<h3 style="margin-bottom: 3.1%;">Yeni reklam oluşturmak için burayı kullanabilirsiniz.</h3>
	<?php if($oku['onay']=='1'){
		echo '<form action="../islem/reklam-olustur.php" method="POST">
			<h3>Reklam Adı</h3>
			<input type="text" maxlength="20" name="ad" placeholder="Reklam Adı" required/>
			<br /><br />
			<h3>Web Sitenizi Seçin</h3>
			<select name="reklam">';
			$sor = $conn->query("SELECT * FROM siteler WHERE userid='$id' and onayd='1' ");
			$say = $sor->num_rows;
			if($say>0){
				while ($oku = mysqli_fetch_array($sor)) {
					echo '<option>'.$oku['link'].'</option>';
				}
			}
			else {
				echo "<option>Hiç siteniz bulunmuyor.</option>";
			}					
			echo '</select>
			<br /><br />
			<h3>Reklam Boyutu Seçin</h3>
			<select name="boy">
			  <option>728 x 90</option>
			  <option>336 x 280</option>
			  <option>320 x 100</option>
			  <option>300 x 250</option>
			  <option>300 x 600</option>
			</select>
			<br /><br />
			<input style="color: #000; background-color: aqua; border-color: aqua; padding: 10px; padding-left: 20px; padding-right: 20px; border-radius: 8px" type="submit" value="Reklam Oluştur"/>
			</form>';
		}
		else{
			echo "Hesabınız ya da web siteniz henüz onaylanmamıştır. Lütfen onay alana kadar bekleyiniz.";
		} 
	?>
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