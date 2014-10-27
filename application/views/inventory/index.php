<script type="text/javascript">
function search(id)
{
    var selId = "search-text";
    var txtBox=document.getElementById(selId);
    var searchtext =txtBox.value;
   // alert('hi');
//alert('<?php echo URL;?>'+"inventory/search/"+searchtext);
//+"inventory/search/1"
    location.href = '<?php echo URL;?>'+"inventory/search/"+searchtext;
//http://localhost:8080/rarebooks
}

function filter(id)
{
    var temp=id.split("-");
    var selId = temp[0]+"-select";
    var select=document.getElementById(selId);
    var cat =select.options[select.selectedIndex].text;
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
    //if(cat != 'all')
    //{
        xmlhttp.open("GET","http://localhost:8080/rarebooks/inventory/filterbycategory/"+cat,true);
        xmlhttp.send();
        location.reload();
    //}
}

</script>
<form method = "POST" action = "http://localhost:8080/rarebooks/inventory/filterbycategory">
<div class="container">

    <div>
        <h3>Books in Collection: <?php echo $amount_of_books; ?></h3>
        <h3>Collection</h3>
        <div>
            <h3>Total Number of Books: <?php echo $amount_of_books; ?></h3>
        </div>
        <label>Search</label>
        <input type = "text" id = "search-text" name = "search-text" value = ""/>
        <input type = "button" id = "button-text" name = "button-text" value = "go" onclick="search(this.id);"/>
        <br><br>
        <label>Category Filter</label>
        <select id="filterCategory-select" name="filterCategory-select">
            <option>all</option>
            <?php 
                if(isset($category)){
                    foreach ($category as $catx) { 
                        echo '<option value="'.$catx->category.'">'.$catx->category.'</option>';
                    }
                }
            ?>
        </select>
        <input type="submit" id="filterCategory-button" name="filterCategory-button" value="Filter";"/>
        <br>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td><a href="<?php echo URL . 'inventory/index/Id'; ?>">Id</a></td>
                <td><a href="<?php echo URL . 'inventory/index/Name'; ?>">Name</a></td>
                <td><a href="<?php echo URL . 'inventory/index/Category'; ?>">Category</a></td>
                <td><a href="<?php echo URL . 'inventory/index/Price'; ?>">Price</a></td>
                <td> Add to Cart</td>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($inventory as $book) { 
            if($book->quantity_on_hand>0) { ?>
                <tr> 

                    <td><?php if (isset($book->item_id)) echo $book->item_id; ?></td>
                    <td><a href="<?php echo URL . 'inventory/detailview/' . $book->item_id; ?>">
                      <?php if (isset($book->item_name)) echo $book->item_name; ?></a></td>
                    <td><?php if (isset($book->category)) echo $book->category; ?></td>
                    <td><?php if (isset($book->price)) echo $book->price; ?></td>
                    <td><a href="<?php echo URL . 'inventory/detailview/' . $book->item_id; ?>">
                      <input type="button" value="add"/></a></td>
                </tr>
            <?php }} ?>
            </tbody>
        </table>
</div>
</form>
