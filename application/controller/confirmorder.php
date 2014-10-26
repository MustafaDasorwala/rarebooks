<?php
//session_start();

class confirmorder extends Controller
{
 
    public function index()
    {

        $cart_model = $this->loadModel('CartModel');
        $cart = $cart_model->getAllBooksCart();

        $stats_model = $this->loadModel('StatsModel');
        $amount_of_books = $stats_model->getAmountOfBooksCart();

        $cname=$_POST["cname"];
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

        if (isset($_POST["submit_Order"])) 
        {
              $order_model = $this->loadModel('confirmordermodel');
              //$c_id = $_SESSION['userid'];
              $order_model->addtoorder();
        }
       // header('location: '.URL.'inventory/detailview/'.$i_id);
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
