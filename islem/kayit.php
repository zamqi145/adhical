<meta charset="UTF-8">
<?php 
include("../connect.php");

if($_POST){
    $username  =   stripslashes(strip_tags(htmlspecialchars($_POST["username"])));
    $password  =   stripslashes(strip_tags(htmlspecialchars(md5($_POST["password"]))));
    $eposta    =   stripslashes(strip_tags(htmlspecialchars($_POST["eposta"])));
    //$url       =   stripslashes(strip_tags(htmlspecialchars($_POST["url"])));
    $tel       =   stripslashes(strip_tags(htmlspecialchars($_POST["tel"])));
    $hesapturu =   stripslashes(strip_tags(htmlspecialchars($_POST["hesapturu"])));
	$sozlesme  =   stripslashes(strip_tags(htmlspecialchars($_POST["sozlesme"])));
    $ip        =   htmlspecialchars($_SERVER['REMOTE_ADDR']); 
	$ktarih    =   date("Y-m-d");
    if(!$username || !$password || !$eposta || !$tel || !$hesapturu || !$sozlesme){
        echo "<strong style='color:red' id='a'>Lütfen boş alan bırakmayınız.</strong>";
        exit;
    }

    if(!filter_var($eposta, FILTER_VALIDATE_EMAIL)){
        echo "<strong style='color:red'>E-mail adresiniz hatalı.</strong>";
        exit;      
    }
    if(is_numeric($tel)){
		$insert= $conn->query("INSERT INTO users(username,password,sifreistemehakki,eposta,url,tel,hesapturu,onay,ktarih,ip) VALUES('$username','$password','2','$eposta','GEREK GÖRÜLMEDI','$tel','$hesapturu','1','$ktarih','$ip')");
	    if($insert){
	        echo '<strong style="color:green">Üye olduğunuz için teşekkürler. Sayın </strong>'."<strong style='color:#559DE6'>".strtoupper($username)."</strong> <br /><br />";
            $dbsorgu = $conn->query("SELECT * FROM users WHERE username='$username' && eposta='$eposta' && password='$password' ");
            while($oku = mysqli_fetch_array($dbsorgu)){
                $id = $oku['id'];
            }
            $_SESSION['id'] = $id;
            if($hesapturu==1){
                ?>
                <script type="text/javascript">
                    window.location="https://www.site.com/reklamveren/kampanyalarimiz";
                </script>
                <?php
            }
            else if($hesapturu==2){
                ?>
                <script type="text/javascript">
                    window.location="https://www.site.com/yayinci/profil";
                </script>
                <?php
            }
	    }
	    else{
	      echo '<strong style="color:red">Üzgünüz kayıt olma başarısız oldu.</strong>';
	  	}
    }
    else {
    	echo 'Telefon numaranız sayılardan oluşmalıdır.';
    }
}
?>
