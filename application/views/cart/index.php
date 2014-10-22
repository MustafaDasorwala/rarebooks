
<script type="text/javascript">

function UpdateCart(id)
{
    var temp=id.split("-");
    var tblrowId=temp[0]+"-"+temp[1];
    var selId = temp[0]+"-"+temp[1]+"-select";
    var select=document.getElementById(selId);
    var qty =select.options[select.selectedIndex].text;
    var xmlhttp;
    if (window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            
        }
    };
    //alert(xmlhttp.response.Text);
    xmlhttp.open("GET","http://127.0.0.1/rarebooks/cart/updatecart/"+temp[1]+"/"+qty,true);
    xmlhttp.send();
    location.reload();
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
                    <?php foreach ($cart as $book) { ?>
                    <tr <?php if (isset($book->item_id) && isset($book->session_id)) {echo "id=".$book->session_id."-".$book->item_id." "; 
                    echo "name=".$book->session_id."-".$book->item_id; }?>>
                    <td  ><?php if (isset($book->item_name)) echo $book->item_name; ?></td>
                    <td><?php if (isset($book->price)) echo $book->price; ?></td>
                    <td><select <?php if (isset($book->item_id) && isset($book->session_id)) {echo "id=".$book->session_id."-".$book->item_id."-select "; 
                    echo "name=".$book->session_id."-".$book->item_id."-select"; }?>>
                    <?php
                    for($i=1;$i<=$book->quantity_on_hand;$i++){
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
                <td><a href="<?php echo URL . 'cart/deletefromcart/' . $book->item_id; ?>">x</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
</form>
