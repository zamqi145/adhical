$(function(){
    $("#btn").click(function(){ 
       var veri= $("#frm").serialize();
       $.ajax({
        type: "post", 
        url: "../islem/reklam-ver.php", 
        data: veri, 
        success:function(sonuc){ 
          $("#sonuc").html((sonuc));
        }
       });
    });
});