<?php

class SignupModel
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
 /*
    public function getAllBooks()
    {
        $sql = "SELECT * FROM inventory";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
 */
    public function SubmitUser($first_name,$last_name,$email_address,$username,$password)
    {
		$first_name = strip_tags($first_name);
        $last_name = strip_tags($last_name);
        $email_address = strip_tags($email_address);
		$username = strip_tags($username);
        $password = strip_tags($password);
		
		
        $sql = "INSERT INTO customers (first_name, last_name, email_address,username,password)
				SELECT * FROM (SELECT :first_name as first_name,:last_name as last_name,:email_address as email_address,:username as username,:password as password) AS tmp
				WHERE NOT EXISTS (
				SELECT username FROM customers WHERE username = :username
				) LIMIT 1;
				";
		
        $query = $this->db->prepare($sql);
        $query->execute(array(':first_name' => $first_name, ':last_name' => $last_name, ':email_address' => $email_address, ':username' => $username, ':password' => $password));
		//$query->store_result();
		$count = $query->rowCount();
       // $colcount = $query->columnCount();
		
		//$rows = $query->num_rows;

			//echo $rows;
 		//printf($count);
		return $count;
      /*  return $query->fetchAll(); */

    }

	public function CheckUser($uname)
	{
	//console.log("Inside the function");
	$uname = strip_tags($uname);
	$sql="SELECT count(*) as count FROM customers where username=:uname";
	$query = $this->db->prepare($sql);
	
		 $query->execute(array(':uname' => $uname));
		 $count=$query->fetch()->count ;  
	 	if($count>0)
			{
			//console.log('Sucess');
			print "<span style=\"color:red;\">Username Not Available </span>";
			
			
			}
			else {
//console.log('Failure');


           
			print "<span style=\"color:green;\">Username is available </span>";
			
			}
	}

}
