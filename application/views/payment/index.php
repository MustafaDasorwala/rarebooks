<div class=container>
   <h3>Customer Profiles</h3>
    <table cellspacing="10">
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Profile ID</td>
            <td>Customer ID</td>
            <td>Shipping Address</td>
            <td>Credit card Nummber</td>
            <td>Customer Name</td>
            <td>Billing Address</td>
            <td>Expiration Month</td>
            <td>Expiration Year</td>
         </tr>
        </thead>
        <tbody>
        <?php foreach ($profiles as $customer) { ?>
            <tr>
                <td align="center"><a href="<?php echo URL . 'payment/EditProfileView/' . $customer->profile_id; ?>">
                    <?php if (isset($customer->profile_id)) echo $customer->profile_id; ?></a></td>
                <td align="center"><?php if (isset($customer->customer_id)) echo $customer->customer_id; ?></td>
                <td align="left"><?php if (isset($customer->shipping_address)) echo $customer->shipping_address; ?></td>
                <td><?php if (isset($customer->credit_card_number)) echo $customer->credit_card_number; ?></td>
                <td align="left"><?php if (isset($customer->cc_holder_name)) echo $customer->cc_holder_name; ?></td>
                <td align="left"><?php if (isset($customer->billing_address)) echo $customer->billing_address; ?></td>
                <td align="center"><?php if (isset($customer->expiration_date_month)) echo $customer->expiration_date_month; ?></td>
                <td align="center"><?php if (isset($customer->expiration_date_year)) echo $customer->expiration_date_year; ?></td>
           </tr>
        <?php } ?>
        </tbody>
    </table>
    <input  type="button"   value="Add Profile"    onclick="location.href='<?php echo URL; ?>payment/AddProfileView'"> 
</div>
