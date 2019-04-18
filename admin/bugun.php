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
			<h2>Bugünün Verileri</h2>
			<div class="col-md-3">
				<h3>Üye Sayısı</h3>
				<?php 
				$ktarih = date('Y-m-d');
                $sayi = 0;
                $yayinci = 0;
                $reklamveren = 0;
                $bak = $conn->query("SELECT * FROM users WHERE ktarih='$ktarih' ");
                while ($say = mysqli_fetch_array($bak)) {
                    if($say['hesapturu']=='1'){
                        $reklamveren++;
                    }
                    else if ($say['hesapturu']=='2'){
                        $yayinci++;
                    }
                    $sayi++;
                }
				if($sayi == 0){
					echo '<div class="bugun-1">';
				}
				else {
					echo '<div class="bugun-1 bugun-1-2">';
				}
                    echo 'Bugün '.$sayi.' kişi üye oldu.<br />('.$reklamveren.' reklam veren ve '.$yayinci.' yayinci)';
	            ?>
	            </div>
			</div>
			<div class="col-md-3">
				<h3>Oluşturulan Reklam</h3>
				<?php
				$vtarih = date('Y-m-d');
                $bak = $conn->query("SELECT * FROM reklamlar WHERE vtarih='$vtarih' ");
                $sayi = $bak->num_rows;
            	if($sayi == 0){
					echo '<div class="bugun-2">';
				}
				else {
					echo '<div class="bugun-2 bugun-2-2">';
				}
	            	echo 'Bugün '.$sayi.' reklam oluşturuldu';
	            ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Verilen Reklam</h3>
                <?php
                $vtarih = date('Y-m-d');
                $bak = $conn->query("SELECT * FROM verilenreklamlar WHERE vtarih='$vtarih' ");
                $sayi = $bak->num_rows;
                if($sayi == 0){
					echo '<div class="bugun-3">';
				}
				else {
					echo '<div class="bugun-3 bugun-3-2">';
				} 
                	echo 'Bugün '.$sayi.' reklam verildi';
                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Ödeme Bildirimi</h3>
	            <?php 
	            $etarih = date('Y-m-d');
                $bak = $conn->query("SELECT * FROM odemeler WHERE odemetarihi='$etarih' ");
                $sayi = $bak->num_rows;
	            if($sayi == 0){
					echo '<div class="bugun-4">';
				}
				else {
					echo '<div class="bugun-4 bugun-4-2">';
				}
                    echo 'Bugün '.$sayi.' ödeme bildirildi';
                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Yayıncı Site</h3>
				<?php 
                $atarih = date('Y-m-d');
                $bak = $conn->query("SELECT * FROM siteler WHERE a_tarih='$atarih' ");
                $sayi = $bak->num_rows;
                if($sayi == 0){
					echo '<div class="bugun-1">';
				}
				else {
					echo '<div class="bugun-1 bugun-1-2">';
				}
                    echo 'Bugün '.$sayi.' site eklendi';
                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Yasaklı Site</h3>
                <?php 
                $tarih = date("Y-m-d");
                $bak = $conn->query("SELECT * FROM ysite WHERE ytarih='$tarih' ");
                $sayi = $bak->num_rows;
                if($sayi == 0){
					echo '<div class="bugun-2">';
				}
				else {
					echo '<div class="bugun-2 bugun-2-2">';
				}
	                echo 'Bugün '.$sayi.' kişinin sitesi yasaklandı.';
                ?>
	            </div>
			</div>
			<div class="col-md-3">
				<h3>Destek</h3>
	            <?php 
                $tarih = date("Y-m-d");
                $bak = $conn->query("SELECT * FROM destek WHERE tarih='$tarih' ");
            	$sayi = $bak->num_rows;
            	if($sayi == 0){
					echo '<div class="bugun-3">';
				}
				else {
					echo '<div class="bugun-3 bugun-3-2">';
				}
		            echo 'Bugün '.$sayi.' kişi desteğe yazdı.';
	            ?>
	            </div>
			</div>
			<div class="col-md-3">
				<h3>İletişim</h3>
	            <?php 
                $tarih = date("Y-m-d");
                $bak = $conn->query("SELECT * FROM iletisim WHERE tarih='$tarih' ");
                $sayi = $bak->num_rows;
                if($sayi == 0){
					echo '<div class="bugun-4">';
				}
				else {
					echo '<div class="bugun-4 bugun-4-2">';
				}
                	echo 'Bugün '.$sayi.' kişi iletişime geçti.';
	            ?>
	            </div>
			</div>
			<div class="col-md-3">
				<h3>Görme Sayısı</h3>
				<?php 
                $tarih = date('Y-m-d');
                $bak = $conn->query("SELECT * FROM goripler WHERE tarih='$tarih' ");
                $sayi = $bak->num_rows;
				if($sayi == 0){
					echo '<div class="bugun-1">';
				}
				else {
					echo '<div class="bugun-1 bugun-1-2">';
				}
                    echo 'Bugün '.$sayi.' görüntülenme oldu';
                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Geçersiz Görme</h3>
				<?php 
				$tarih = date('Y-m-d');
	            $bak = $conn->query("SELECT * FROM ggorme WHERE tarih='$tarih' ");
	            $sayş = $bak->num_rows;
				if($sayi == 0){
					echo '<div class="bugun-2">';
				}
				else {
					echo '<div class="bugun-2 bugun-2-2">';
				}
	            	echo 'Bugün '.$sayi.' geçersiz görme oldu';
	            ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Tıklama Saysı</h3>
                <?php
                $tarih = date('Y-m-d');
                $bak = $conn->query("SELECT * FROM tikipler WHERE tarih='$tarih' ");
                $sayi = $bak->num_rows;
                if($sayi == 0){
					echo '<div class="bugun-3">';
				}
				else {
					echo '<div class="bugun-3 bugun-3-2">';
				}
                    echo 'Bugün '.$sayi.' tıklanma oldu';
                ?>
            	</div>
			</div>
			<div class="col-md-3">
				<h3>Geçersiz Tıklama</h3>
                <?php
                $tarih = date('Y-m-d');
                $bak = $conn->query("SELECT * FROM gtiklama WHERE tarih='$tarih' ");
                $sayi = $bak->num_rows;
                if($sayi == 0){
					echo '<div class="bugun-4">';
				}
				else {
					echo '<div class="bugun-4 bugun-4-2">';
				}
                    echo 'Bugün '.$sayi.' geçersiz tıklama oldu';
                ?>
            	</div>
			</div>
			<div class="col-md-12">
				<h3>Bloğa Yapılan Yorumlar</h3>
                <?php
                $bak = $conn->query("SELECT * FROM blogyorum WHERE tarih='$tarih' ");
                $sayi = $bak->num_rows;
                if($sayi == 0){
					echo '<div class="bugun-5">';
				}
				else {
					echo '<div class="bugun-5 bugun-5-2">';
				}
	                echo 'Bugün '.$sayi.' yorum yapıldı.';
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