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
        $payment_model = $this->loadModel('PaymentModel');
        $profiles = $payment_model->getAllPaymentProfile();

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/payment/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function AddProfileView( )
    {
        $payment_model = $this->loadModel('PaymentModel');
        $action = "Create";
        $ccProfile = array();
        require 'application/views/_templates/header.php';
        require 'application/views/payment/cCardProfile.php';
        require 'application/views/_templates/footer.php';
        
    }

    public function CreateProfile( )
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
   
   public function EditProfile( )
   {
        $payment_model = $this->loadModel('paymentModel');
        $book = $payment_model->EditProfile( $_POST );
 
        // where to go after profile editted
        header('location: ' . URL . 'payment/index');       
   }
   
   public function EditProfileView($profile_id)
   {
        $payment_model = $this->loadModel('paymentModel');
        $ccProfile = $payment_model->getProfile($profile_id);
        $action = 'Edit';

        require 'application/views/_templates/header.php';
        require 'application/views/payment/cCardProfile.php';
        require 'application/views/_templates/footer.php';
   }
    
    public function DeleteProfile($profile_id)
    {
        $payment_model = $this->loadModel('paymentModel');
        $result = $payment_model->deleteProfile($profile_id);
 
        // where to go after song has been added
        header('location: ' . URL . 'payment/index');         
    }
}

