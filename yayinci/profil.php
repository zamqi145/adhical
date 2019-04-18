<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '2'){
	$titl = "Reklam Yayıncı Profili - Reklamınız";
    $desc = "Reklam alabilmeniz, reklam analizlerine bakabilmeniz ve gelirlerinizi inceleyebilmeniz için hazırladığımız reklam yayıncı profil sayfası.";
    $keyw = "reklamınız reklam yayıncı profili, reklamınız reklam analizleri, reklamınız gelirleri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
    <div style="padding-top: 4%; padding-bottom: 3%;">
        <div class="row" style="width: 100%; text-align: center; margin-top: 2%">
            <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1"></div>
            <div class="col-md-5 col-sm-11 col-xs-11 col-lg-5 pf1">
                <h2>Günlük Kazanç</h2>
                <div style="border: solid 1px; padding-top: 11%; padding-bottom: 10%;">
                    <?php 
                        $tarih = date('Y-m-d');
                        $i = -1;
                        $sitesql = $conn->query("SELECT * FROM siteler WHERE userid='$id' && onayd='1' ");
                        while($siteoku = mysqli_fetch_array($sitesql)){
                            $i++;
                            $site[$i] = $siteoku['link'];
                        }
                        $i++;
                        if($i){
                            while($i){
                                $i--;
                                $tiksql = $conn->query("SELECT * FROM tikipler WHERE url='$site[$i]' && gecerlilik='1' && tarih='$tarih'  ");
                                while($tikoku = mysqli_fetch_array($tiksql)){
                                    $kazanc += $tikoku['fiyat'];
                                }
                            }
                        }
                        if($kazanc){
                            echo 'Tebrikler, bugün '.$kazanc.' TL kazandınız. <br /><br />';
                        }
                        else {
                            echo 'Maalesef bugün kazanç sağlamaya başlamadınız. <br /><br />';
                        }
                    ?>
                </div>
            </div>
            <div class="col-sm-1 col-xs-1"></div>
            <div class="col-md-5 col-sm-11 col-xs-11 col-lg-5 pf2">
                <h2>Aylık Kazanç</h2>
                <div style="border: solid 1px; padding-top: 11%; padding-bottom: 10%;">
                    <?php 
                        $tarih = date('Y-m-d');
                        $i = -1;
                        $sitesql = $conn->query("SELECT * FROM siteler WHERE userid='$id' && onayd='1' ");
                        while($siteoku = mysqli_fetch_array($sitesql)){
                            $i++;
                            $site[$i] = $siteoku['link'];
                        }
                        $i++;
                        if($i){
                            while($i){
                                $i--;
                                $tiksql = $conn->query("SELECT * FROM tikipler WHERE url='$site[$i]' && gecerlilik='1'");
                                while($tikoku = mysqli_fetch_array($tiksql)){
                                    $ay = explode("-",$tikoku['tarih']);
                                    $date = explode("-",$tarih);
                                    if($ay[1]==$date['1']){
                                        $kazanc += $tikoku['fiyat'];
                                    }
                                }
                            }
                        }
                        if($kazanc){
                            echo 'Tebrikler, bu ay '.$kazanc.' TL kazandınız. <br /><br />';
                        }
                        else {
                            echo 'Maalesef bugün kazanç sağlamaya başlamadınız. <br /><br />';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="row" style="width: 100%; text-align: center; margin-top: 2%">
            <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1"></div>
            <div class="col-md-5 col-sm-11 col-xs-11 col-lg-5 pf3">
                <h2>Ödeme İstenebilecek Kazanç</h2>
                <div style="border: solid 1px; padding-top: 11%; padding-bottom: 10%;">
                    <?php 
                        $sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
                        while ($oku = mysqli_fetch_array($sor)) {
                            if($oku['id'] == $id) {
                                echo 'Ödeme isteyebileceğiniz '.$oku['kazanc'].' TL kazancınız var. <br /><br />';
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="col-sm-1 col-xs-1"></div>
            <div class="col-md-5 col-sm-11 col-xs-11 col-lg-5 pf4">
                <h2>Geçersiz Tıklama</h2>
                <div style="border: solid 1px; padding-top: 12.3%; padding-bottom: 12.3%;">
                    <?php 
                        $gtiklamasql = $conn->query("SELECT * FROM users WHERE id='$id' ");
                        while($gtiklamaoku = mysqli_fetch_array($gtiklamasql)){
                            $gtiklamasayi = $gtiklamaoku['gtiklama'];
                        }
                        if($gtiklamasayi){
                            echo $gtiklamasayi.' adet geçersiz tıklama var. Bu tıklama genellikle bir kişinin birden çok kez tıkladığı durumları içermektedir.';
                        }
                        else {
                            echo 'Tebrikler, hiç geçersiz tıklamanız yok.';
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1"></div>
        </div>
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