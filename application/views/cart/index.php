

<div class="container">

    <div>
        <h3>CART</h3>
        <div>
            <h3>Total Number of Books: <?php echo $amount_of_books; ?></h3>
        </div>

        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Book</td>
                <td>Price Per Book</td>
                <td>Qty</td>
                <td>Total</td>
                <td>Delete</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cart as $book) { ?>
                <tr <?php if (isset($book->item_name) && isset($book->session_id)) {echo "id=".$book->session_id.$book->item_name; 
                    echo "name=".$book->session_id.$book->item_name; }?>>
                    <td  ><?php if (isset($book->item_name)) echo $book->item_name; ?></td>
                    <td><?php if (isset($book->price)) echo $book->price; ?></td>
                    <td><select >
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
                    <td><a href="<?php echo URL . 'cart/updatecart/' . $book->item_id; ?>">update</a></td>
                    <td><a href="<?php echo URL . 'cart/deletefromcart/' . $book->item_id; ?>">x</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
