<?php if(!defined("FROM_FILE")) { exit(); } ?>
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
    <link href="/../css/yayinci.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <header class="col-md-12 col-sm-12 col-xs-12 col-lg-12 header-big">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 header-ana-div">
            <div class="col-md-3 col-sm-12 col-xs-12 col-lg-3 sol-1">
                <a href="profil.php"><img width="100%" src="/../img/logo.png" alt="Reklamınız Reklam Sistemi Logosu" title="Reklamınız Reklam Sistemi Logosu" /></a>
            </div>
            <div class="col-md-9 col-sm-12 col-xs-12 col-lg-9 sag-1">
                <div class="btn-group big-btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-default"><a href="profil">Profilim</a></button>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Reklamlarım
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="reklamlar">Reklamlarım</a></li>
                            <li><a href="reklam-olustur">Reklam Oluştur</a></li>
                            <li><a href="reklam-analizleri">Reklam Analizleri</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Web Sitelerim
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="web-sitelerim">Web Sitelerim</a></li>
                            <li><a href="site-basvurusu">Site Başvurusu Yap</a></li>
                        </ul>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Ödemeler
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="odemeler">Yapılan Ödemeler</a></li>
                            <li><a href="alici-bilgilerim">Alıcı Bilgilerim</a></li>
                            <li><a href="alici-ekle">Alıcı Ekle</a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-default"><i class="fas fa-bell"></i><sup style="color: red; font-size: 13px;">Yakında</sup></button>
                    <button type="button" class="btn btn-default"><a href="ayarlar">Ayarlar</a></button>
                    <button type="button" class="btn btn-default"><a href="../islem/cikis.php">Çıkış</a></button>
                </div>
            </div>
        </div>
    </header>