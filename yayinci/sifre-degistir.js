$(function(){
    $("#btn").click(function(){ 
       var veri= $("#frm").serialize();
       $.ajax({
        type: "post", 
        url: "../islem/yayinci-sifre-degistir.php", 
        data: veri, 
        success:function(sonuc){ 
          $("#sonuc").html((sonuc));
        }
       });
    });
});