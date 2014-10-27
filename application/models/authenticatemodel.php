<?php

class AuthenticateModel
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
