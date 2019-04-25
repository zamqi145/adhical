<meta charset="UTF-8">
<?php 
include("../connect.php");
if($_POST){
    $eposta    =   stripslashes(strip_tags(htmlspecialchars($_POST["eposta"])));
    $password  =   stripslashes(strip_tags(htmlspecialchars(md5($_POST["password"]))));
    if(!$eposta || !$password){
        echo "<strong style='color:red' id='a'>Lütfen boş alan bırakmayınız.</strong>";
        exit;
    }

    if(!filter_var($eposta, FILTER_VALIDATE_EMAIL)){
        echo "<strong style='color:red'>E-mail adresiniz hatalı.</strong>";
        exit;      
    }
    
    $sor = $conn->query("SELECT * FROM users WHERE eposta='$eposta' and password='$password'");
 	if ($oku = mysqli_fetch_array($sor)) {
 		if($oku['onay']=='1'){
 			if($oku['hesapturu']==0){
 				echo "<strong style='color:red'>Hesabınız banlanmıştır. Daha fazla bilgi için forumdan ya da info@adhical.com adresinden bize ulaşabilirsiniz.</strong>";
 			}
 			else if($oku['hesapturu']==1){
				echo "Giriş İşlemi başarılı.";
				$_SESSION['id'] = $oku['id'];
				?>
				<script type="text/javascript">
					window.location="https://www.site.com/reklamveren/kampanyalarimiz";
				</script>
				<?php
			}
			else if($oku['hesapturu']==2){
				echo "Giriş İşlemi başarılı.";
				$_SESSION['id'] = $oku['id'];
				?>
				<script type="text/javascript">
					window.location="https://www.site.com/yayinci/profil";
				</script>
				<?php
			}
			else if($oku['hesapturu']==3){
				echo "Giriş İşlemi başarılı.";
				$_SESSION['id'] = $oku['id'];
				?>
				<script type="text/javascript">
					window.location="https://www.site.com/analiz/analiz.php";
				</script>
				<?php
			}
			else if($oku['hesapturu']==4){
				echo "Giriş İşlemi başarılı.";
				$_SESSION['id'] = $oku['id'];
				?>
				<script type="text/javascript">
					window.location="https://www.site.com/admin/genel.php";
				</script>
				<?php
			}
			else {
				echo "Hesap Türünüz Hatalı Lütfen Bizimle İletişime Geçin..";
				header("refresh:2 url=../giris-yap");
			}
 		}
 		else if($oku['onay']=='2'){
 			echo "<strong style='color:red'>Giriş işlemi hatalı. Bunun sebebi hesabınızın beklemeye alınmasıdır. Lütfen bu süreçte web sitenizden reklamları kaldırmayın. Tıklama ve görüntülenme ücretleriniz hesabınıza yüklenmeye devam eder sadece bunları göremezsiniz ve gelirinizi çekemezsiniz. Bu işlem bir haftadan uzun sürerse lütfen bizimle iletişime geçin.</strong>";
			header("refresh:5 url=../giris-yap");
 		}
		else{
			echo "<strong style='color:red'>Giriş işlemi hatalı. Bunun sebebi hesabınızın banlanmasıdır.</strong>";
			header("refresh:2 url=../giris-yap");
		}
	}	
	else{
		echo "<strong style='color:red'>Giriş işlemi başarısız.</strong>";
		header("refresh:2 url=../giris-yap");
	}
}
?>
