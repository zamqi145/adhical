<?php if(!defined("FROM_FILE")) { exit(); } $id = $_SESSION['id'];?>
<!DOCTYPE html>
<html lang="tr" class="no-js">
<head>
    <?php 
        echo '<title>'.@$titl.'</title>'; 
        echo '<meta name="description" content="'.@$desc.'"/>';
        echo '<meta name="keywords" content="'.@$keyw.'"/>';
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta name="content-language" content="tr">
    <link href="/../css/reklamveren.css" rel="stylesheet" type="text/css"/>
</head>
<body>
	<?php
		$bildirimsqldb = $conn->query("SELECT * FROM bildirimler WHERE userid='$id' ");
		$sayi = $bildirimsqldb->num_rows;
	?>
    <header class="col-md-12 col-sm-12 col-xs-12 col-lg-12 header-big">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 header-ana-div">
            <div class="col-md-3 col-sm-12 col-xs-12 col-lg-3 sol-1">
                <a href="kampanyalarimiz"><img width="100%" src="/../img/logo.png" alt="Adhical Reklam Sistemi Logosu" title="Adhical Reklam Sistemi Logosu" /></a>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12 col-lg-9 sag-1">
                <div class="btn-group big-btn-group" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <a href="kampanyalarimiz">
                            <button type="button" class="btn btn-default">
                                Kampanyalarımız
                            </button>
                        </a>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Reklamlarım
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="reklamlar">Reklamlarım</a></li>
                            <li><a href="reklam-ver">Reklam Ver</a></li>
                            <li><a href="reklam-analizleri">Reklam Analizleri</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Kupon Kodu
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="kupon-kodu">Kupon Kodu</a></li>
                            <li><a href="kupon-kodu-gir">Kupon Kodu Gir</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Ödemeler
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="odemeler">Yapılan Ödemeler</a></li>
                            <li><a href="hesaplarimiz">Hesap Bilgilerimiz</a></li>
                            <li><a href="odeme-bildir">Ödeme Bildir</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Destek
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="destek">Destek</a></li>
                            <li><a href="talep">Yeni Talep Oluştur</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <?php
                            	if($sayi){
                            		echo '<span class="caret"></span>';
                            	}
                            ?>                            
                        </button>
                        <?php
                        	if($sayi){
                        ?>
                        <ul class="dropdown-menu" role="menu">
                            <?php 
                            	$say = $sayi;
                            	$bilsay = 0;
                            	$bildirimsql = $conn->query("SELECT * FROM bildirimler WHERE userid='$id' ");
								while($bildirimsqloku = mysqli_fetch_array($bildirimsql)){
									$bildirimler[$bilsay] = $bildirimsqloku['bildirim']."asdas";
									$bilsay++;
								}
                            	while($say){
                            		$say--;
                            		echo '<li>'.$bildirimler[$say].'</li>';
                            	}
                            ?>
                        </ul>
                        <?php 
                        	}
                        ?>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="ayarlar">
                            <button type="button" class="btn btn-default">
                                Ayarlar
                            </button>
                        </a>
                    </div>
                    <div class="btn-group" role="group">
                        <a href="../islem/cikis.php">
                            <button type="button" class="btn btn-default">
                                Çıkış
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>