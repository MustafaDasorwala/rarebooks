<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Admin extends Controller
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
        require 'application/views/admin/index.php';
        require 'application/views/_templates/footer.php';
    }


    public function Login( )
    {
    
         if(( $_POST['userid'] !=''  ) && ( $_POST['password'] != ''))
        {
            $admin_model = $this->loadModel('AdminModel');
            $admin_model->ValidateInventoryManager( $_POST );
            
            if( isset( $_SESSION['valid_user'] ))
            {
                // where to go after authenticating
                session_start();
                $_SESSION['isadmin']=1;
                header('location: ' . URL . 'inventory/inventoryView');            
            }
            else
            {
                // where to go after failed authentication
                header('location: ' . URL . 'admin');       
            }
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL . 'admin');            
        }
     }
     
     public function Logout()
     {
        $admin_model = $this->loadModel('AdminModel');
        $admin_model->Logout( $_POST );

        $this->Login();
     }
     
     public function Registration( )
     {
        $admin_model = $this->loadModel('AdminModel');
        $result = $admin_model->ValidateRegistration( $_POST );
        if ( $result != "" )
        {
            echo "<script type='text/javascript'>alert( '$result' );</script>";
            $regs = (object) $_POST;
            require 'application/views/_templates/header.php';
            require 'application/views/admin/index.php';
            require 'application/views/_templates/footer.php';
            unset($reg);
        }
        else
        {
            $this->Login( );
        }
     }
 }
