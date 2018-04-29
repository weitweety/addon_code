$(function(){
 setInterval(getalarm,200)
 
})
function getalarm (){
 $.ajax({
   type: 'GET',                     //GET or POST
   url: "https://postwallapp.herokuapp.com/updatepic.php",  //請求的頁面
   cache: false,   //是否使用快取
   data: {pinnum: pin},
   success: function(result){   //處理回傳成功事件，當請求成功後此事件會被呼叫
    //alert("success, pin is" + pin);
  $('#printpic').html(result);
   },
   error: function(result){   //處理回傳錯誤事件，當請求失敗後此事件會被呼叫
  //alert("error, pin is" + pin);
  console.log(result);
   },
  });
}