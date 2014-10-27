<?php

class adminmodel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            session_start();
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function ValidateCustomer( $params )
    {
       // if the user has just tried to log in
      $userid = $params['userid'];
      $password = $params['password'];
      $dbResults = $this->FindUsersInDb("customers", $userid);
     
      if( $dbResults[0]->password == $password )
      {
        // if they are in the database register the user id
        $_SESSION['valid_user'] = $userid;
        $_SESSION['is_manager'] = 0;
        $_SESSION['email'] = $dbResults[0]->email_address;
        $_SESSION['customer_id'] = $dbResults[0]->customer_id;
      }
   
    }
    
    public function ValidateInventoryManager($params)
    {

      // if the user has just tried to log in
      $userid = $params['userid'];
      $password = $params['password'];
      $dbResults = $this->FindUsersInDb("admin_users", $userid);
     
      if( $dbResults[0]->password == $password )
      {
        // if they are in the database register the user id
        $_SESSION['valid_user'] = $userid;
        $_SESSION['isadmin'] = 1;
        $_SESSION['role_id'] = $dbResults[0]->role_id;
        $_SESSION['email'] = $dbResults[0]->email_address;
      }
      else
      {
         $this->Logout();     
      }
    }

    function FindUsersInDb($table,$id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE username = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        $queryReturn = $query->fetchAll();
        return $queryReturn;

    }

    public function Logout()
    {
        unset( $_SESSION['isadmin'] );
        unset( $_SESSION['valid_user'] );
        unset( $_SESSION['role_id'] );
        unset( $_SESSION['email'] );
        unset( $_SESSION['customer_id'] );
        session_destroy();
    }
    
   public function ValidateRegistration( $param )
    {
        $result = "";
        if( strlen($param['password']) > 5 )
        {
            if(filter_var($param['email_address'], FILTER_VALIDATE_EMAIL))
            {
                if( ( $param['first_name'] != '' ) &&
                    ( $param['last_name'] != '' ) &&
                    ( $param['username'] != '' ) )
                {
                    $dbResult =  $this->FindUsersInDb("customers",$param['username'] );
                    if( !isset($dbResult[0]->username) )
                    {
                        $this->InsertRegistrationInDb( $param );
                    }
                    else
                    {
                        $result = "duplicate entry";
                    }   
                } 
                else
                {
                    $result = "Must populate all fields";
                }
            }
            else
            {
                $result= "Not a valid email address";
            }
        }
        else
        {
            $result= "Password is not long enough";
        }
        return( $result );
    }

    function InsertRegistrationInDb( $param )
    {
        $password = $param['password'];
        $sql = "INSERT INTO customers value (   0, '".$param['username']."',
                                                '".$password."',
                                                '".$param['first_name']."',
                                                '".$param['last_name']."',
                                                '".$param['email_address']."',
                                                '".$param['customer_type']."' )";
                                    
        $query = $this->db->prepare($sql);
        
        return $query->execute(  );
     }
     
    public function GetHotlist()
    {
        $sql = "SELECT * FROM cc_hotlist order by credit_card_number";
        $query = $this->db->prepare($sql);
        $query->execute( );
        $queryReturn = $query->fetchAll();
        return $queryReturn;

    }

    public function DeleteItemFromHotlist ($dbItems)
    {
        
        foreach( $dbItems as $ccBlacklist )
        {
            foreach( $ccBlacklist as $cCard )
            {
                $sql = "DELETE FROM cc_hotlist WHERE credit_card_number = :credit_card_number";
                $query = $this->db->prepare($sql);
                $query->execute( array('credit_card_number' => $cCard ));
            }
        }
        return;
    }
    
    public function AddItemToHotlist( $ccToAdd )
    {
        $doNotInsert = 0;
        $ccList = $this->GetHotlist();
        if( ( strlen($ccToAdd['credit_card_number'] ) == 16 ) && 
            (is_numeric($ccToAdd['credit_card_number'])) )
        {
            foreach( $ccList as $ccItem)
            {
                if($ccItem->credit_card_number == $ccToAdd['credit_card_number'])
                {
                    $doNotInsert = 1;
                }
            }
        }
        else
        {
            $doNotInsert = 1;
        }
        
        if( $doNotInsert == 0 )
        {
            if( isset( $ccToAdd['credit_card_number'] ) )
            {
                $sql = "INSERT INTO cc_hotlist value (  '".$ccToAdd['credit_card_number']."',
                                                        '".$ccToAdd['credit_card_name']."' )";
                $query = $this->db->prepare($sql);
                $query->execute( );
            }
        }
        return $doNotInsert; 
    }
}

?>
