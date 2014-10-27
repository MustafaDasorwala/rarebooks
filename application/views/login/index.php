<?php 
if(isset($_GET['success']) && $_GET['success']!="" && $_GET['success']=="0")
{print "<span style=\"color:red;\">Invalid Username or Password</span>";}
?>
<div class="container">


<table border="0"> 
  <form method="POST" action="<?php echo URL; ?>login/Loginuser"> 
 
 <tr> <td align="center"> Login </td><td></tr> 
 
 <tr> <td>UserName</td><td> <input type="text" name="username" value="" required></td> </tr>


 <tr> <td>Password</td><td> <input type="password" name="password" value="" required></td> </tr> 
 
 <tr> <td><input id="button" type="submit" name="submit_login_user" value="Log in"></td> 
  <td><a id="signup" href="<?php echo URL . 'signup/index'; ?>">Sign up</a></td> </tr> 
 
 </form> 
 
 
 </table> 

</div>