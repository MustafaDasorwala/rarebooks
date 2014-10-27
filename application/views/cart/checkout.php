
<script type="text/javascript">
function FillBilling(f) {
  if(f.billing.checked == true) {
   

    f.shipaddr.value = f.billaddr.value;
    
  }
}

function toggleCheckbox(element)
 {

  

   if(element.checked) 
    {

    var temp=element.id.split("-");
    var selId = temp[0]+"-row";
    var row=document.getElementById(selId);
     document.getElementById("shipaddr").value=row.cells[1].innerHTML;
    document.getElementById("cnumber").value=row.cells[2].innerHTML;
    document.getElementById("cname").value=row.cells[3].innerHTML;
    document.getElementById("billaddr").value=row.cells[4].innerHTML;
   
    document.getElementById("expiration_date_year").value=row.cells[6].innerHTML;
   // alert(document.getElementById("expiration_date_month").value);
     document.getElementById("expiration_date_month").value=row.cells[5].innerHTML;
     //row.cells[5].innerHTML;
    document.getElementById("Save").disabled=true;
    
        //element.checked = false;


         var radthis = false; // must match default radio state true if checked, false if not
            function dothis(elem) {
                (radthis && elem.checked) ? (elem.checked = false) : (elem.checked = true);
                radthis = elem.checked;
            }

    }
    else
    {
        if (this.__chk) this.checked = false
    document.getElementById("Save").disabled=false;

    }


       var radthis = false; // must match default radio state true if checked, false if not
            function dothis(element) {
                (radthis && element.checked) ? (elem.element = false) : (element.checked = true);
                radthis = element.checked;
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

        <table >
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
              
           <tr><td colspan="3" align="center"><h4>Existing Profiles</h4></td></tr>
           <tr><td colspan="4">


            <table cellspacing="3" frame="box" >
                    <thead  style="background-color: #ddd; font-weight: bold;">
                    <tr style="border-bottom:1pt solid black;">
                       <td>Use Profile</td>
                      <!--    <td>Customer ID</td> -->
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
                        <tr border-bottom:1pt solid black; id= "<?php if(isset($customer->profile_id)) echo $customer->profile_id.'-row';?>">
                            <td align="center">

                    <input type="radio" onMouseDown="this.__chk = this.checked" name="group1" onclick="toggleCheckbox(this)" 
                    id= "<?php if(isset($customer->profile_id)) echo $customer->profile_id.'-checkbox';?>"/>


                        </td>
                         
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





           </td></tr>
           <tr>


            <td colspan="3" align="center">
                <h4>
                    Credit Card Details
                </h4>

            </td>
        </tr>
        <tr> <td>Name on Card</td><td> <input type="text" id="cname" name="cname" value="<?php if (isset($_POST['Cancel_Order'])) 

         $_POST['cname']?>" placeholder="Name(As on card)" required></td> </tr> 
        <tr> <td>Card Number</td><td> <input type="text" id="cnumber" name="cnumber" value="<?php if (isset($_POST['Cancel_Order'])) 

         $_POST['cnumber']?>" maxlength="16" size="16" placeholder="Credit Card Number" required></td> </tr> 
        <tr> 
    <td>Expiration month</td>
        <td>
        <select id="expiration_date_month" name="expiration_date_month" >
           <!--  <option hidden="true"><?php if (isset($ccProfile[0]->expiration_date_month)) echo $ccProfile[0]->expiration_date_month; ?></option> -->
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
        <td> <input type="text" id="expiration_date_year" name="expiration_date_year" maxlength="4" size="4"></td>
                     <!-- value='<?php if (isset($ccProfile[0]->expiration_date_year)) echo $ccProfile[0]->expiration_date_year; ?>' -->
<!-- <td>Expiration Date</td><td> <input type="text" name="expdate" value="" placeholder="Expiration Date(mm/yy)" required></td>  -->
</tr> 
        <tr> <td>Billing Address</td><td> <input type="text" id="billaddr" name="billaddr" value="" placeholder="Billing Address" required></td> </tr>
        <tr>
        <td>
            <input type="checkbox" name="billing" onclick="FillBilling(this.form)">
            <em>Check this box if Billing Address and Mailing Address are the same.</em>

        </td>
        </tr>
        <tr> <td>Shipping Address</td><td> <input type="text" id="shipaddr" name="shipaddr" value="" placeholder="Shipping Address" required></td> </tr>   
        <tr><td> 
            <input type="hidden" name="Save" value="0" />
            <input type="checkbox" id="Save" name="Save" />
            <em>Save This Profile</em>
        </td></tr>   
            <tr>
                <td>
                   <input id="button" type="submit"  name="submit_Order" value="Proceed To Checkout">   
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