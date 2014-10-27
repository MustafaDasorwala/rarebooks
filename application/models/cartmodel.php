<?php
//session_start();

class CartModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function getAllBooksCart()
    {
        $s_id = session_id();
        $sql = "SELECT * FROM shopping_cart as sc inner join inventory as inv on sc.item_id = inv.item_id 
        WHERE session_id = :s_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':s_id' => $s_id));
        return $query->fetchAll();
    }

    // public function getAllPaymentProfile()
    // {
    //     session_start();
    //     $userid=$_SESSION["userid"];
    //     $sql = "SELECT * FROM customer_profile where customer_id=:userid";
    //     $query = $this->db->prepare($sql);
    //     $query->execute(array(':userid'=>$userid));
    //     return $query->fetchAll();
    // }

    public function addtocart($i_id, $c_id=0, $qty =0, $upd=0){

        $sql = '';
        $s_id = session_id();
        print($s_id);
        $qty_on_hand = $this->getQuantity($i_id);
        $qty_in_cart = $this->getBookCartCountByItemId($i_id);
        $qty_in_current_cart=0;
        if($this->getBookCart($i_id, $s_id)){
            $qty_in_current_cart = $this->getBookCart($i_id, $s_id);
        }
        $qty_updated = $qty_in_current_cart[0]->quantity + $qty_on_hand[0]->quantity_on_hand - $qty_in_cart[0]->Book_Cart_SUM;
    
        if($qty_updated < $qty){
                return 0;
        }
        if($this->getBook($i_id))
        {
            
            if($this->getBookCart($i_id, $s_id)) {
                if($upd == 0){
                    $x=$this->getBookCart($i_id, $s_id);
                    $qty = $x[0]->quantity + $qty;
                }

                $sql = "UPDATE shopping_cart SET quantity = :qty WHERE session_id  = :s_id  AND item_id = :i_id";
                $query = $this->db->prepare($sql);
                $query->execute(array(':i_id' => $i_id, ':s_id' => $s_id, ':qty' => $qty));
               
            }
            else{
                if($c_id == 0){
                    $sql = "INSERT INTO shopping_cart (customer_id , item_id, session_id, quantity)VALUES( NULL, :i_id, :s_id, :qty)";
                    $query = $this->db->prepare($sql);
                    $query->execute(array(':i_id' => $i_id, ':s_id' => $s_id, ':qty' => $qty));
                }
                else{
                    $sql = "INSERT INTO shopping_cart (customer_id , item_id, session_id, quantity)VALUES( :c_id, :i_id, :s_id, :qty)";
                    $query = $this->db->prepare($sql);
                    $query->execute(array(':c_id' => $c_id,':i_id' => $i_id, ':s_id' => $s_id, ':qty' => $qty));
                }
            }
            /*$sql = "INSERT INTO shopping_cart VALUES(NULL,:i_id, :s_id, :qty)";
                $query = $this->db->prepare($sql);
                $query->execute(array(':i_id'=> $i_id, ':s_id' => $s_id, ':qty' => $qty));*/
            
            //return $query->num_rows;
                return 1;
        }
        return 0;
        

    }

    public function deletefromcart($i_id){

        $s_id = session_id();
        $sql = "DELETE FROM shopping_cart WHERE item_id = :i_id AND session_id  = :s_id ";
        $query = $this->db->prepare($sql);
        $query->execute(array(':i_id' => $i_id, ':s_id' => $s_id));

    }

    public function getBook($id){
        $sql = "SELECT * FROM inventory WHERE item_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        return $query->fetchAll();

    }

    public function getBookCart($id, $sid){
        $sql = "SELECT * FROM shopping_cart WHERE item_id = :id AND session_id = :sid ";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id, ':sid' => $sid));
        return $query->fetchAll();

    }

    public function getBookCartCountByItemId($id){

        $sql = "SELECT SUM(quantity) as Book_Cart_SUM FROM shopping_cart WHERE item_id = :id ";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        return $query->fetchAll();

    }

    public function getQuantity($id){

        $sql = "SELECT quantity_on_hand FROM inventory WHERE item_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        return $query->fetchAll();

    }

    public function getQuantityInCart(){
    
        $sql = "SELECT item_id,SUM(quantity) as sum_qty_cart FROM shopping_cart GROUP BY item_id";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


}
