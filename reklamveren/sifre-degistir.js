$(function(){
    $("#btn").click(function(){ 
       var veri= $("#frm").serialize();
       $.ajax({
        type: "post", 
        url: "../islem/reklamveren-sifre-degistir.php", 
        data: veri, 
        success:function(sonuc){ 
          $("#sonuc").html((sonuc));
        }
       });
    });
});