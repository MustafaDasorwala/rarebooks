<?php
session_start();

class Inventory extends Controller
{

    public function index()
    {
 
        $inventory_model = $this->loadModel('InventoryModel');
        $inventory = $inventory_model->getAllBooks();


        $stats_model = $this->loadModel('StatsModel');
        $amount_of_books = $stats_model->getAmountOfBooks();


        require 'application/views/_templates/header.php';
        require 'application/views/inventory/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function detailview($inventory_id)
    {
        $inventory_model = $this->loadModel('InventoryModel');
        $reviews_model = $this->loadModel('ReviewsModel');
        $book = $inventory_model->getBook($inventory_id);
        $reviews = $reviews_model->getReviews($inventory_id);

        require 'application/views/_templates/header.php';
        require 'application/views/inventory/item.php';
        require 'application/views/_templates/footer.php';
    }

}
