$(function(){
 setInterval(getalarm,200)
 
})
function getalarm (){
 $.ajax({
   type: 'GET',                    
   url: "https://postwallapp.herokuapp.com/updatepic.php",  
   cache: false,   
   data: {pinnum: pin},
   success: function(result){   
    //alert("success, pin is" + pin);
  $('#printpic').html(result);
   },
   error: function(result){   
  //alert("error, pin is" + pin);
  console.log(result);
   },
  });
}
