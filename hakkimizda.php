<?php 
  include("connect.php"); 
  $titl = "Your Title";
  $desc = "Your Description";
  $keyw = "Your Keywords"; 
  define("FROM_FILE", "1"); 
  include("header.php");
?>
<style type="text/css">.footer-big{bottom: 0; position: fixed !important;}</style>
<div class="col-sm-12">
  <div class="hak">
    <div class="col-md-2 col-sm-2"></div>
    <div class="col-md-8 col-sm-8">
      <center>
        <h2>'Website' Hakkında</h2>
        <p style="color:black;">
          <?php 
            $ayarlar = $conn->query("SELECT * FROM ayarlar WHERE id='1' "); 
            while ($ayaroku = mysqli_fetch_array($ayarlar)){
              echo $hakkimizda=$ayaroku['hakkimizda'];
            }
          ?>
        </p>
      </center>
    </div>
  </div>
</div>
<?php include("footer.php"); ?>
