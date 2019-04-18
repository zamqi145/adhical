<?php include("../connect.php"); $id = $_SESSION['id']; if($id) { 
$sor = $conn->query("SELECT * FROM users WHERE id='$id' ");
while ($oku = mysqli_fetch_array($sor)) {
if($oku['hesapturu'] == '2'){	
	$titl = "Reklamlarım - Reklamınız";
    $desc = "Reklam alabilmeniz, reklam analizlerine bakabilmeniz ve gelirlerinizi inceleyebilmeniz için hazırladığımız reklam yayıncı profil sayfası.";
    $keyw = "reklamınız reklam yayıncı profili, reklamınız reklam analizleri, reklamınız gelirleri";
    define("FROM_FILE", "1"); include("uye-header.php"); 
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-top: 1%;">
	<h1>Reklamlar</h1>
	<h3 style="margin-bottom: 3.1%;">Oluşturduğunuz reklamlar hakkında genel bilgiye ulaşmak için burayı kullanabilirsiniz.</h3>
	<div class="col-lg-1 col-md-1"></div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Reklam Adı</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM reklamlar WHERE userid='$id' ");
		 	if($sor->num_rows>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
			    		echo $oku['ad']."<br /><br />";
			    	}
		  		}
		  	}
		  	else {
		  		echo "Hiç reklam oluşturulmamış.";
		  	}
		?>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
		<h2>Reklam Boyutu</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM reklamlar WHERE userid='$id' ");
		 	if($sor->num_rows>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
				    	$genislik = $oku['genislik'];
				    	$yukseklik = $oku['yukseklik'];
			    		echo $genislik.' x '.$yukseklik."<br /><br />";
			    	}
		  		}
		  	}
		  	else {
		  		echo "Hiç reklam oluşturulmamış.";
		  	}
		?>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
		<h2>Aktiflik Durumu</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM reklamlar WHERE userid='$id' ");
		 	if($sor->num_rows>'0'){
			 	while ($oku = mysqli_fetch_array($sor)) {
				    if($oku['userid'] == $id) {
		    			if($oku['durumu']=='1'){
		    				echo "Aktif <br/><br/>";
		    			}
		    			else if($oku['durumu']=='0'){
		    				echo "Pasif (admin onayı için bekleyiniz.) <br/><br/>";
		    			}
		    			else {
		    				echo "Hata <br/><br/>";
		    			}
			    	}
		  		}
		  	}
		  	else {
		  		echo "Hiç reklam oluşturulmamış.";
		  	}
		?>
	</div>
	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
		<h2>Reklam Kodu</h2>
		<?php 
			$sor = $conn->query("SELECT * FROM reklamlar WHERE userid='$id' ");
		 	if($sor->num_rows>'0'){
		 		$sayi = 0;
			 	while ($oku = mysqli_fetch_array($sor)) {
			 		$sayi++;
				    if($oku['userid'] == $id) {
						$genislik = $oku['genislik'];
						$yukseklik = $oku['yukseklik'];
			    		echo '<a style="color: black;" href="#" name="kodal" data-toggle="modal" data-target="#KoduAl" id="'.$genislik.'-'.$yukseklik.'" onClick="ac(this.id)">Kodu Al</a>'.'<br /><br />';
					}
		  		}
		  	}
		  	else {
		  		echo "Hiç reklam oluşturulmamış.";
		  	}
		?>
	</div>
	<?php
		$sorgumuz = $conn->query("SELECT * FROM reklamlar WHERE userid='$id' ");
		if($sorgumuz->num_rows=='0'){
			echo '
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<a href="reklam-olustur"><button style="color: #000; background-color: aqua; border-color: aqua; padding: 10px; padding-left: 20px; padding-right: 20px; border-radius: 8px">Reklam Oluştur</button></a>
				</div>
			';
		}
	?>
</div>

	<div id="KoduAl" style="overflow: hidden;top: 30% !important;" class="modal fade col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="row odal-dialog" style="width: 100% !important;">
            <div class="col-md-12 modal-content form">
                <form id="frm" role="form" class="form-horizontal">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"aria-hidden="true">&times;</button>
                        <h3 class="modal-title">Kodu Al</h3>
                    </div>
                    <div class="modal-body" style="padding-bottom: 7px;">
                        <p id="demo"></p>
                        <script type="text/javascript">
                        	function ac(clicked_id){
                        		document.getElementById("demo").innerHTML = '&#60;&#47;body&#62; etiketinden hemen önce <br /><br /> &#60;script src&#61;&#34;https&#58;&#47;&#47;www&#46;adhical&#46;com&#47;reklam'+clicked_id+'&#46;js&#34;&#62;&#60;&#47;script&#62; <br /><br /> kodunu ekleyin ve reklamın gözükmesini istediğiniz alana <br /><br /> &#60;div id&#61;&#34;Adhical'+clicked_id+'&#34;&#62;&#60;&#47;div&#62; <br /><br /> kodunu ekleyin. ';
                        	}                        	
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    </div>
                </form>
            </div>
        </div>
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