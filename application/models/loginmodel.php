<?php

class LoginModel
{

  /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
   // public $errors = array();
   // public $error="";
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
	 
	 
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
	
	public function Login($username,$password)
	{
		
	
	
	
	// check login form contents
        if (empty($_POST['username'])) {
            $this->errors[] = "Username field was empty.";
        } elseif (empty($_POST['password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['username']) && !empty($_POST['password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                 $this->errors[] = $this->db_connection->error;
				//echo db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $user_name = $this->db_connection->real_escape_string($_POST['username']);

                // database query, getting all the info of the selected user (allows login via email address in the
                // username field)
                $sql = "SELECT username, email_address, password
                        FROM customers
                        WHERE username = '" . $username . "' AND password = '" . $password . "';";
						//echo $sql;
                $result_of_login_check = $this->db_connection->query($sql);

                // if this user exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();
				//	echo $result_of_login_check->num_rows;
                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that user's password
                    if ($_POST['password']==$result_row->password) {
                  // echo $result_row->password;
					$pass=$result_row->password;
					  
					session_start();
					
                        // write user data into PHP SESSION (a file on your server)
						//echo session_id();
                        $_SESSION['username'] = $result_row->username;
                        $_SESSION['email_address'] = $result_row->email_address;
                        $_SESSION['login'] = 1;

						return "1";
                    } else {
					$_SESSION['login']=0;
       ////// $error=   "Wrong password. Try again.";
				////	return $error;
          return -1;
					//echo 'wrong password';                    
         
                    }
                } else {
                    $error= "This user does not exist.";
          ///  return $error;
                 
              return -1;
                 // echo 'password doesnt exist';
				  
                }
            } else {
              return -1;
           //    $error= 'DB connection error';
			   //return $error;
         //$this->$error = "Database connection problem.";
            }
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
 
    public function SubmitUser($first_name,$last_name,$email_address,$username,$password)
    {
		$first_name = strip_tags($first_name);
        $last_name = strip_tags($last_name);
        $email_address = strip_tags($email_address);
		$username = strip_tags($username);
        $password = strip_tags($password);
		
		
        $sql = "INSERT INTO customers (first_name, last_name, email_address,username,password)
				SELECT * FROM (SELECT :first_name,:last_name ,:email_address ,:username,:password) AS tmp
				WHERE NOT EXISTS (
				SELECT username FROM customers WHERE username = :username
				) LIMIT 1;
				";
		
        $query = $this->db->prepare($sql);
        $query->execute(array(':first_name' => $first_name, ':last_name' => $last_name, ':email_address' => $email_address, ':username' => $username, ':password' => $password));
      /*  return $query->fetchAll(); 

    }*/


}
