<div class="container">

<?php 
if(isset($_GET["success"]) && $_GET["success"] === "0") 
{
echo '<script language="javascript">';
echo 'alert("Signup Failed. Username already exists")';
echo '</script>';
}

 ?>
<script type="text/javascript">

// var x = document.getElementById("myForm");
// x.addEventListener("focusin", myFocusFunction);
// x.addEventListener("focusout", myBlurFunction);

// function myFocusFunction() {
    // document.getElementById("myInput").style.backgroundColor = "yellow"; 
// }

// function myBlurFunction() {
    // document.getElementById("myInput").style.backgroundColor = ""; 
// }

function validateEmail() { 
     var goodColor = "#66cc66";
    var badColor = "#ff6666";
	//alert('gud bad color');
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	 var email = document.getElementById('email');
     var message = document.getElementById('confirmEmail');

	 message.style.color="#ffffff";
	 message.innerHTML="";
	 email.style.backgroundColor = "#ffffff";
//	 alert(re.test(email.value));
    if(re.test(email.value)==true)
	{
	//alert('test passed');
	 email.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Valid Email!"
		return true;
	}
	else{
	//alert('test failed');
	   email.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Invalid Email"
		return false;
	}
} 

function validatePassword(){

//Store the password field objects into variables ...
    var pass1 = document.getElementById('pass');
    var pass2 = document.getElementById('cpass');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmPassword');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
		return true;
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
		return false;
    }
}

function formValidate()
{
var passreturn =validatePassword();
var emailreturn =validateEmail();

if(passreturn==true && emailreturn==true)
{
return true;

}
else{

return false;
}
}


</script> 
 
 <script type="text/javascript">
//document.getElementById("username").onblur = 
function CheckUserName() {
var xmlhttp;
var username=document.getElementById("username");
if (username.value != "")
{
if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("status").innerHTML=xmlhttp.responseText;
  //enable submit 
  if(xmlhttp.responseText=="<span style=\"color:green;\">Username is available </span>")
  {
  
  document.getElementById('button').disabled = false; 
   var goodColor = "#66cc66";
   document.getElementById('username').style.backgroundColor = goodColor;
   
  } 
  else if (xmlhttp.responseText=="<span style=\"color:red;\">Username Not Available </span>"){
  
  document.getElementById('button').disabled = true; 
   
    var badColor = "#ff6666";
	    document.getElementById('username').style.backgroundColor = badColor;
  }

}

};
xmlhttp.open("GET","http://localhost:8080/rarebooks/signup/getUserName/"+encodeURIComponent(username.value),true);
xmlhttp.send();
}
};
//echo URL . 'signup/getUserName/' . $uname;
</script>



<table border="0"> 
  <form method="POST" onSubmit="return formValidate();" action="<?php echo URL; ?>signup/AddUser"> 
 
 <tr> <td>First Name</td><td> <input type="text" name="fname" value="" placeholder="First Name" required></td> </tr> 
  <tr> <td>Last Name</td><td> <input type="text" name="lname" value="" placeholder="Last Name" required></td> </tr> 
 <tr> <td>Email</td><td> <input id="email" type="text" name="email" placeholder="Email Address" onblur="validateEmail();return false" required >
 <span id="confirmEmail" class="confirmMessage"></span>
 </td> </tr> 
 
 
 <tr> <td>UserName</td><td> <input type="text" id="username" name="username" onblur="CheckUserName();" placeholder="UserName" required>
 
 <span id="status"></span>
 </td> </tr>


 <tr> <td>Password</td><td> <input id="pass" type="password" name="pass" placeholder="Password" required></td> </tr> 
 
 
 <tr> <td>Confirm Password </td><td><input id="cpass" type="password" placeholder="Confirm Password" onkeyup="validatePassword(); return false;" name="cpass" required>
 <span id="confirmPassword" class="confirmMessage"></span>
 </td> </tr> 
 
 
 <tr> <td><input id="button" type="submit" name="submit_add_user" value="Submit"></td> </tr> 
 
 </form> 
 
 
 </table> 

</div>