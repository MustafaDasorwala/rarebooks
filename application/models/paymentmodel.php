<?php

class PaymentModel
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

    public function getAllPaymentProfile()
    {
        session_start();
        $userid=$_SESSION["userid"];
        $sql = "SELECT * FROM customer_profile where customer_id=:userid";
        $query = $this->db->prepare($sql);
        $query->execute(array(':userid'=>$userid));
        return $query->fetchAll();
    }

    public function ValidateProfileParameters( $dbPOST )
    {
        $result = '';
        $strArray = array( 'cc_holder_name','billing_address' );
        $numericArray = array( 'expiration_date_year','expiration_date_month','credit_card_number' );
        foreach( $numericArray as $index )
        { 
            if( is_numeric( $dbPOST[$index] ) == 0 )
            {
                $result = $index . ' is not numeric';
                return $result;
             }
        }

        foreach( $strArray as $index )
        { 
            if( strlen( $dbPOST[$index] ) == 0 )
            {
                $result = $index . ' is not specified';
                return $result;
             }
        }
        
        return $result;        
    }

    
    public function insertProfile( $dbPOST )
    {
        $result = $this->ValidateProfileParameters($dbPOST);
        if( $result == '' )
        {
            if( $dbPOST['useBAddress'] == '1' )
            {
                $sAddress = $dbPOST['billing_address'];
            }
            else
            {
                 $sAddress = $dbPOST['shipping_address'];           
            }
            $dbresult = $this->insertProfileInDB(   $dbPOST['cc_holder_name'],$dbPOST['billing_address'],
                                                    $dbPOST['credit_card_number'],$dbPOST['expiration_date_month'],
                                                    $dbPOST['expiration_date_year'],$sAddress );

        } 
        return $result;       
    }
    
    
    public function insertProfileInDB($ccName,$bAddress,$ccNumber,$eMonth,$eYear,$sAddress)
    {

        $sql = "INSERT INTO customer_profile
        (customer_id, shipping_address, credit_card_number, cc_holder_name, billing_address, expiration_date_year,expiration_date_month) 
        values (".$_SESSION["userid"].",'".$sAddress."','".$ccNumber."','".$ccName.
                                                        "','".$bAddress."','".$eYear."','".$eMonth."')";
        $query = $this->db->prepare($sql);
        $result = $query->execute();
        //printf($result);
        return $result;
     }

    public function getProfile($id)
    {
        $sql = "SELECT * FROM customer_profile WHERE profile_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        $queryReturn = $query->fetchAll();
        return $queryReturn;

    }

    public function deleteProfile( $profile_id )
    {
        $sql = "DELETE FROM customer_profile WHERE profile_id = $profile_id";
        $query = $this->db->prepare($sql);
        $result = $query->execute();
        return $result;
           
    }

    public function EditProfile( $dbPOST )
    {
        if( $dbPOST['useBAddress'] == '1' )
        {
            $sAddress = $dbPOST['billing_address'];
        }
        else
        {
             $sAddress = $dbPOST['shipping_address'];           
        }
        $result = $this->ValidateProfileParameters( $dbPOST );
        if( $result == '' )
        {
            
            $sql = "UPDATE customer_profile SET customer_id = :customer_id,".
                                         " shipping_address = :shipping_address,".
                                         " credit_card_number = :credit_card_number,".
                                         " cc_holder_name = :cc_holder_name,".
                                         " billing_address = :billing_address,".
                                         " expiration_date_year = :expiration_date_year,".
                                         " expiration_date_month = :expiration_date_month".
                                         " WHERE profile_id = :id";
                                         
            $par = array(   "id" => $dbPOST['profile_id'],
                            "customer_id" => $dbPOST['customer_id'],
                            "cc_holder_name" => $dbPOST['cc_holder_name'],
                            "shipping_address" =>$dbPOST['shipping_address'],
                            "credit_card_number" => $dbPOST['credit_card_number'],
                            "billing_address" => $dbPOST['billing_address'],
                            "expiration_date_year" => $dbPOST['expiration_date_year'],
                            "expiration_date_month" => $dbPOST['expiration_date_month'] );
                                        
            $query = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $query->execute( $par );
        }
        return $result;
           
    }

    

}
