// File destroy_captcha.js

 var xhr;
 xhr = new XMLHttpRequest();
 function killSession(str)
  {
   var url="logout_captcha.php";
   xhr.open("POST",url,true);
   xhr.setRequestHeader('Content-Type',
   'application/x-www-form-urlencoded; charset=iso-8859-1');
   xhr.send("q="+str+"&sid="+Math.random());
   xhr.onreadystatechange=function()
    {
     if (xhr.readyState==4)
      {
       document.getElementById("txtHint").innerHTML = 
       xhr.responseText;
      }
    }
  }
 function clearInnerHTML()
  {
   document.getElementById("txtHint").innerHTML = "";
  }
