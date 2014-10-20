<div class="container">
  <h3>Name : <?php echo $book[0]->item_name; ?></h3>
  <h3>Description:</h3>
  <p> <?php echo $book[0]->item_description; ?> </p>
  <a href=<?php echo URL.'cart/addtocart/'.$book[0]->item_id ?> > add to cart </a>
  <input type="button" id = "review" name = "review" value="Add Review"/>
  </br>
</div>
<div class="container">
	<h3>Reviews</h3>
	<table>
 <?php foreach ($reviews as $review) { ?>
  	<tr>
        <td>Customer : <?php if (isset($review->customer_id)) echo $review->customer_id; ?></td>
        <td>Rating : <?php if (isset($review->item_rating)) echo $review->item_rating; ?></td>
    </tr>
    <tr>
    	<td>Review : <?php if (isset($review->review_text)) echo $review->review_text; ?></td>
    </tr>
 <?php } ?>
</table>
</div>
