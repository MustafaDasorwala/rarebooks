<div class="container">
<body>
  <?php 
    $useBAddress = '0'; 
    switch ($action) {
        case 'Edit':
            $buttonAction = "Delete";
            $buttonSubmit = "Update";
            $urlDestination = "DeleteBook/";      
            break;
        case 'Create':
            $buttonAction = "Cancel";
            $buttonSubmit = "Insert";
            $urlDestination = "inventoryView/";      
            break;
    }
  ?>
  <h1><?php echo "$action" ?> Book Entry</h1>
    <form action="<?php echo URL; ?><?php echo "inventory/".$action."Book"; ?>" method="post">
    <table border="0">
      <tr>
         <td hidden=true><input type="text" name="item_id" 
                    value='<?php if (isset($book[0]->item_id)) echo $book[0]->item_id; ?>' maxlength="30" size="30"></td>
      </tr>
      <tr>
        <td>NAME</td>
         <td><input type="text" name="name" 
                    value='<?php if (isset($book[0]->item_name)) echo $book[0]->item_name; ?>' maxlength="30" size="30"></td>
      </tr>
      <tr>
        <td>Description</td>
        <td> <input type="text" name="description" 
                    value='<?php if (isset($book[0]->item_description)) echo $book[0]->item_description; ?>'  
                    maxlength="50" size="50">
        </td>
      </tr>
      <tr>
        <td>Price</td>
        <td> <input type="text" name="price" maxlength="8" size="8"
                    value='<?php if (isset($book[0]->price)) echo $book[0]->price; ?>' ></td>
      </tr>
      <tr>
        <td>Category</td>
        <td>
        <select name="category">
            <option hidden="true"><?php if (isset($book[0]->category)) echo $book[0]->category; ?></option>
            <option value="Science">Science</option>
            <option value="Mathematics">Mathematics</option>
            <option value="Religion">Religion</option>
            <option value="History">History</option>
            <option value="Fiction">Fiction</option>
            <option value="Science Fiction">Science Fiction</option>
            <option value="Non-Fiction">Non-Fiction</option>
            <option value="Medicine">Medicine</option>
            <option value="Computers">Computers</option>
        </select>
        </td>
      </tr>
      <tr>
        <td>Quantity</td>
        <td><input  type="text" name="quantity" maxlength="10" size="10" 
                    value='<?php if (isset($book[0]->quantity_on_hand)) echo $book[0]->quantity_on_hand; ?>' ></td>
      </tr>
      <tr>
        <td><input type="submit" value='<?php echo $buttonSubmit ?>'</td>
        <td><input type="button" value='<?php echo $buttonAction ?>' 
                     onclick="location.href='<?php  echo URL; 
                                                    echo "inventory/".$urlDestination; 
                                                    if (isset($book[0]->item_id)) echo $book[0]->item_id; ?>'" </td>
     </tr>
    </table>
  </form>
</body>
</div>
