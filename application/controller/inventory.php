<?php

/**
 * Class Inventory
 *
 */
class Inventory extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://php-mvn/inventory/index
     */

    public function index($col = 'id')
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Inventory, using the method index().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $inventory_model = $this->loadModel('InventoryModel');
        $inventory = $inventory_model->getAllBooks();
        if($col == 'Id'){
            $inventory = $inventory_model->getAllBooks();
        }
        elseif($col == 'Name'){
            $inventory = $inventory_model->getAllBooksSortByName();
        }
        elseif($col == 'Category'){
            $inventory = $inventory_model->getAllBooksSortByCategory();
        }
        elseif($col == 'Price'){
            $inventory = $inventory_model->getAllBooksSortByPrice();
        }

        // load another model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $stats_model = $this->loadModel('StatsModel');
        $amount_of_books = $stats_model->getAmountOfBooks();

        // load views. within the views we can echo out inventory
        require 'application/views/_templates/header.php';
        require 'application/views/inventory/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function detailview($inventory_id)
    {
        $inventory_model = $this->loadModel('InventoryModel');
        $book = $inventory_model->getBook($inventory_id);
        
        require 'application/views/_templates/header.php';
        require 'application/views/inventory/item.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function EditBookView($inventory_id)
    {
        $inventory_model = $this->loadModel('InventoryModel');
        $book = $inventory_model->getBook($inventory_id);
        $action = 'Edit';
 
        require 'application/views/_templates/header.php';
        require 'application/views/inventory/editBookInInventory.php';
        require 'application/views/_templates/footer.php';
    }
    
    public function CreateBookView()
    {
       $inventory_model = $this->loadModel('InventoryModel');
       $action="Create";
       require 'application/views/_templates/header.php';
       require 'application/views/inventory/editBookInInventory.php';
       require 'application/views/_templates/footer.php';
 
    }

    public function CreateBook( )
    {
        $inventory_model = $this->loadModel('InventoryModel');
        $result = $inventory_model->CreateBook( $_POST );

        if( $result == '' )
        {
            // where to go after song has been added
            header('location: ' . URL . 'inventory/index');       
        }
        else
        {
            echo "<script type='text/javascript'>alert( '$result' );</script>";
            require 'application/views/_templates/header.php';
            require 'application/views/inventory/editBookInInventory.php';
            require 'application/views/_templates/footer.php';
        }
   }
   
    public function EditBook( )
    {
        $inventory_model = $this->loadModel('InventoryModel');
        $result = $inventory_model->EditBook( $_POST );
        if( $result == '' )
        {
            // where to go after song has been added
            header('location: ' . URL . 'inventory/index');       
        }
        else
        {
            echo "<script type='text/javascript'>alert( '$result' );</script>";
        } 
    }

    public function DeleteBook( $item_id )
    {
        $inventory_model = $this->loadModel('InventoryModel');
        $result = $inventory_model->DeleteBook( $item_id );
        // where to go after song has been added
        header('location: ' . URL . 'inventory/index');       

    }

    public function index2($col)
    {
 
        $inventory_model = $this->loadModel('InventoryModel');
        if($col == "id"){
            $inventory = $inventory_model->getAllBooks();
        }


        $stats_model = $this->loadModel('StatsModel');
        $amount_of_books = $stats_model->getAmountOfBooks();


        require 'application/views/_templates/header.php';
        require 'application/views/inventory/index.php';
        require 'application/views/_templates/footer.php';
    }



}

