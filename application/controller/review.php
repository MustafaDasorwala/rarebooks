<?php

class Review extends Controller
{
 
 
 public function index($id)
    {
        require 'application/views/_templates/header.php';
        require 'application/views/review/index.php';
        require 'application/views/_templates/footer.php';
        
    }
    public function addreview($id)
	{
	session_start();
        if (isset($_POST["submit_add_review"]) && isset($_SESSION["userid"]))
		{
		$review_model = $this->loadModel('ReviewsModel');
		//print($_SESSION["userid"]);
		//print($_POST["id"]);
		$review_model->addreview($_SESSION["userid"], $_POST["id"], $_POST["item_review"], $_POST["item_rating"]);
		}
		
		header ('location: ' . URL . 'inventory/detailview/' . $_POST["id"]);
			
    }

	
}


