$(function(){
    $("#btn").click(function(){
       var veri= $("#frm").serialize();
       $.ajax({
        type: "post",
        url: "../islem/reklam-durum-degis.php",
        data: veri,
        success:function(sonuc){
          $("#sonuc").html((sonuc));
        }
       });
    });
});