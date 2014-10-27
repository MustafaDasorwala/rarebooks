<?php
//session_start();

class confirmorder extends Controller
{
 
    public function checkadmin1(){

        if(session_id() == '') {
            session_start();
        }
        if(isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == 1){

            header('location: ' . URL . 'inventory/inventoryView');

        }
    }

    public function index()
    {

        $this->checkadmin1();
        $cart_model = $this->loadModel('CartModel');
        $cart = $cart_model->getAllBooksCart();

        $stats_model = $this->loadModel('StatsModel');
        $amount_of_books = $stats_model->getAmountOfBooksCart();

        $payment_model = $this->loadModel('PaymentModel');
        $profiles = $payment_model->getAllPaymentProfile();

        //$cname=$_POST["cname"];
    
        // if (isset($_POST["Save"])) {

   
        //   echo 'checked';
        // } else {
        //     echo 'not chcekd';
           
        // }
        require 'application/views/_templates/header.php';
        require 'application/views/confirmorder/index.php';
        require 'application/views/_templates/footer.php';
    }

   // public function checkout()
   //  {

   //      $cart_model = $this->loadModel('CartModel');
   //      $cart = $cart_model->getAllBooksCart();

   //      $stats_model = $this->loadModel('StatsModel');
   //      $amount_of_books = $stats_model->getAmountOfBooksCart();

   //      require 'application/views/_templates/header.php';
   //      require 'application/views/cart/checkout.php';
   //      require 'application/views/_templates/footer.php';
   //  }
    public function Order(){



        $this->checkadmin1();

        if (isset($_POST["submit_Order"])) 
        {
              $order_model = $this->loadModel('confirmordermodel');
              //$c_id = $_SESSION['userid'];
             // echo 'hi';
               if (isset($_POST["SaveProfile"]) && $_POST["SaveProfile"]==1) {

                  $order_model->addtoorder(1);
         //echo $_POST["SaveProfile"];
        } else {
            //echo 'not chcekd';
          $order_model->addtoorder(0);
           
        }
             
        }
       // header('location: '.URL.'inventory/detailview/'.$i_id);
    }

      public function thanks(){

       $this->checkadmin1();
       require 'application/views/confirmorder/thanks.php';
      
    }


     public function denied(){

       $this->checkadmin1();
       require 'application/views/confirmorder/denied.php';
      
    }


    //WORK ABOVE FOR PLACING ORDER

   //  public function updatecart($i_id, $qty =1){
   //      $cart_model = $this->loadModel('CartModel');
   //      $c_id = $_SESSION['userid'];
   //      $cart_model->addtocart($i_id, $c_id, $qty);
   //      header('location: '.URL.'cart/view/');
   //  }

   //  public function deletefromcart($i_id){
   //      $cart_model = $this->loadModel('CartModel');
   //      $cart_model->deletefromcart($i_id);
   //      header('location: '.URL.'cart/view/');

   //  }

}
