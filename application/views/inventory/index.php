<div class=container>
   <h3>Collection</h3>
    <div>
        <h3>Books in Collection: <?php echo $amount_of_books; ?></h3>
    </div>
    <table cellspacing="10">
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Category</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Date Added</td>
            <td>Description</td>
         </tr>
        </thead>
        <tbody>
        <?php foreach ($inventory as $book) { ?>
            <tr>
                <td align="right"><a href="<?php echo URL . 'inventory/EditBookView/' . $book->item_id; ?>">
                    <?php if (isset($book->item_id)) echo $book->item_id; ?></a></td>
                <td><?php if (isset($book->item_name)) echo $book->item_name; ?></td>
                <td><?php if (isset($book->category)) echo $book->category; ?></td>
                <td align="right"><?php if (isset($book->price)) echo $book->price; ?></td>
                <td align="right"><?php if (isset($book->quantity_on_hand)) echo $book->quantity_on_hand; ?></td>
                <td align="right"><?php if (isset($book->date_added)) echo $book->date_added; ?></td>
                <td><?php if (isset($book->item_description)) echo $book->item_description; ?></td>
                <td hidden=$user ><a href="<?php echo URL . 'inventory/detailview/' . $book->item_id; ?>">Review</a></td>
           </tr>
        <?php } ?>
        </tbody>
    </table>
    <input  type="button"   value="Add Book"    onclick="location.href='<?php echo URL; ?>inventory/CreateBookView'"> 
</div>
