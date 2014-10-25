<!DOCTYPE html>
<?php
    //session_start();
    if(!isset($_SESSION['userid'])){
        $_SESSION['userid'] = 0;
    }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP MVC skeleton</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link href="<?php echo URL; ?>public/css/style.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <!-- our JavaScript -->
    <script src="<?php echo URL; ?>public/js/application.js"></script>
</head>
<body>
<!-- header -->
<div class="container">
  <h3> Rare Books </h3>
  
    <h4><?php 
    if ((isset($_SESSION['login']) && $_SESSION['login'] != '')) {  echo 'Welcome '.$_SESSION['username'];}
else {

echo 'Welcome Guest';


}   ?> </h4>


 <br>
      
    <a href=<?php echo URL?> > Home </a><span rowspan='3'></span>
 
    <a href=<?php echo URL.'cart/view'?> > Cart </a><span rowspan='3'></span>
   
    <?php  if ((isset($_SESSION['login']) && $_SESSION['login'] != '')) 
          {  
        
         echo '<a id="logout" ';
         echo 'href="'.URL . 'login/Logout/">';
         echo 'Logout</a>';
          }
          else {
          
          
         echo '<a id="Login" ';
         echo 'href="'.URL . 'login/index/">';
         echo 'Log in</a>';
          echo '<a id="signup" ';
         echo 'href="'.URL . 'signup/index/">';
         echo 'Sign up</a>';
        
          }
          ?>

    
  
</div>

