<meta charset="UTF-8">
<?php 
	include("../connect.php");
	$id = htmlspecialchars($_GET['id']);
	$idson = substr($id , -1);
	$tarih = date("Y-m-d");
	$saat = date("H:i:s");
	if(is_numeric($id)){
		if($idson != "'"){
			if($id>0){
				$sorum = $conn->query("SELECT id FROM verilenreklamlar");
				$sayim = $sorum->num_rows;
				if($id<=$sayim){
					$sor = $conn->query("SELECT * FROM verilenreklamlar WHERE id='$id' ");
				 	while ($oku = mysqli_fetch_array($sor)) {
				 		$link = $oku['link'];
				 	}
					$url = $_SERVER['HTTP_REFERER'];
					$arr = parse_url($url, PHP_URL_HOST);					
					if($arr!=""){
						$sitekontrolsql = $conn->query("SELECT * FROM siteler WHERE link='$arr' && onayd='1' ");
						$sitekontrolsay = $sitekontrolsql->num_rows;
						if($sitekontrolsay){
							$ip =  $_SERVER['REMOTE_ADDR'];
							$time = htmlspecialchars($_GET['time']);
							$time1 = explode(":", $time);
							$saat1 = explode(":", $saat);
							$saatfarki = $saat1[0] - $time1[0];
							$dakikafarki = $saat1[1] - $time1[1];
							$saniyefarki = $saat1[2] - $time1[2];
							$sure = ($saatfarki*3600)+($dakikafarki*60)+($saniyefarki);
							// ip den ülke bulucu başlangıç

							function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
							    $output = NULL;
							    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
							        if ($deep_detect) {
							            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
							                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
							            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
							                $ip = $_SERVER['HTTP_CLIENT_IP'];
							        }
							    }
							    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
							    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
							    $continents = array(
							        "AF" => "Africa",
							        "AN" => "Antarctica",
							        "AS" => "Asia",
							        "EU" => "Europe",
							        "OC" => "Australia (Oceania)",
							        "NA" => "North America",
							        "SA" => "South America"
							    );
							    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
							        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
							        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
							            switch ($purpose) {
							            	case "city":
							                    $output = @$ipdat->geoplugin_city;
							                    break;
							                case "countrycode":
							                    $output = @$ipdat->geoplugin_countryCode;
							                    break;
							            }
							        }
							    }
							    return $output;
							}
							$ulke = ip_info($ip, "Country Code");
							$sehir = ip_info($ip, "City");
							// ip den ülke bulucu bitiş

							// Görüntülenme olmadan tıklama varsa geçersiz saydırıcı başlangıç
							
							$goriplersql = $conn->query("SELECT * FROM goripler WHERE ip = '$ip' ");
							$goriplersay = $goriplersql->num_rows;
							if($goriplersay){
								if($ulke=='TR'){
									$sorg = $conn->query("SELECT * FROM siteler WHERE link='$arr' OR link='www.$arr' OR link='http://$arr' OR link='https://$arr' OR link='http://www.$arr' OR link='https://www.$arr' ");
								 	while ($ok = mysqli_fetch_array($sorg)) {
								 		$userinid = $ok['userid'];
								 	}
									$usersgtiksql = $conn->query("SELECT * FROM users WHERE id='$userinid' ");
									while ($usersgtikoku = mysqli_fetch_array($usersgtiksql)) {
										$usersgtik = $usersgtikoku['gtiklama'];
									}
									if($sure >= 5){
										$soruu = $conn->query("SELECT * FROM ysite WHERE url='$arr' ");
										$sayici = $soruu->num_rows;
										if($sayici==0){
											$sor = $conn->query("SELECT * FROM verilenreklamlar WHERE id='$id' ");
										 	while ($oku = mysqli_fetch_array($sor)) {
										 		$tiklama = $oku['tiklama'];
										 		$tikla = $tiklama + 1 ;
										 		$kalanodeme = $oku['kalanodeme'];
										 		$krs20db = $oku['krs20'];
										 		$krs30db = $oku['krs30'];
										 		$krs40db = $oku['krs40'];
										 		$say = $conn->query("SELECT * FROM tikipler WHERE ip='$ip' ");
												$rows = $say->num_rows;
												if($rows>0 ){
													$sayi = $conn->query("SELECT * FROM gtiklama WHERE ip='$ip' ");
													$row = $sayi->num_rows;
													$conn->query("UPDATE tikipler SET gecerlilik=0 WHERE ip='$ip'");
													if($row==0){
														$addip = $conn->query("INSERT INTO gtiklama(ip,tarih,saat) VALUES('$ip','$tarih','$saat')");
														$usersgtik++;
														$conn->query("UPDATE users SET gtiklama='$usersgtik' WHERE id='$userinid' ");
													}	
													else {
														$teksay = $conn->query("SELECT * FROM gtiklama WHERE ip='$ip' ");
														while($tek=mysqli_fetch_array($teksay)){
															$sayimiz = $tek['tekrar'];
															$sitelinki = $tek['url'];
														}
														$tekr = $sayimiz+1;
														if($tekr==1){
														 	$dongumuz = $conn->query("SELECT * FROM tikipler WHERE ip='$ip' ");
														 	while($okuyucumuz = mysqli_fetch_array($dongumuz)){
														 		$kazanilan  = $okuyucumuz['fiyat'];
														 		$tiklananid = $okuyucumuz['tiklananid'];
														 		$gecerlilik = $okuyucumuz['gecerlilik'];
														 	}
														 	if($gecerlilik==1){
														 		$eskikazanccek = $conn->query("SELECT * FROM users WHERE id='$userinid' ");
															 	while ($eskikazancoku = mysqli_fetch_array($eskikazanccek)) {
															 		$kazanci = $eskikazancoku['kazanc'];
															 	}
															 	$yenikazanc = $kazanci - $kazanilan;
																$conn->query("UPDATE users SET kazanc='$yenikazanc' WHERE id=$userinid ");
																$rvveri = $conn->query("SELECT * FROM verilenreklamlar WHERE id='$id' ");
																while ($rvvoku = mysqli_fetch_array($rvveri)) {
																	$rvtiklama = $rvvoku['tiklama'];
																	$rvkrs20 = $rvvoku['krs20'];
																	$rvkrs30 = $rvvoku['krs30'];
																	$rvkrs40 = $rvvoku['krs40'];
																	$rvkalanodeme = $rvvoku['kalanodeme'];
																}
																$rvtikdus = $rvtiklama-1;
																$conn->query("UPDATE verilenreklamlar SET tiklama='$rvtikdus' WHERE id='$tiklananid' ");
																if($kazanilan=='0.15'){
																	$rvkrs20dus=$rvkrs20-=1;
																	$conn->query("UPDATE verilenreklamlar SET krs20='$rvkrs20dus' WHERE id='$tiklananid' ");
																	$rvkalanodemeart=$rvkalanodeme+0.20;
																	$conn->query("UPDATE verilenreklamlar SET kalanodeme='$rvkalanodemeart' WHERE id='$tiklananid' ");
																}
																else if($kazanilan=='0.25'){
																	$rvkrs30dus=$rvkrs30-=1;
																	$conn->query("UPDATE verilenreklamlar SET krs30='$rvkrs30dus' WHERE id='$tiklananid' ");
																	$rvkalanodemeart=$rvkalanodeme+0.30;
																	$conn->query("UPDATE verilenreklamlar SET kalanodeme='$rvkalanodemeart' WHERE id='$tiklananid' ");
																}
																else if($kazanilan=='0.30'){
																	$rvkrs40dus=$rvkrs40-=1;
																	$conn->query("UPDATE verilenreklamlar SET krs40='$rvkrs40dus' WHERE id='$tiklananid' ");
																	$rvkalanodemeart=$rvkalanodeme+0.40;
																	$conn->query("UPDATE verilenreklamlar SET kalanodeme='$rvkalanodemeart' WHERE id='$tiklananid' ");
																}
														 	}												
														}
														$addtek = $conn->query("UPDATE gtiklama SET tekrar=$tekr WHERE ip='$ip' ");
													}
												}
												else {
													$say = $conn->query("SELECT * FROM kisatik WHERE ip='$ip' ");
													$rows = $say->num_rows;
													if($rows==0){
														$guncelle = $conn->query("UPDATE verilenreklamlar SET tiklama=$tikla WHERE id=$id");
										 				$sorg = $conn->query("SELECT * FROM siteler WHERE link='$arr' OR link='www.$arr' OR link='http://$arr' OR link='https://$arr' OR link='http://www.$arr' OR link='https://www.$arr' ");
													 	while ($ok = mysqli_fetch_array($sorg)) {
													 		$userinid = $ok['userid'];
													 	}
													 	$sayicim = $conn->query("SELECT * FROM users WHERE id='$userinid' ");
														while($kazancsayici=mysqli_fetch_array($sayicim)){
															$kazanc = $kazancsayici['kazanc'];
														}
														$a=0;
														$b=0;
										 				if($sure>=5 && $sure<15){
										 					$krs20db++;
															$kalanodeme -= 0.20;
															$kazan = $kazanc + 0.15;
															$a=1;
														}
														else if($sure>=15 && $sure<30){
															$krs30db++;
															$kalanodeme -= 0.30;
															$kazan = $kazanc + 0.25;
															$b=1;
														}
														else{
															$krs40db++;
															$kalanodeme -= 0.40;
															$kazan = $kazanc + 0.30;
														}
														if($a==1){
															$ipekle = $conn->query("INSERT INTO tikipler(ip,url,tiklananid,fiyat,sehir,ulke,gecerlilik,tarih,saat) VALUES('$ip','$arr','$id','0.15','$sehir','$ulke','1','$tarih','$saat')");
														}
														else if($b==1){
															$ipekle = $conn->query("INSERT INTO tikipler(ip,url,tiklananid,fiyat,sehir,ulke,gecerlilik,tarih,saat) VALUES('$ip','$arr','$id','0.25','$sehir','$ulke','1','$tarih','$saat')");
														}
														else{
															$ipekle = $conn->query("INSERT INTO tikipler(ip,url,tiklananid,fiyat,sehir,ulke,gecerlilik,tarih,saat) VALUES('$ip','$arr','$id','0.30','$sehir','$ulke','1','$tarih','$saat')");
														}
														$guncel = $conn->query("UPDATE verilenreklamlar SET kalanodeme='$kalanodeme' WHERE id=$id ");
														$conn->query("UPDATE verilenreklamlar SET krs20='$krs20db' WHERE id='$id' ");
														$conn->query("UPDATE verilenreklamlar SET krs30='$krs30db' WHERE id='$id' ");
														$conn->query("UPDATE verilenreklamlar SET krs40='$krs40db' WHERE id='$id' ");
														$kazancekle = $conn->query("UPDATE users SET kazanc='$kazan' WHERE id='$userinid' ");
													}
												}
										 	}
										}
									}
									else {
										$say = $conn->query("SELECT * FROM kisatik WHERE ip='$ip' ");
										$rows = $say->num_rows;
										if($rows==0){
											$usersgtik++;
											$ipekle = $conn->query("INSERT INTO kisatik(url,ip,tiksure,tarih,saat) VALUES('$arr','$ip','$sure','$tarih','$saat')");	
											$gecersiztikekle = $conn->query("UPDATE users SET gtiklama='$usersgtik' WHERE id='$userinid' ");
										}
										else {
											$teksay = $conn->query("SELECT * FROM kisatik WHERE ip='$ip' ");
											while($tek=mysqli_fetch_array($teksay)){
												$sayimiz = $tek['tekrar'];
											}
											$tekr = $sayimiz + 1;
											$addtek = $conn->query("UPDATE kisatik SET tekrar=$tekr WHERE ip='$ip' ");
										}
									}
								}
								else {
									$say = $conn->query("SELECT * FROM yabancitik WHERE ip='$ip' ");
									$rows = $say->num_rows;
									if($rows==0){
										$link2 = explode("//",$url);
										$ipekle = $conn->query("INSERT INTO yabancitik(ip,link,url,sure,tiklananid,sehir,ulke) VALUES('$ip','$link2[1]','$url','$sure','$id','$sehir','$ulke')");
									}	
									else {
										$tekrarsayici = $conn->query("SELECT * FROM yabancitik WHERE ip='$ip'");
										while ($tekrarokuyucu = mysqli_fetch_array($tekrarsayici)) {
											$teksayisi = $tekrarokuyucu['tekrar'];
										}
										$tekrar = $teksayisi+1;
										$conn->query("UPDATE yabancitik SET tekrar=$tekrar WHERE ip='$ip' ");
									}
								}
							}
						}
						header("refresh:0;url=$link");
						// Görüntülenme olmadan tıklama varsa geçersiz saydırıcı bitiş
					}
					else {
						header("refresh:0;url=../");
					}
				}
				else {
					echo "Lütfen yaptığımız sisteme zarar vermeye çalışmayın. <br />Eğer bizimle ilgili bir sorun yaşadıysanız bunu dile getirirseniz sorunu çözmek için elimizden geleni yapabiliriz.<br />Eğer sisteme sızıp para ödemeden reklam verme ya da reklam tıklanmasını beklemeden gelir arttırma yolundaysanız lütfen emeğe saygı gösterin ve bu amacınızdan vaz geçin! <br />Ayrıca üzülerek bildirmekteyiz ki sistem üzerinde hesaplarınız bulunuyorsa hesaplarınız en kısa sürede engellenecektir!";
					$ip = $_SERVER['REMOTE_ADDR'];
					$url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
					$sorg = $conn->query("SELECT * FROM acikarayan WHERE ip='$ip' ");
					$sayisi = $sorg->num_rows;
					while($oku=mysqli_fetch_array($sorg)){
						$sayimiz = $oku['tekrar'];
					}
					if($sayisi>0){
						$tek = $sayimiz+1;
						$conn->query("UPDATE acikarayan SET tekrar=$tek WHERE ip='$ip' ");
					}
					else {
						$conn->query("INSERT INTO acikarayan(ip,tekrar,url,tarih,saat) VALUES('$ip','$tekrar','$url','$tarih','$saat') ");
					}
					header("refresh: 15; url=../");
				}
			}
			else {
				echo "Lütfen yaptığımız sisteme zarar vermeye çalışmayın. <br />Eğer bizimle ilgili bir sorun yaşadıysanız bunu dile getirirseniz sorunu çözmek için elimizden geleni yapabiliriz.<br />Eğer sisteme sızıp para ödemeden reklam verme ya da reklam tıklanmasını beklemeden gelir arttırma yolundaysanız lütfen emeğe saygı gösterin ve bu amacınızdan vaz geçin! <br />Ayrıca üzülerek bildirmekteyiz ki sistem üzerinde hesaplarınız bulunuyorsa hesaplarınız en kısa sürede engellenecektir!";
				$ip = $_SERVER['REMOTE_ADDR'];
				$url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
				$sorg = $conn->query("SELECT * FROM acikarayan WHERE ip='$ip' ");
				$sayisi = $sorg->num_rows;
				while($oku=mysqli_fetch_array($sorg)){
					$sayimiz = $oku['tekrar'];
				}
				if($sayisi>0){
					$tek = $sayimiz+1;
					$conn->query("UPDATE acikarayan SET tekrar=$tek WHERE ip='$ip' ");
				}
				else {
					$conn->query("INSERT INTO acikarayan(ip,tekrar,url,tarih,saat) VALUES('$ip','$tekrar','$url','$tarih','$saat') ");
				}
				header("refresh: 15; url=../");
			}
		}
		else {		
			echo "Lütfen yaptığımız sisteme zarar vermeye çalışmayın. <br />Eğer bizimle ilgili bir sorun yaşadıysanız bunu dile getirirseniz sorunu çözmek için elimizden geleni yapabiliriz.<br />Eğer sisteme sızıp para ödemeden reklam verme ya da reklam tıklanmasını beklemeden gelir arttırma yolundaysanız lütfen emeğe saygı gösterin ve bu amacınızdan vaz geçin! <br />Ayrıca üzülerek bildirmekteyiz ki sistem üzerinde hesaplarınız bulunuyorsa hesaplarınız en kısa sürede engellenecektir!";
			$ip = $_SERVER['REMOTE_ADDR'];
			$url = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
			$sorg = $conn->query("SELECT * FROM acikarayan WHERE ip='$ip' ");
			$sayisi = $sorg->num_rows;
			while($oku=mysqli_fetch_array($sorg)){
				$sayimiz = $oku['tekrar'];
			}
			if($sayisi>0){
				$tek = $sayimiz+1;
				$conn->query("UPDATE acikarayan SET tekrar=$tek WHERE ip='$ip' ");
			}
			else {
				$conn->query("INSERT INTO acikarayan(ip,tekrar,url,tarih,saat) VALUES('$ip','$tekrar','$url','$tarih','$saat') ");
			}
			header("refresh: 15; url=../");
		}	
	}
	else {
		echo "ID sayılardan oluşmuyor!".
		header("refresh: 2; url=../");
	}
?>