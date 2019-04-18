<?php 
  if(!defined("FROM_FILE")) { exit(); } 
?>
<!DOCTYPE html>
<html lang="tr" class="no-js">
<head>
  <meta charset="utf-8">
  <?php 
    echo '<title>'.@$titl.'</title>'; 
    echo '<meta name="description" content="'.@$desc.'"/>';
    echo '<meta name="keywords" content="'.@$keyw.'"/>'; 
    if($ogtitle==""){
      echo '<meta property = "og:title" content = "'.$titl.'" />';
    }
    else {
      echo '<meta property = "og:title" content = "'.$ogtitle.'" />';
    }
    if($ogdesc==""){
      echo '<meta property = "og:description" content = "'.$desc.'" />';
    }
    else{
      echo '<meta property = "og:description" content = "'.$ogdesc.'" />';
    }
    if($ogimg==""){
      echo '<meta property="og:image" content="https://www.website.com/img/logo.png" />';
    }
    else{
      echo '<meta property="og:image" content="'.$ogimg.'" />';
    }
  ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta name="content-language" content="tr">
  <link rel="shortcut icon" href="https://www.website.com/favicon.ico" type="image/x-icon" />
</head>
<body>
  <script type="text/javascript">$(function(){});</script>
  <header class="col-md-12 col-sm-12 col-xs-12 col-lg-12 header-big">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 header-ana-div">
      <div class="col-md-3 col-sm-12 col-xs-12 col-lg-3 sol-1">
        <a href="/"><img width="100%" src="/img/logo.png" alt="Website Reklam Sistemi Logosu" title="Website Reklam Sistemi Logosu" /></a>
      </div>
      <div class="col-md-9 col-sm-12 col-xs-12 col-lg-9 sag-1">
        <ul class="header-ul">
          <li><a href="/">Ana Sayfa</a></li>
          <li><a href="/blog">Blog</a></li>
          <li><a href="/sss">SSS</a></li>
          <li><a class="nav-item-child" href="#" data-toggle="modal" data-target="#LoginModal">Giriş Yap</a></li>
          <li><a href="/kayit-ol">Kayıt Ol</a></li>
        </ul>
      </div>
    </div>
    <div id="LoginModal" class="login-modal-css modal fade col-lg-4 col-md-4 col-sm-6 col-xs-10 col-lg-offset-4 col-md-offset-4 col-sm-offset-3 col-xs-offset-1 index-login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="row odal-dialog index-odal-dialog">
        <div class="col-md-12 modal-content form">
          <form id="frm" role="form" class="form-horizontal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"aria-hidden="true">&times;</button>
              <h4 class="modal-title">Giriş Yap</h4>
            </div>
            <div class="modal-body index-modal-body">
              <div id="sonuc"></div>
              <div class="form-group">
                <input type="email" class="form-control" name="eposta" id="inputEmail3" placeholder="E-Mail" />
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Şifreniz" />
              </div>
            </div>
            <div class="modal-footer">
            <a href="sifremi-unuttum"><input type="button" class="btn" value="Şifremi Unuttum" /></a>
            <input type="button" id="btn" class="btn btn-primary" value="Giriş Yap"/>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
<?php 
  $ayarsql = $conn->query("SELECT * FROM ayarlar WHERE id='1' ");
  while($ayaroku = mysqli_fetch_array($ayarsql)){
    $hakkimizda = $ayaroku['hakkimizda'];
  }
?>
