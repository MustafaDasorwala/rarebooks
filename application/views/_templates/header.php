<!DOCTYPE html>
<?php
    session_start();
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

    <?php
    if(!isset($_SESSION)) {
        session_start();
    }

    if (isset($_SESSION['valid_user']) && isset($_SESSION['role_id']))
    {
        echo '<h4 align=right>';
        echo '<table>';
        echo '<td size=30>';
        echo '<a href="';
        echo URL;
        echo 'authenticate/HotListView" >Manage Hotlist</a>';
        echo '</td>';
        echo '<td size=30>';
        echo '<a href="';
        echo URL;
        echo 'inventory/inventoryView" >Inventory Management</a>';
        echo '</td>';
        echo '<td size=30>';
        echo '<a href="';
        echo URL;
        echo 'admin/logout" >Logout</a>';
        echo '</td>';
        echo '<td size=30>';
        echo 'User: '.$_SESSION['valid_user'] . ' ';
        echo '</td>';
        echo '</table>';
        echo '</h4>';
    }
    else
    {        
        if ((isset($_SESSION['login']) && $_SESSION['login'] != '')) 
        {  
            echo '<h4>Welcome '.$_SESSION['username'].'</h4><br>';
            echo '<a id="logout" ';
            echo 'href="'.URL . 'login/Logout/">';
            echo 'Logout</a>';
        }
        else 
        {
            echo '<h4>Welcome Guest</h4><br>';
            echo '<a id="Login" ';
            echo 'href="'.URL . 'login/index/">';
            echo 'Log in</a>';
            echo '<a id="signup" ';
            echo 'href="'.URL . 'signup/index/">';
            echo 'Sign up</a>';
        }
        
        echo '<a href=';
        echo URL;
        echo "> Home </a><span rowspan='3'></span>";
        
        echo '<a href=';
        echo URL;
        echo "cart/view > Cart </a><span rowspan='3'></span>"; 

        
    }
    ?>
</div>

