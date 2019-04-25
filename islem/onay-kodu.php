<meta charset="utf-8">
<script src="https://code.jquery.com/jquery-2.0.3.min.js" type="text/javascript"></script>
<script type="text/javascript" src="site-onay.js"></script>
<script type="text/javascript" >
    $(function(){
    });
</script>
<?php 	
	include("../connect.php");
	$userid = $_SESSION['id'];
	$link		= stripslashes(strip_tags(htmlspecialchars($_POST['link'])));
	$a_tarih 	= date("Y-m-d");
	$onaykodu	= rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
	if($onaykodu!=""){
		if($link != ""){
			echo "<form action='../yayinci/site-basvurusu?adim=2' method='POST'>";
				echo $link.' sitesini onaylamak için lütfen <strong style="color: red">'.$onaykodu.'.html</strong> isminde dosya oluşturunuz.';
				$kayit = $conn->query("INSERT INTO siteler(userid,link,onaykodu,a_tarih) values('$userid','$link','$onaykodu','$a_tarih') "); 
				if($kayit){}else {$conn->query("UPDATE siteler SET onaykodu='$onaykodu' WHERE link='$link' ");}
		?>
				<input type="hidden" name="link" value="<?php echo $link; ?>">
				<input type="hidden" name="onaykodu" value="<?php echo $onaykodu; ?>">
				<input style="margin-left: 15px; margin-bottom: 20px;padding: 15px; padding-top: 8px; padding-bottom: 8px; background-color: aqua; border-color: aqua; border-radius: 11px;" type="submit" id="btn" value="Kontrol Et">
			</form>
			<?php
		}
		else {
			echo "Lütfen link alanını boş bırakmayın.";
			header("refresh:2; url=../yayinci/site-basvurusu");
		}
	}
	else {
		echo "Dosya adı oluşturulamadı lütfen bize bu durumu bu açıklama ile bildirin.";
		header("refresh:2; url=../yayinci/site-basvurusu");  
	}
?>
