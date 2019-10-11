function send(){
  var amount = $("#amount").val();
  var csrf = $("#csrf").val();
  $.ajax({
   url:'process.php',
   type:'POST',
   data:{
     amount:amount,
     csrf:csrf
   },
   success:function(response) {
     $('#msg').html(response);
   }
   });
  return false;
 }
