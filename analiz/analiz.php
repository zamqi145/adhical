<meta charset="UTF-8">
<?php include("../connect.php"); $id = $_SESSION['id']; if($id=='1') { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '3'){
?>
<html>
<head>
    <title>Analiz Paneli - Reklamınız</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<h2 style="text-align: center;">Bugünün Verileri</h2>
<div style="background-color: #fff; padding-top: 2%;padding-bottom: 5%;">
    <div class="row" style="width: 100%; text-align: center; ">
        <div class="col-md-1 col-sm-2">
            <h2>İletişim</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%;">
            <?php 
                $tarih = date("Y-m-d");
                $sayi = 0;
                $bak = $conn->query("SELECT * FROM iletisim WHERE tarih='$tarih' ");
                while ($say = mysqli_fetch_array($bak)) {
                    $sayi += 1;
                }
                echo 'Bugün '.$sayi.'<br /> iletisime <br />gecildi.';
            ?>
            </div>
            </center>
        </div>
        <div class="col-md-2 col-sm-8 ">
            <h2>Üye Sayısı</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 13%; background-color: #5bff68;">
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
                    echo 'Bugün '.$sayi.' kişi üye oldu.<br />('.$reklamveren.' reklam veren ve '.$yayinci.' yayinci)';
                ?>
            </div></center>
        </div>
        <div class="col-md-2 col-sm-8">
            <h2>Verilen Reklam</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: #5dfff0;">
                <?php 
                    $vtarih = date('Y-m-d');
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM verilenreklamlar WHERE vtarih='$vtarih' ");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Bugün '.$sayi.' reklam verildi';
                ?>
            </div></center>
        </div>        
        <div class="col-md-2 col-sm-8">
            <h2>Alınan Reklam</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: lightblue;">
                <?php 
                    $vtarih = date('Y-m-d');
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM reklamlar WHERE vtarih='$vtarih' ");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Bugün '.$sayi.' reklam oluşturuldu';
                ?>
            </div></center>
        </div>
        <div class="col-md-2 col-sm-8">
            <h2>Yayıncı Site</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: orange;">
                <?php 
                    $atarih = date('Y-m-d');
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM siteler WHERE a_tarih='$atarih' ");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Bugün '.$sayi.' site eklendi';
                ?>
            </div></center>
        </div>
        <div class="col-md-2 col-sm-8 ">
            <h2>Ödeme Bildirim</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: #cacaca;">
                <?php 
                    $etarih = date('Y-m-d');
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM odemeler WHERE odemetarihi='$etarih' ");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Bugün '.$sayi.' ödeme bildirildi';
                ?>
            </div></center>
        </div>
        <div class="col-md-1 col-sm-1">
        	<h2>Destek</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; padding-left: 5px;">
            <?php 
                $tarih = date("Y-m-d");
                $sayi = 0;
                $bak = $conn->query("SELECT * FROM destek WHERE tarih='$tarih' ");
                while ($say = mysqli_fetch_array($bak)) {
                    $sayi += 1;
                }
                echo 'Bugün '.$sayi.' desteğe gecildi.';
            ?>
            </div>
            </center></div>
    </div>
</div>
<h2 style="text-align: center;">Tüm Veriler</h2>
<div style="background-color: #fff; padding-top: 2%;padding-bottom: 5%;">
    <div class="row" style="width: 100%; text-align: center; ">
        <div class="col-md-1 col-sm-2"></div>
        <div class="col-md-2 col-sm-8 ">
            <h2>Üye Sayısı</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: #cacaca;">
                <?php 
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM users");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Toplam '.$sayi.' kişi üye oldu';
                ?>
            </div></center>
        </div>
        <div class="col-md-2 col-sm-8 ">
            <h2>Verilen Reklam</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: orange;">
                <?php 
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM verilenreklamlar");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Toplam '.$sayi.' reklam verildi';
                ?>
            </div></center>
        </div>        
        <div class="col-md-2 col-sm-8 ">
            <h2>Alınan Reklam</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: lightblue;">
                <?php 
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM reklamlar");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Toplam '.$sayi.' reklam oluşturuldu';
                ?>
            </div></center>
        </div>
        <div class="col-md-2 col-sm-8 ">
            <h2>Yayıncı Site</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: #5dfff0;">
                <?php 
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM siteler");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Toplam '.$sayi.' site eklendi';
                ?>
            </div></center>
        </div>
        <div class="col-md-2 col-sm-8">
            <h2>Ödeme Bildirim</h2><center>
            <div style="border: solid 1px; min-height: 100px; padding-top: 18%; background-color: #5bff68;">
                <?php 
                    $sayi = 0;
                    $bak = $conn->query("SELECT * FROM odemeler");
                    while ($say = mysqli_fetch_array($bak)) {
                        $sayi += 1;
                    }
                    echo 'Toplam '.$sayi.' ödeme bildirimi';
                ?>
            </div></center>
        </div>
        <div class="col-md-1 col-sm-1"></div>
    </div>
</div>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
</body>
</html>
<?php }
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