<?php

class InventoryModel
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

    public function getAllBooks()
    {
        $sql = "SELECT * FROM inventory";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getBook($id)
    {
        $sql = "SELECT * FROM inventory WHERE item_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        $queryReturn = $query->fetchAll();
        return $queryReturn;

    }

    public function InsertBookInDB($id,$name,$descr,$price,$date,$category,$quantity)
    {
        $sql = "INSERT INTO inventory values ('".$id."','".$name."','".$descr."','".$price."','".$date."','".$category."','".$quantity."')";
        $query = $this->db->prepare($sql);
        $result = $query->execute();
        return $result;
     }

    public function getAllBooksSortByName()
    {
        $sql = "SELECT * FROM inventory ORDER BY item_name ASC";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getAllBooksSortByCategory()
    {
        $sql = "SELECT * FROM inventory ORDER BY category ASC";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getAllBooksSortByPrice()
    {
        $sql = "SELECT * FROM inventory ORDER BY price ASC";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function ValidateBookParameters( $dbPOST )
    {
        $result = '';
        $strArray = array( 'name', 'description' );
        $numericArray = array( 'price', 'quantity' );
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

        if( 'Select category' == $dbPOST['category'] )
        {
                $result = 'Category was not selected';
        }
        return $result;
    }
    
    public function getAllBooksSortBy($factor,$cat)
    {
        $sql = "SELECT * FROM inventory ORDER BY :factor ASC WHERE category = :cat ";
        $query = $this->db->prepare($sql);
        $query->execute(array(":factor" => $factor, ":cat" => $cat));
        return $query->fetchAll();
    }

    public function getCategories(){

        $sql = "SELECT DISTINCT(category) FROM inventory";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();

    }

    public function filterbycategory($cat){
        if($cat == 'all'){
            $sql = "SELECT * FROM inventory ";
            $query = $this->db->prepare($sql);
            $query->execute();

        }
        else{
            $sql = "SELECT * FROM inventory WHERE category = :cat";
            $query = $this->db->prepare($sql);
            $query->execute(array(':cat' => $cat));
        }
        
        return $query->fetchAll();

    }

    public function CreateBook( $dbPOST )
    {
        $result = $this->ValidateBookParameters( $dbPOST );
        if( $result == '' )
        {
            date_default_timezone_set('America/New_York');
            $dateToday = date("d-m-Y");
            $newDate = date("Y-m-d", strtotime($dateToday));
            
            $dbresult = $this->InsertBookInDB(   0, $dbPOST['name'],$dbPOST['description'],
                                                 (int)$dbPOST['price'],$newDate,$dbPOST['category'],
                                                 (float)$dbPOST['quantity']);
                                        
        }
        return $result;      
    }

    public function EditBook( $dbPOST )
    {
        $result = $this->ValidateBookParameters( $dbPOST );
        if( $result == '' )
        {
            date_default_timezone_set('America/New_York');
            $dateToday = date("d-m-Y");
            $newDate = date("Y-m-d", strtotime($dateToday));
            $itemname = $dbPOST['name'];
            $description= $dbPOST['description'];
            $quantity = (int)$dbPOST['quantity'];
            $price = (float)$dbPOST['price'];
            $category = $dbPOST['category'];
            $itemid = (int)$dbPOST['item_id'];
            
            $sql = "UPDATE inventory SET item_name = :name,". 
                                         " item_description = :description,".
                                         " quantity_on_hand = :quantity,".
                                         " price = :price,".
                                         " date_added = :newDate,".
                                         " category = :category".
                                         " WHERE item_id = :id";
                                         
            $par = array(   "id" => $itemid,
                            "name" => $itemname,
                            "description" =>$description,
                            "quantity" => $quantity,
                            "price" => $price,
                            "newDate" => $newDate,
                            "category" => $category );
                                        
            $query = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $query->execute( $par );
        }
        return $result;
           
    }

    public function searchByName($searchtext){
        $sql = "SELECT * FROM inventory WHERE item_name LIKE '%".$searchtext."%'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function DeleteBook( $item_id )
    {
        
        $reduceCount = $this->GetNUmberOfBooksInCart($item_id);
        $sql = "UPDATE inventory SET quantity_on_hand=:reduce_count WHERE item_id = :item_id";
        $query = $this->db->prepare($sql);
        $result = $query->execute(array(':item_id'=>$item_id, ':reduce_count'=>$reduceCount));
        return $result;
           
    }
    
    function GetNUmberOfBooksInCart($id)
    {
        $sql = "SELECT * FROM shopping_cart WHERE item_id = :id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':id' => $id));
        $queryReturn = $query->fetchAll();

        $total = 0;
        foreach( $queryReturn as $cartItem )
        {
            $total += $cartItem->quantity; 
        }
        return $total;

    }

}
