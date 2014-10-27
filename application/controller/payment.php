<?php

/**
 * Class Payment
 *
 */
class Payment extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://php-mvn/payment/index
     */
    public function index()
    {
             // where to go after failed authentication
            header('location: ' . URL );                   
    }
    
/*    public function index()
    {
        if( $this->VerifyAdminLogin( ) == 1 )
        {
            $payment_model = $this->loadModel('PaymentModel');
            $profiles = $payment_model->getAllPaymentProfile();

            // load views. within the views we can echo out $songs and $amount_of_songs easily
            require 'application/views/_templates/header.php';
            require 'application/views/payment/index.php';
            require 'application/views/_templates/footer.php';
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL );            
        }  
    }

    public function AddProfileView( )
    {
         if( $this->VerifyAdminLogin( ) == 1 )
        {
            $payment_model = $this->loadModel('PaymentModel');
            $action = "Create";
            $ccProfile = array();
            require 'application/views/_templates/header.php';
            require 'application/views/payment/cCardProfile.php';
            require 'application/views/_templates/footer.php';
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL );            
        }  
        
    }

    public function CreateProfile( )
    {
        if( $this->VerifyAdminLogin( ) == 1 )
        {
           $payment_model = $this->loadModel('PaymentModel');
            $result = $payment_model->insertProfile( $_POST );
         
            if( $result == '' )
            {
                // where to go after song has been added
                header('location: ' . URL . 'payment/index');       
            }
            else
            {
                $action = "Create";
                $ccProfile = $_POST;
                echo "<script type='text/javascript'>alert( '$result' );</script>";
                require 'application/views/_templates/header.php';
                require 'application/views/payment/cCardProfile.php';
                require 'application/views/_templates/footer.php';
            }
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL );            
        }  
   }
   
   public function EditProfile( )
   {
        if( $this->VerifyAdminLogin( ) == 1 )
        {
            $payment_model = $this->loadModel('paymentModel');
            $book = $payment_model->EditProfile( $_POST );

            // where to go after profile editted
            header('location: ' . URL . 'payment/index');       
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL );            
        }  
   }
   
   public function EditProfileView($profile_id)
   {
        if( $this->VerifyAdminLogin( ) == 1 )
        {
            $payment_model = $this->loadModel('paymentModel');
            $ccProfile = $payment_model->getProfile($profile_id);
            $action = 'Edit';

            require 'application/views/_templates/header.php';
            require 'application/views/payment/cCardProfile.php';
            require 'application/views/_templates/footer.php';
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL );            
        }  
  }
    
    public function DeleteProfile($profile_id)
    {
        if( $this->VerifyAdminLogin( ) == 1 )
        {
            $payment_model = $this->loadModel('paymentModel');
            $result = $payment_model->deleteProfile($profile_id);

            // where to go after song has been added
            header('location: ' . URL . 'payment/index');         
        }
        else
        {
            // where to go after failed authentication
            header('location: ' . URL );            
        }  
    } */
}

