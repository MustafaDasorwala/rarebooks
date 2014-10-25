<script>
    function submitForm(action)
    {
        document.getElementById('ConfirmOrderForm').action = action;
        document.getElementById('ConfirmOrderForm').submit();
    }
</script>
<?php 
if(isset($_GET['success']) && $_GET['success']!="" && $_GET['success']=="0")
{print "<span style=\"color:red;\">Bad Credit Card Number. Sale Denied</span>";}


if(isset($_GET['success']) && $_GET['success']!="" && $_GET['success']=="1")
{print "<span style=\"color:green;\">You Order Has Been Confirmed. You will get an email after its shipped</span>";}
?>
<form id="ConfirmOrderForm" method="POST" >
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
                <tr <?php if (isset($book->item_name) && isset($book->session_id))
                 {echo "id=".$book->session_id.$book->item_name; 
                    echo "name=".$book->session_id.$book->item_name; }?>>
                    <td><?php if (isset($book->item_name)) echo $book->item_name; ?></td>
                    <td><?php if (isset($book->price)) echo $book->price; ?></td>
                    <td><?php if (isset($book->quantity)) echo $book->quantity; ?></td>
                    <td><?php if (isset($book->price) && isset($book->quantity)) echo $book->price*$book->quantity; ?></td>
                </tr>
            
                <?php } ?>

                        <tr>
            <td colspan="3" align="center">
                <h4>
                    Credit Card Details
                </h4>

            </td>
        </tr>
        <tr> <td>Name on Card</td><td> <input type="text" name="cname" value="<?php echo $_POST['cname']; ?>"

placeholder="Name(As on card)" required></td> </tr> 
        <tr> <td>Card Number</td><td> <input type="text" name="cnumber" readonly="true"  value="<?php echo $_POST['cnumber']; ?>"

placeholder="Credit Card Number" required></td> </tr> 
        <tr> <td>Expiration Date</td><td> <input type="text" readonly="true" name="expdate"  value="<?php echo $_POST['expdate']; ?>"

placeholder="Expiration Date(mm/yy)" required></td> </tr> 
        <tr> <td>Billing Address</td><td> <input type="text" readonly="true" id="billaddr" name="billaddr"  value="<?php echo $_POST['billaddr']; ?>" 

placeholder="Billing Address" required></td> </tr>
     
        <tr> <td>Shipping Address</td><td> <input type="text" readonly="true" id="shipaddr" name="shipaddr"   value="<?php echo $_POST['shipaddr']; ?>"

value="" placeholder="Shipping Address" required></td> </tr>   
            <tr>
                <td>
                   <input id="button" type="submit" onclick="submitForm('<?php echo URL; ?>confirmorder/Order')"  name="submit_Order" value="Place Order">  

 
                 <!--  <a href="<?php echo URL.'cart/checkout'?>"> -->
                       <input id="button" type="submit" onclick="submitForm('<?php echo URL; ?>cart/checkout')" name="Cancel_Order" value="Edit Details"> 
                   <!--  </a> -->
                   
                <td>

            </tr>

            </tbody>
        </table>
   </div>

</div>
</form>