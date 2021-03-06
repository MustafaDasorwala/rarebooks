<?php
session_start();

class Cart extends Controller
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
        $t_qty_in_cart = $cart_model->getQuantityInCart();
        $qty_in_cart= array();
        foreach ($t_qty_in_cart as $t){

            $qty_in_cart[$t->item_id] = $t->sum_qty_cart;

        }

        require 'application/views/_templates/header.php';
        require 'application/views/cart/index.php';
        require 'application/views/_templates/footer.php';
    }

    public function addtocart($i_id, $qty =1){
        $this->checkadmin1();
        $cart_model = $this->loadModel('CartModel');
        $c_id = $_SESSION['userid'];
        $cart_model->addtocart($i_id, $c_id, $qty );
        header('location: '.URL.'inventory/detailview/'.$i_id);
    }

    public function updatecart($i_id, $qty =0){
        $this->checkadmin1();
        $cart_model = $this->loadModel('CartModel');
        $c_id = $_SESSION['userid'];
        $cart_model->addtocart($i_id, $c_id, $qty,1);
        header('location: '.URL.'cart/view/');
    }

    public function deletefromcart($i_id){
        $this->checkadmin1();
        $cart_model = $this->loadModel('CartModel');
        $cart_model->deletefromcart($i_id);
        header('location: '.URL.'cart/view/');

    }
    
   public function checkout()
    {
        $this->checkadmin1();

        $cart_model = $this->loadModel('CartModel');
        $cart = $cart_model->getAllBooksCart();

        $stats_model = $this->loadModel('StatsModel');
        $amount_of_books = $stats_model->getAmountOfBooksCart();

        $payment_model = $this->loadModel('PaymentModel');
        $profiles = $payment_model->getAllPaymentProfile();

        require 'application/views/_templates/header.php';
        require 'application/views/cart/checkout.php';
        require 'application/views/_templates/footer.php';
    }



}
