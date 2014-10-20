<div class="container">
<body>
  <?php 
    $useBAddress = '0'; 
    switch ($action) {
        case 'Edit':
            $buttonAction = "Delete";
            $buttonSubmit = "Update";
            $urlDestination = "deleteProfile/";      
            break;
        case 'Create':
            $buttonAction = "Cancel";
            $buttonSubmit = "Insert";
            $urlDestination = "index/";      
            break;
    }
  ?>
  <h1><?php echo "$action" ?> Customer Profile</h1>
    <form action="<?php echo URL; ?><?php echo "payment/".$action."Profile"; ?>" method="post">
    <table border="0">
      <tr>
         <td hidden=true><input type="text" name="profile_id" 
                    value='<?php if (isset($ccProfile[0]->profile_id)) echo $ccProfile[0]->profile_id; ?>' maxlength="10" size="10"></td>
         <td hidden=true><input type="text" name="customer_id" 
                    value='<?php if (isset($ccProfile[0]->profile_id)) echo $ccProfile[0]->profile_id; ?>' maxlength="10" size="10"></td>
      </tr>
      <tr>
        <td>Card holder's NAME</td>
         <td><input type="text" name="cc_holder_name" 
                    value='<?php if (isset($ccProfile[0]->cc_holder_name)) echo $ccProfile[0]->cc_holder_name; ?>' maxlength="50" size="50"></td>
      </tr>
      <tr>
        <td>Billing Address</td>
        <td> <input type="text" name="billing_address"
                    value='<?php if (isset($ccProfile[0]->billing_address)) echo $ccProfile[0]->billing_address; ?>'  
                    maxlength="50" size="50">
        </td>
      </tr>
      <tr>
        <td>Credit Card Number</td>
        <td><input  type="text" name="credit_card_number" maxlength="16" size="16" 
                    value='<?php if (isset($ccProfile[0]->credit_card_number)) echo $ccProfile[0]->credit_card_number; ?>' ></td>
        <td>Expiration month</td>
        <td>
        <select name="expiration_date_month" >
            <option hidden="true"><?php if (isset($ccProfile[0]->expiration_date_month)) echo $ccProfile[0]->expiration_date_month; ?></option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        </td>
        <td>Year</td>
        <td> <input type="text" name="expiration_date_year" maxlength="4" size="4"
                    value='<?php if (isset($ccProfile[0]->expiration_date_year)) echo $ccProfile[0]->expiration_date_year; ?>' ></td>

      </tr>
      <tr>
        <td>Shipping Address</td>
        <td> <input type="text" name="shipping_address"
                    value='<?php if (isset($ccProfile[0]->shipping_address)) echo $ccProfile[0]->shipping_address; ?>'  
                    maxlength="50" size="50">
        </td>
        <td> Use billing address
        <input type="checkbox" name="useBAddress" value='1' />
        </td>
      </tr>
      <tr>
        <td><input type="submit" value='<?php echo $buttonSubmit ?>'</td>
        <td><input type="button" value='<?php echo $buttonAction ?>' 
                    onclick="location.href='<?php   echo URL; 
                                                    echo "payment/".$urlDestination; 
                                                    if (isset($ccProfile[0]->profile_id)) echo $ccProfile[0]->profile_id; ?>'" </td>
      </tr>
    </table>
  </form>
</body>
</div>
