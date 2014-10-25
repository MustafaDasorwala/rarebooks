<?php

class Review extends Controller
{
 
 
 public function index()
    {
        
        require 'application/views/review/index.php';
        
    }
    public function addreview()
	{
	session_start();
        if (isset($_POST["submit_add_review"]) && isset($_SESSION["userid"]))
		{
		$review_model = $this->loadModel('ReviewsModel');
		$review_model->addreview($_SESSION["userid"], $_POST["item"], $_POST["item_review"], $_POST["item_rating"]);
		}
		
		header ('location: ' . URL . 'inventory/detailview/' . $_POST["item"]);
			
    }

	
}


