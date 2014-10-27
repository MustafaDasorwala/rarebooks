
<script type="text/javascript">

function UpdateCart(id)
{
    var temp=id.split("-");
    var tblrowId=temp[0]+"-"+temp[1];
    var selId = temp[0]+"-"+temp[1]+"-select";
    var select=document.getElementById(selId);
    var qty =select.options[select.selectedIndex].text;
    location.href = '<?php echo URL;?>'+"cart/updatecart/"+temp[1]+"/"+qty;

}

</script>
<form method = "POST" >

    <div class="container">

        <div>
            <h3>CART</h3>
            <div>
                <h3>Total Number of Books: <?php echo $amount_of_books; ?></h3>
            </div>

            <table id="carttable" name="carttable">
                <thead style="background-color: #ddd; font-weight: bold;">
                    <tr>
                        <td>Book</td>
                        <td>Unit Price</td>
                        <td>Qty</td>
                        <td>Total</td>
                        <td>Update</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $book) {
                    if($book->quantity_on_hand>0) { ?>
                    <tr <?php if (isset($book->item_id) && isset($book->session_id)) {echo "id=".$book->session_id."-".$book->item_id." "; 
                    echo "name=".$book->session_id."-".$book->item_id; }?>>
                    
                    <td  ><a href="<?php echo URL . 'inventory/detailview/' . $book->item_id; ?>" ><?php if (isset($book->item_name)) echo $book->item_name; ?></a></td>
                    <td><?php if (isset($book->price)) echo $book->price; ?></td>
                    <td><select <?php if (isset($book->item_id) && isset($book->session_id)) {echo "id=".$book->session_id."-".$book->item_id."-select "; 
                    echo "name=".$book->session_id."-".$book->item_id."-select"; }?>>
                    <?php
                    for($i=1;$i<=$book->quantity+$book->quantity_on_hand-intval($qty_in_cart[$book->item_id]) ;$i++){
                        if($i == $book->quantity){
                            echo '<option selected="selected" value="'.$book->item_id.$i.'">'.$i.'</option>';
                        }
                        else{
                            echo '<option value="'.$book->item_id.$i.'">'.$i.'</option>';
                        }
                    }
                    ?>
                </select></td>
                <td><?php if (isset($book->price) && isset($book->quantity)) echo $book->price*$book->quantity; ?></td>
                <td <?php if (isset($book->item_id) && isset($book->session_id)) {echo "id=".$book->session_id."-".$book->item_id."-total "; 
                echo "name=".$book->session_id."-".$book->item_id."-total"; }?>><input type="button" <?php if (isset($book->item_id) && isset($book->session_id)) {echo "id=".$book->session_id."-".$book->item_id."-button "; 
                echo "name=".$book->session_id."-".$book->item_id."-button"; }?> value="Update" onclick="UpdateCart(this.id);" /></td>
                <td><a href="<?php echo URL . 'cart/deletefromcart/' . $book->item_id; ?>">X</a></td>
            </tr>

            <?php } } ?>
                 <tr>
                    <td>
                 <a href=<?php if(isset($_SESSION["userid"] )&& $_SESSION["userid"]>0){ echo URL.'cart/checkout';} 
                 else {echo URL.'login/index';}
                 ?> >
                       <input id="button" type="button" name="ConfirmOrder" value="CheckOut"> 
                    </a>
                 <td>
            </tr>

        </tbody>
    </table>
</div>
</div>
</form>
