
<script type="text/javascript">
function FillBilling(f) {
  if(f.billing.checked == true) {
   

    f.shipaddr.value = f.billaddr.value;
    
  }
}

</script>

<form method="POST" onSubmit="return formValidate();" action="<?php echo URL; ?>confirmorder/index">
<div class="container">

    <div>
        <h3>CheckOut</h3>
        <div>
            <h3>Total Number of Books: <?php echo $amount_of_books; ?></h3>
        </div>

        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Book</td>
                <td>Unit Price</td>
                <td>Qty</td>
                <td>Total</td>
               
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $book) { ?>
                <tr <?php if (isset($book->item_name) && isset($book->session_id)) {echo "id=".$book->session_id.$book->item_name; 
                    echo "name=".$book->session_id.$book->item_name; }?>>
                    <td><?php if (isset($book->item_name)) echo $book->item_name; ?></td>
                    <td><?php if (isset($book->price)) echo $book->price; ?></td>
                    <td><?php if (isset($book->quantity)) echo $book->quantity; ?></td>
                    <td><?php if (isset($book->price) && isset($book->quantity)) echo $book->price*$book->quantity; ?></td>
                </tr>
            
                <?php } ?>
       <!--  <tr>
            <td colspan="3" align="center">
                Customer Profiles
            </td>
        </tr> -->
              
                        <tr>


            <td colspan="3" align="center">
                <h4>
                    Credit Card Details
                </h4>

            </td>
        </tr>
        <tr> <td>Name on Card</td><td> <input type="text" name="cname" value="<?php if (isset($_POST['Cancel_Order'])) 

         $_POST['cname']?>" placeholder="Name(As on card)" required></td> </tr> 
        <tr> <td>Card Number</td><td> <input type="text" name="cnumber" value="<?php if (isset($_POST['Cancel_Order'])) 

         $_POST['cnumber']?>"  placeholder="Credit Card Number" required></td> </tr> 
        <tr> <td>Expiration Date</td><td> <input type="text" name="expdate" value="" placeholder="Expiration Date(mm/yy)" required></td> </tr> 
        <tr> <td>Billing Address</td><td> <input type="text" id="billaddr" name="billaddr" value="" placeholder="Billing Address" required></td> </tr>
        <tr>
        <td>
            <input type="checkbox" name="billing" onclick="FillBilling(this.form)">
            <em>Check this box if Billing Address and Mailing Address are the same.</em>

        </td>
        </tr>
        <tr> <td>Shipping Address</td><td> <input type="text" id="shipaddr" name="shipaddr" value="" placeholder="Shipping Address" required></td> </tr>   
            <tr>
                <td>
                   <input id="button" type="submit"  name="submit_Order" value="Place Order">   
                   <a href="<?php echo URL.'cart/index'?>">
                       <input id="button" type="button" name="Cancel_Order" value="Edit Cart"> 
                    </a>
                   
                <td>

            </tr>
         

            </tbody>
        </table>
    </div>

</div>
</form>