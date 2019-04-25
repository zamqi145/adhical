<meta charset="UTF-8">
<?php 
	include("../connect.php");
	$ad 	= stripslashes(strip_tags(htmlspecialchars($_POST["ad"])));
	$tel 	= stripslashes(strip_tags(htmlspecialchars($_POST["tel"])));
	$eposta	= stripslashes(strip_tags(htmlspecialchars($_POST["eposta"])));
	$konu	= stripslashes(strip_tags(htmlspecialchars($_POST["konu"])));
	$mesaj	= stripslashes(strip_tags(htmlspecialchars($_POST["mesaj"])));
	$tarih	= date("Y-m-d");
	$saat	= date("H:i:s");
	$ip		= $_SERVER["REMOTE_ADDR"];
	if($ad!=""){
		if($tel != ""){
			if($eposta != ""){
				if($mesaj != ""){
					$kayit = $conn->query("INSERT INTO iletisim(ad,eposta,tel,konu,mesaj,tarih,saat,ip) values('$ad','$eposta','$tel','$konu','$mesaj','$tarih','$saat','$ip') ");
					if($kayit){
						echo 'İşlem başarıyla gerçekleştirildi. Bizimle iletişime geçtiğiniz için teşekkür ederiz.<br />';
						echo '<a href="../index.php">Tarayıcınız otomatik yönlendirmeyi desteklemiyorsa ya da direkt yönlenmek istiyorsanız buraya tıklayınız.</a>';
						header("refresh:5; url=../index");
					}
					else {
						echo "İşlem başarısız oldu. Bize info@adhical.com üzerinden ulaşabilirsiniz.";
						header("refresh:3; url=../index");
					}
				}
				else {
					echo "Lütfen mesaj bölümünü boş bırakmayın.";
					header("refresh: 2; url=../index");
				}				
			}
			else {
				echo "Lütfen eposta bölümünü boş bırakmayın.";
				header("refresh: 2; url=../index");
			}
		}
		else {
			echo "Lütfen telefon numarası bölümünü boş bırakmayın.";
			header("refresh: 2; url=../index");
		}
	}
	else {
		echo "Lütfen ad bölümünü boş bırakmayın.";
		header("refresh: 2; url=../index");
	}
?>
