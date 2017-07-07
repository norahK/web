
$(document).ready(function(){
//change tab color when new grade added to database
   var old_count = -1;
setInterval(function(){    
    $.ajax({
        type : "POST",
        url : "notifay.php",
        success : function(data){
   if ( old_count != -1 && data > document.getElementById('hiddenfiled').value){
     old_count=data;
     document.getElementById('hiddenfiled').setAttribute('value',data);
      $('#gb').css('color','red');
    }
    else
    {
     old_count=data;
      document.getElementById('hiddenfiled').setAttribute('value',data);    }
    
   } 
    });
},1000);
    
    
    
    
    
     // $('#search').change(function(){
//document.getElementById("dilog").style.display="block";
 //     });
   
    //var k=$('#search').val();
  /* $('input').change(function(){
//alert('The text has been changed.');
       //$('#dilog').css("display","block");
document.getElementById("dilog").style.display="block";
       /* document.getElementById('dilog').style.display="block";
         $.ajax({
        type : "POST",
        url : "search.php",
             data:"key="=k,
        success : function(data){
            document.getElementById('dilog').style.display='block';
   
    
   } 
    });
    
   // document.getElementById("fname").onchange = 
    function onS() {
        
       document.getElementById("dilog").style.display="block";
    
    };

*/
  // });
   
    
    
    
    
//frist 
$('#r').load('courses.php');
//when click other item 
$('#insaid button a').click(function(){ 
    $(this).css('color', 'White ');
 var page= $(this).attr('href');
$('#r').load(page+'.php');
  return false;
    
});
 //object.addEventListener("change", changef);
});
   