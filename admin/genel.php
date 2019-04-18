<?php
include("../connect.php");
$id = $_SESSION['id'];
if($id){
	$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
	while ($oku = mysqli_fetch_array($sor)) {
		$hesapturu = $oku['hesapturu'];
	}
	if($hesapturu == '4'){
		define("FROM_FILE", "1");
?>
		<div class="col-md-3 sidebar">
			<?php 
				include("sidebar.php"); 
			?>
		</div>
		<div class="col-md-9">
			<h2>Tüm Veriler</h2>
			<div class="col-md-3">
				<h3>Üye Sayısı</h3>
		            <div style="border: solid 1px; min-height: 100px; padding-top: 15%; background-color: #5bff68;">
		                <?php 
		                    $sayi = 0;
		                    $yayinci = 0;
		                    $reklamveren = 0;
		                    $bak = $conn->query("SELECT * FROM users ");
		                    while ($say = mysqli_fetch_array($bak)) {
		                        if($say['hesapturu']=='1'){
		                            $reklamveren++;
		                        }
		                        else if ($say['hesapturu']=='2'){
		                            $yayinci++;
		                        }
		                        $sayi++;
		                    }
		                    echo 'Toplamda '.$sayi.' kişi üye oldu.<br />('.$reklamveren.' reklam veren ve '.$yayinci.' yayinci)';
		                ?>
		            </div>
			</div>
			<div class="col-md-3">
				<h3>Oluşturulan Reklam</h3>
            	<div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: lightblue;">
	                <?php 
	                    $sayi = 0;
	                    $bak = $conn->query("SELECT * FROM reklamlar ");
	                    $sayi = $bak->num_rows;
	                    echo 'Toplamda '.$sayi.' reklam oluşturuldu';
	                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Verilen Reklam</h3>
		        <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: #5dfff0;">
                <?php 
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM verilenreklamlar");
                    $sayi = $bak->num_rows;
                    echo 'Toplamda '.$sayi.' reklam verildi';
                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Ödeme Bildirimi</h3>
	            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: #cacaca;">
                <?php 
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM odemeler");
                    $sayi = $bak->num_rows;
                    echo 'Toplamda '.$sayi.' ödeme bildirildi';
                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Yayıncı Site</h3>
				<div style="border: solid 1px; min-height: 100px; padding-top: 15%; background-color: orange;">
                <?php 
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM siteler");
                    $sayi = $bak->num_rows;
                    echo 'Toplamda '.$sayi.' site eklendi';
                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Yasaklı Site</h3>
	            <div style="border: solid 1px; min-height: 100px; padding-top: 15%;">
	                <?php 
	                    $sayi = 0;
	                    $bak = $conn->query("SELECT * FROM ysite");
		                $sayi = $bak->num_rows;
		                echo 'Toplamda '.$sayi.' kişinin sitesi yasaklandı.';
	                ?>
	            </div>
			</div>
			<div class="col-md-3">
				<h3>Destek</h3>
	            <div style="border: solid 1px; min-height: 100px; padding-top: 15%;">
	                <?php 
		                $sayi = 0;
		                $bak = $conn->query("SELECT * FROM destek");
		                $sayi = $bak->num_rows;
		                echo 'Toplamda '.$sayi.' kişi desteğe yazdı.';
	                ?>
	            </div>
			</div>
			<div class="col-md-3">
				<h3>İletişim</h3>
	            <div style="border: solid 1px; min-height: 100px; padding-top: 15%;">
	                <?php 
	                    $sayi = 0;
	                    $bak = $conn->query("SELECT * FROM iletisim");
		                $sayi = $bak->num_rows;
		                echo 'Toplamda '.$sayi.' kişi iletişime geçti.';
	                ?>
	            </div>
			</div>
			<div class="col-md-3">
				<h3>Görme Sayısı</h3>
				<div style="border: solid 1px; min-height: 100px; padding-top: 15%; background-color: #5bff68;">
                <?php 
                    $tarih = date('Y-m-d');
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM goripler");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Toplamda '.$sayi.' görüntülenme oldu';
                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Geçersiz Görme</h3>
            	<div style="border: solid 1px; min-height: 100px; padding-top: 16%; background-color: lightblue;">
	                <?php 
	                    $tarih = date('Y-m-d');
	                    $sayi = 0;
	                    $bak = $conn->query("SELECT * FROM ggorme");
	                    while ($say = mysqli_fetch_array($bak)) {
	                        $sayi += 1;
	                    }
	                    echo 'Toplamda '.$sayi.' geçersiz görme oldu';
	                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Tıklama Saysı</h3>
		        <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: #5dfff0;">
                <?php 
                    $tarih = date('Y-m-d');
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM tikipler");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Toplamda '.$sayi.' tıklanma oldu';
                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Geçersiz Tıklama</h3>
	            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: #cacaca;">
                <?php 
                    $tarih = date('Y-m-d');
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM gtiklama");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Toplamda '.$sayi.' geçersiz tıklama oldu';
                ?>
            	</div>
			</div>
			<div class="col-md-12">
				<h3>Bloğa Yapılan Yorumlar</h3>
	            <div style="border: solid 1px; min-height: 100px; padding-top: 4%;">
	                <?php 
	                    $sayi = 0;
	                    $bak = $conn->query("SELECT * FROM blogyorum");
		                $sayi = $bak->num_rows;
		                echo 'Toplamda '.$sayi.' yorum yapıldı.';
	                ?>
	            </div>
			</div>
		</div>
<?php
	}
	else {
		header("refresh: 0, url=../islem/cikis.php");
	}
}
else {
	header("refresh: 0, url=../");
}
?>