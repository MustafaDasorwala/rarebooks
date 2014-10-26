<html>
<body>
<h1>Home page</h1>
<?php
    
  if (!isset($_SESSION['valid_user']))
  {
      // they have not tried to log in yet or have logged out
      echo 'You are not logged in.<br />';

    // provide form to log in
    echo '<form method="post" action="' . URL . 'admin/Login">';
    echo '<table>';
    echo '<tr><td>Userid:</td>';
    echo '<td><input type="text" name="userid"></td></tr>';
    echo '<tr><td>Password:</td>';
    echo '<td><input type="password" name="password"></td></tr>';
    echo '<tr><td colspan="2" align="center">';
    echo '<input type="submit" value="Log in"></td></tr>';
    echo '</table></form>';
  }
?>
</body>
</html>

