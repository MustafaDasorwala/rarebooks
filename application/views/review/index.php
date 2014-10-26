<div class="container">
<h1>Add a review</h1>
<form method=POST action="<?php echo URL; ?>review/addreview">
Customer Item Review form:
<br />
<br />
Username: <br />
<input type="text" maxlength="25" name="uname" >
<br />
<br />
Item_id: <br />
<input type="text" maxlength="8" name="item" >
<br />
<br />
Review: <br />
<textarea cols="50" rows="20" maxlength="1000" name="item_review"></textarea>
<br />
<br />
Rating: <br />
<input type="radio" checked="checked" name="item_rating" value="1"> 1
<input type="radio" name="item_rating" value="2"> 2
<input type="radio" name="item_rating" value="3"> 3
<input type="radio" name="item_rating" value="4"> 4
<input type="radio" name="item_rating" value="5"> 5
<br />
<br />
<input type="submit" name="submit_add_review" value="Post Review">
</form>
</div>
