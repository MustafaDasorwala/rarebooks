<div class="container">
<body>
  <h1>Customer Registration</h1>
    <form action="<?php echo URL; ?><?php echo "authenticate/Registration"; ?>" method="post">
    <table border="0">
      <tr>
        <td>username</td>
         <td><input type="text" name="username" 
                    value='<?php if (isset($regs->username)) echo $regs->username; ?>' maxlength="30" size="30"></td>
      </tr>
      <tr>
        <td>First Name</td>
        <td> <input type="text" name="first_name"
                    value='<?php if (isset($regs->first_name)) echo $regs->first_name; ?>'  
                    maxlength="30" size="30">
        </td>
        <td>Last Name</td>
        <td><input  type="text" name="last_name" maxlength="30" size="30" 
                    value='<?php if (isset($regs->last_name)) echo $regs->last_name; ?>' ></td>
                    
     </tr>
      <tr>
        <td>Email Address</td>
        <td> <input type="text" name="email_address" maxlength="30" size="30"
                    value='<?php if (isset($regs->email_address)) echo $regs->email_address; ?>' ></td>

        <td>Password</td>
        <td> <input type="text" name="password"
                    value='<?php if (isset($regs->password)) echo $regs->password; ?>'  
                    maxlength="30" size="30">
        </td>
      </tr>
      <tr>
        <td>Customer Type</td>
        <td>
        <select name="customer_type">
            <option hidden="true"><?php if (isset($regs->customer_type)) echo $regs->customer_type; ?></option>
            <option value="Regular">Regular</option>
            <option value="Prime">Prime</option>
        </select>
        </td>
      </tr>
      <tr>
        <td><input type="submit" value='Submit'</td>
        <td><input type="button" value='Cancel' 
                    onclick="location.href='<?php   echo URL; ?>home/index'" </td>
      </tr>
    </table>
  </form>
</body>
</div>
