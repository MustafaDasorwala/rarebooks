<?php
//session_start();

class confirmordermodel
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
        $query->execute(array('s_id' => $s_id));
        return $query->fetchAll();
    }

    public function getAllPaymentProfile()
    {
        session_start();
        $userid=$_SESSION["userid"];
        $sql = "SELECT * FROM customer_profile where customer_id=:userid";
        $query = $this->db->prepare($sql);
        $query->execute(array(':userid'=>$userid));
        return $query->fetchAll();
    }

//WORK BELOW FUNCTION FOR PLACING ORDER
    //EMBED MUKESH FUNCTION HERE 

     public function checkCardForHotlist($credit_card_number)
    {
        $u_id = $_SESSION['userid'];
        $sql = "SELECT IFNULL(credit_card_number,0) as flag FROM cc_hotlist 
        WHERE credit_card_number = :credit_card_number";
        $query = $this->db->prepare($sql);
        $query->execute(array('credit_card_number' => $credit_card_number));
        return $query->fetchAll();

    }


    public function addtoorder($saveprofile){
//strip_tags($_SESSION['userid']);
       
                            $customer_id = $_SESSION["userid"];
                            $shipping_address = strip_tags($_POST['shipaddr']);
                            $credit_card_number = strip_tags($_POST['cnumber']);
                            $cc_holder_name = strip_tags($_POST['cname']);
                            $billing_address = strip_tags($_POST['billaddr']);
                            $expiration_date_year = strip_tags($_POST['expiration_date_year']);
                             $expiration_date_month = strip_tags($_POST['expiration_date_month']);
                            $ipaddress = $_SERVER['REMOTE_ADDR'];
                            
//Check in HotList . If exists create a log entry and exit . Other wise proceed with order
        $sql=" select count(credit_card_number) as count from cc_hotlist where credit_card_number=:credit_card_number
            ";

               $query = $this->db->prepare($sql);
                   $query->execute(array(':credit_card_number' => $credit_card_number));
                    $count=$query->fetch()->count ; 

                    if($count>0)
                    { 
                   
                    //insert into event

               $sql="Insert into events (customer_id, profile_id, cc_holder_name, credit_card_number, ip_address, date_and_time, description) 
                select  * from (
                    select :customer_id as cust_id ,
                    (
                     ifnull((select profile_id from customer_profile where customer_id= :customer_id  and credit_card_number=:credit_card_number),0)
                    )   as profile_id
                        ,:cc_holder_name as cc_holder_name,:credit_card_number as credit_card_number,:ipaddress as ip_address,NOW() as date_and_time,
                        'Sale Denied - Bad Credit Card' as description
                ) as temp; ";


                    //       $sql="Insert into events (customer_id, cc_holder_name, credit_card_number, ip_address, date_and_time, description) 
                    // select 2 , 
                    //             ,'waq',123123123,'192.168.1.1' ,'01/01/01 10:00:00' ,
                    //             'description' ; ";
                       
                // print($sql);
                $query = $this->db->prepare($sql);
                $query->execute(array(':customer_id' => $customer_id,':cc_holder_name' 
                    => $cc_holder_name,':credit_card_number' => $credit_card_number,':ipaddress' => $ipaddress));
                  // $query->execute();
                      // $query->execute(array(':customer_id' => $customer_id,':credit_card_number' => $credit_card_number,':ipaddress' => $ipaddress));
//,':cc_holder_name' => $cc_holder_name
                     $eventid = $this->db->lastInsertId();
                  //$eventid=1;
                        if($eventid>0)
                        {

                            return -1;    

                        }
                    }
                  //$hotlistid= $query->fetchAll();
           // $hotlistid = $this->db->lastInsertId();

//Hot List Work End
      else {
//Order Work Start
       $sql="INSERT INTO orders( order_date , customer_id, shipping_address,profile_id )
            select CURDATE() as date ,:customer_id ,:shipping_address,ifnull((select profile_id from customer_profile where customer_id=:customer_id and credit_card_number=:credit_card_number),0)  as profile_id
            ";

               $query = $this->db->prepare($sql);
                   $query->execute(array(':customer_id' => $customer_id,':shipping_address' => $shipping_address,
                   ':customer_id' => $customer_id, ':credit_card_number' => $credit_card_number));
                  


                  $orderid = $this->db->lastInsertId();
                
//Order Work End


//Order Detail Work Start
        $sql="INSERT INTO ordered_items(order_id, item_id, quantity)
                select :id as order_id ,sc.item_id,sc.quantity 
                from shopping_cart sc 
                inner join orders o on o.customer_id=sc.customer_id
                where o.order_id=:id and o.customer_id=:customer_id;

                delete from shopping_cart where customer_id=:customer_id;";



                 $query = $this->db->prepare($sql);
                   $query->execute(array(':id' => $orderid,':id' => $orderid,
                   ':customer_id' => $customer_id));
                  
               $orderdetailid= $this->db->lastInsertId();
//Order Detail Work End


 //Customer Profile Work Start              
              //if checkbox selected so then insert
if($saveprofile==1){
          $sql = "INSERT INTO customer_profile(customer_id, shipping_address, credit_card_number, cc_holder_name, billing_address,expiration_date_year, expiration_date_month)  
                SELECT * FROM (SELECT :customer_id as customer_id,:shipping_address as shipping_address,:credit_card_number as credit_card_number,:cc_holder_name as cc_holder_name,:billing_address as billing_address,
                  :expiration_date_year as expiration_date_year,:expiration_date_month as expiration_date_month) as TMP 
                WHERE NOT EXISTS (
                SELECT 1 FROM customer_profile cp
                WHERE cp.credit_card_number = :credit_card_number 
               ) LIMIT 1;";


                   $query = $this->db->prepare($sql);
                   $query->execute(array(':customer_id' => $customer_id,':shipping_address' => $shipping_address,':credit_card_number' => $credit_card_number,
                   ':expiration_date_year' => $expiration_date_year, ':expiration_date_month' => $expiration_date_month,  ':cc_holder_name' => $cc_holder_name,':billing_address' => $billing_address,':expiration_date' => $expiration_date));
                  


                  $profile_id = $this->db->lastInsertId();
                //printf($temp);
}
                //Customer Profile Work End   
                  header ('location: ' . URL . 'confirmorder/thanks');

                    }



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
        $sql = "SELECT * FROM shopping_cart WHERE item_id = :id AND session_id = :sid";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id, ':sid' => $sid));
        return $query->fetchAll();

    }


}
