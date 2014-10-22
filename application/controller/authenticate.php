<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Authenticate extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */

    public function index()
    {
        // debug message to show where you are, just for the demo
        //echo 'Message from Controller: You are in the controller home, using the method index()';
        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/authenticate/index.php';
        require 'application/views/_templates/footer.php';
    }


    public function Login( )
    {
    
         if(( $_POST['userid'] !=''  ) && ( $_POST['password'] != ''))
        {
            $authenticate_model = $this->loadModel('AuthenticateModel');
            $authenticate_model->ValidateInventoryManager( $_POST );
            
            if( isset( $_SESSION['valid_user'] ))
            {
                // where to go after authenticating
                header('location: ' . URL . 'inventory');            
            }
            else
            {
                $authenticate_model->ValidateCustomer( $_POST );
                if( isset( $_SESSION['valid_user'] ))
                {
                    // where to go after authenticating
                    header('location: ' . URL . 'customer');            
                }
                else
                {
                    // go back to the login page
                    header('location: ' . URL . 'home/index/1' );       
                }
            }
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL . 'home/index/2');       
           
        }
     }
     
     public function Logout()
     {
        $authenticate_model = $this->loadModel('AuthenticateModel');
        $authenticate_model->Logout( $_POST );

        $this->Login();
     }
     
     public function Registration( )
     {
        $authenticate_model = $this->loadModel('AuthenticateModel');
        $result = $authenticate_model->ValidateRegistration( $_POST );
        if ( $result != "" )
        {
            echo "<script type='text/javascript'>alert( '$result' );</script>";
            $regs = (object) $_POST;
            require 'application/views/_templates/header.php';
            require 'application/views/authenticate/index.php';
            require 'application/views/_templates/footer.php';
            unset($reg);
        }
        else
        {
            $this->Login( );
        }
     }

     public function HotListView( )
     {
        $authenticate_model = $this->loadModel('AuthenticateModel');

        $ccHotlist = $authenticate_model->GetHotlist( );
        
        require 'application/views/_templates/header.php';
        require 'application/views/authenticate/HotlistAdmin.php';
        require 'application/views/_templates/footer.php';   
    }
     
    public function DeleteItemFromHotlist()
    {
        $authenticate_model = $this->loadModel('AuthenticateModel');
        $authenticate_model->DeleteItemFromHotlist( $_POST );

        // where to go after failed authentication
        header('location: ' . URL . 'authenticate/HotListView');       
    }   
    
    public function AddItemToHotlist()
    {
        $authenticate_model = $this->loadModel('AuthenticateModel');
        $result = $authenticate_model->AddItemToHotlist( $_POST );
     
        // where to go after failed authentication
        header('location: ' . URL . 'authenticate/HotListView');  
   }
 }
