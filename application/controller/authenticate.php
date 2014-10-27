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
        // where to go after failed authentication
        header('location: ' . URL );       
   }

     public function HotListView( )
     {
        if( $this->VerifyAdminLogin( ) == 1 )
        {
            $authenticate_model = $this->loadModel('AuthenticateModel');
            $ccHotlist = $authenticate_model->GetHotlist( );
            
            require 'application/views/_templates/header.php';
            require 'application/views/authenticate/HotlistAdmin.php';
            require 'application/views/_templates/footer.php'; 
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL );            
        }  
    }
     
    public function DeleteItemFromHotlist()
    {
        if( $this->VerifyAdminLogin( ) == 1 )
        {
            $authenticate_model = $this->loadModel('AuthenticateModel');
            $authenticate_model->DeleteItemFromHotlist( $_POST );

            // where to go after failed authentication
            header('location: ' . URL . 'authenticate/HotListView');       
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL );            
        }  
    }   
    
    public function AddItemToHotlist()
    {
        if( $this->VerifyAdminLogin( ) == 1 )
        {
            $authenticate_model = $this->loadModel('AuthenticateModel');
            $result = $authenticate_model->AddItemToHotlist( $_POST );
     
            // where to go after failed authentication
            header('location: ' . URL . 'authenticate/HotListView');  
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL );            
        }  
    }
 }
 
 ?>
