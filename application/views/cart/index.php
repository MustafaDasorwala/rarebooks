
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
                <tr>
                    <td><?php if (isset($book->item_name)) echo $book->item_name; ?></td>
                    <td><?php if (isset($book->price)) echo $book->price; ?></td>
                    <td><?php if (isset($book->quantity)) echo $book->quantity; ?></td>
                    <td><?php if (isset($book->price) && isset($book->quantity)) echo $book->price*$book->quantity; ?></td>
                    <td><a href="<?php echo URL . 'cart/deletefromcart/' . $book->item_id; ?>">x</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
