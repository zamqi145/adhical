<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '2'){
	$titl = "Reklam Yayıncı Site Başvurusu - Reklamınız";
    $desc = "Site başvurusu yapabilmeniz için hazırladığımız reklam yayıncı profil sayfası.";
    $keyw = "reklamınız reklam yayıncı profili, reklamınız reklam analizleri, reklamınız gelirleri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
    $adimsayisi = $_GET['adim'];
    if($adimsayisi==""){
    	$adimsayisi=1;
    }
?>
<script src="https://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="site-basvurusu.js"></script>
<script type="text/javascript" >
    $(function(){
    });
</script>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 1%; margin-bottom: 1%;">
	<h1>Site Başvurusu Yap</h1>
	<h3 style="margin-bottom: 3.1%;">Yeni web site başvuru alanı.</h3>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php 
			if($adimsayisi == 1){
				echo '
					<form action="site-basvurusu?adim=2" method="POST">
						<h3>Web Site Linkiniz</h3>
						<input type="text" maxlength="50" name="link" placeholder="Ör: https://reklaminiz.com/" required/><br /><br />
						<h3>Onay Yöntemi Seçiniz</h3>
						<select name="yontem">
							<option>Dosya yükleyerek onaylama</option>
						</select><br /><br />
						<input style="color: #000; background-color: aqua; border-color: aqua; padding: 10px; padding-left: 20px; padding-right: 20px; border-radius: 8px" type="submit" value="Site Başvurusu Yap"/>
					</form>	
				';
			}
			else if($adimsayisi == 2){
				$link		= stripslashes(strip_tags(htmlspecialchars($_POST['link'])));
				$a_tarih 	= date("Y-m-d");
				$onaykodu	= rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
				if($onaykodu!=""){
					if($link != ""){
						echo "<form id='frm'>";
							echo '<div id="sonuc"></div>';
							echo $link.' sitesini onaylamak için lütfen <strong style="color: red">'.$onaykodu.'.html</strong> isminde dosya oluşturunuz.';
							$kayit = $conn->query("INSERT INTO siteler(userid,link,onaykodu,a_tarih) values('$id','$link','$onaykodu','$a_tarih') "); 
							if($kayit){}else {$conn->query("UPDATE siteler SET onaykodu='$onaykodu' WHERE link='$link' ");}
					?>
							<input type="hidden" name="link" value="<?php echo $link; ?>">
							<input type="hidden" name="onaykodu" value="<?php echo $onaykodu; ?>">
							<input style="margin-left: 15px; margin-bottom: 20px;padding: 15px; padding-top: 8px; padding-bottom: 8px; background-color: aqua; border-color: aqua; border-radius: 11px;" type="button" id="btn" value="Kontrol Et">
						</form>
						<?php
					}
					else {
						echo "Lütfen link alanını boş bırakmayın.";
						header("refresh:2; url=../yayinci/site-basvurusu");
					}
				}
				else {
					echo "Dosya oluşturulamadı lütfen bize bu durumu bu açıklama ile bildirin.";
					header("refresh:2; url=../yayinci/site-basvurusu");  
				}
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