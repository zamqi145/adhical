<meta charset="UTF-8">
<?php 
include("../connect.php");
require("../class.phpmailer.php");
$username = stripslashes(strip_tags(htmlspecialchars($_POST['username'])));
$eposta = stripslashes(strip_tags(htmlspecialchars($_POST['eposta'])));
$listele=$conn->query("SELECT * FROM users WHERE eposta='$eposta' && username='$username' ");
while ($sayicimiz = mysqli_fetch_array($listele)) {
    $hak = $sayicimiz['sifreistemehakki'];
}
if($hak>'0'){
	if($username && $eposta){
		if($listele){foreach($listele as $row){
			if($username==$row['username']){
				if($eposta==$row['eposta']) {
					function sifreureteci(){
					$karakterler = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!^+%&/)(=?_-*}][{#";
					$sifre = '';
					for($i=0;$i<13;$i++) {
						$sifre .= $karakterler{rand() % 80};}
						return $sifre;
					}
				    $ad = $username;
				    $alici = $eposta;
				    $password = sifreureteci();
					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPDebug = 1; 
					$mail->SMTPAuth = true; 
					$mail->SMTPSecure = 'ssl'; 
					$mail->Host = "firmabilgisi"; 
					$mail->Port = 465;
					$mail->IsHTML(true);
					$mail->SetLanguage("tr", "phpmailer/language");
					$mail->CharSet  ="utf-8";
					$mail->Username = "mailadresiniz"; 
					$mail->Password = "mailinizinşifresi";
					$mail->SetFrom("mailadresiniz", "gönderenadı"); 
					$mail->AddAddress($alici);
					$mail->Subject = "Konu"; 
					$mail->Body = "Sayın ".$ad.", gelecek zamanlarda şifreniz konusunda daha hassas davranmanız dileğiyle size yeni bir şifre gönderiyoruz. Sistemimize E-posta ve aşağıda yer alan şifre ile giriş yapabilirsiniz. Giriş yaptıktan sonra ayarlar bölümünden şifrenizi değiştirmenizi öneririz. <br /><br /> Adınız - Soyadınız: ".$username."<br /><br />Şifreniz: ".$password;
					if(!$mail->Send()){
						echo "<strong style='color:red'>E-Posta gönderim hatası lütfen bizimle iletişime geçin.</strong>";
					} 
					else {
						$md5pass=md5($password);
						$sifredegissql = $conn->query("UPDATE users SET password='$md5pass' WHERE username='$username' && eposta='$eposta' ");
						$kalanhak = $hak-1;
						$hakdegissql = $conn->query("UPDATE users SET sifreistemehakki=$kalanhak WHERE username='$username' && eposta='$eposta' ");
						echo "<strong style='color: #3c763d'>Yeni şifreniz mail adresinize E-Posta olarak gönderildi. <br></strong>";
					}
				}
				else {
					echo "<strong style='color:red'>Girilen kullanıcı adı ya da E-Posta adresi hatalı. Bilgilerinizden eminseniz bize iletişim bölümünden ulaşabilirsiniz.</strong>";	
				}
			}
			else {
				echo "<strong style='color:red'>Girilen kullanıcı adı ya da E-Posta adresi hatalı. Bilgilerinizden eminseniz bize iletişim bölümünden ulaşabilirsiniz.</strong>";
			}
		}}	
	}
	else {
		echo "<strong style='color:red'>Lütfen boş alan bırakmayın. Bilgilerinizi hatırlamıyorsanız iletişim bölümünden bize ulaşabilirsiniz.</strong>";
	}
}
else {
	echo "<strong style='color:red'>Sizin için uygun gördüğümüz sınırdan daha fazla kez şifrenizi değiştirmek istediniz. Lütfen bizimle iletişime geçin.</strong>";
}
	
?>
