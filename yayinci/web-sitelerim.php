<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '2'){
	$titl = "Sitelerim - Reklamınız";
    $desc = "Reklam alabilmeniz, reklam analizlerine bakabilmeniz ve gelirlerinizi inceleyebilmek için başvurduğunuz ya da onaylanan reklamlar.";
    $keyw = "ad network reklam yayıncı profili, ad network reklam analizleri, ad network gelirleri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 1%; margin-bottom: 1%;">
	<h1>Web Sitelerim</h1>
	<h3 style="margin-bottom: 3.1%;">Web sitelerinizi buradan inceleyebilirsiniz.</h3>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<h2>Web Site Adı</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM siteler WHERE userid='$id' ");
		 	if(mysqli_num_rows($sor)>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
			    		echo $oku['link']."<br /><br />";
			    	}
		  		}
		  	}
		  	else {
		  		echo "Site başvurunuz bulunamadı.";
		  	}
		?>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<h2>Başvuru Tarihi</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM siteler WHERE userid='$id' ");
		 	if(mysqli_num_rows($sor)>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
			    		$gun= substr($oku['a_tarih'], 8,4);
						$ay= substr($oku['a_tarih'], 5, 2);
						$yil= substr($oku['a_tarih'], 0, 4);
				    	echo $gun."-".$ay."-".$yil."<br /><br />";
			    	}
		  		}
		  	}
		  	else {
		  		echo "Site başvurunuz bulunamadı.";
		  	}
		?>
	</div>
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		<h2>Onay Durumu</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM siteler WHERE userid='$id' ");
		 	if(mysqli_num_rows($sor)>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
				    	if($oku['onayd']=='1'){
				    		echo "Onaylanmış Site <br /><br />";
				    	}
				    	else if($oku['onayd']=='0'){
				    		echo "Onaylanmamış Site <br /><br />";
				    	}
				    	else {
				    		echo "HATA";
				    	}
			    	}
		  		}
		  	}
		  	else {
		  		echo "Site başvurunuz bulunamadı.";
		  	}
		?>
	</div>
</div>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center;">
	<a href="site-basvurusu" style="color: black"><input style="color: #000; background-color: aqua; border-color: aqua; padding: 10px; padding-left: 20px; padding-right: 20px; border-radius: 8px" type="submit" value="Site Ekle"/></a>
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