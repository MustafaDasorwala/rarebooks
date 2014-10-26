<?php

/**
 * Class Songs
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Login extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/songs/index
     */
    public function index()
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Inventory, using the method index().';
     // if ((isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	 // echo "Login value is " . $_SESSION["login"]; }
	 // else
	 // {
	 // echo "Login is empty";
	 // }
	 // if ((isset($_session['login']) && $_session['login'] == ''))
	  //{
	  //session_destroy();
		//}
        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $inventory_model = $this->loadModel('loginmodel');
        //$inventory = $inventory_model->getAllBooks();

        // load another model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        //$stats_model = $this->loadModel('StatsModel');
        //$amount_of_books = $stats_model->getAmountOfBooks();

        // load views. within the views we can echo out $songs and $amount_of_songs easily
        require 'application/views/_templates/header.php';
        require 'application/views/login/index.php';
        require 'application/views/_templates/footer.php';
    }

   /* public function UserDetails($first_name,$last_name,$email_address,$username,$password)
    {
        $inventory_model = $this->loadModel('signupmodel');
        $newuser = $inventory_model->SubmitUser($first_name,$last_name,$email_address,$username,$password);
        require 'application/views/_templates/header.php';
        require 'application/views/inventory/signup.php';
        require 'application/views/_templates/footer.php';
    } */

	public function Logout()
	{
	session_start();
	session_destroy();
	 header('location: ' . URL . 'inventory/index');
	
	}
	
	   public function Loginuser()
    {
	
	 if (isset($_SESSION["login"])&& $_SESSION["login"]!="")
	 {
	 session_start();
	 session_unset();
	 }
	 
		    // if we have POST data to create a new song entry
        if (isset($_POST["submit_login_user"])) {
            // load model, perform an action on the model
            $signup_model = $this->loadModel('loginmodel');
          $response=  $signup_model->Login($_POST["username"], $_POST["password"]);
			//$error=$response->$error;
            // if($signup_model->$error!="")
   //          {
   //          $errors=$signup_model->$error;
           //return $response;
        }

			if (isset($_SESSION["login"])&& $_SESSION["login"]!="" && $_SESSION["login"]=="1"  ) {
			
			 header('location: ' . URL . 'inventory/index');
           //  return $response;
		   
			}
	       else
		   {
             header('location: ' . URL . 'login/index?success=0');
          // return $response;
		   
       // return $signup_model;
           //return $signup_model->$error;
           //"<span style=\"color:red;\">Invalid UserName or Password. Please Try Again </span>";
		  // header('location: ' . URL . 'login/index');
		   }
		   
			// session_start();
			
			// $_SESSION['login'] = "1";
			
			 //
        }

        // where to go after song has been added

            public function isUserLoggedIn()
    {
        if (isset($_SESSION['login']) AND $_SESSION['login'] == 1) {
            return true;
        }
        // default return
        return false;
    }
       
    }
	

    /**
     * ACTION: addSong
     * This method handles what happens when you move to http://yourproject/songs/addsong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a song" form on songs/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
  /*  public function addSong()
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Songs, using the method addSong().';

        // if we have POST data to create a new song entry
        if (isset($_POST["submit_add_song"])) {
            // load model, perform an action on the model
            $songs_model = $this->loadModel('SongsModel');
            $songs_model->addSong($_POST["artist"], $_POST["track"],  $_POST["link"]);
        }

        // where to go after song has been added
        header('location: ' . URL . 'songs/index');
    }*/

    /**
     * ACTION: deleteSong
     * This method handles what happens when you move to http://yourproject/songs/deletesong
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a song" button on songs/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to songs/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $song_id Id of the to-delete song
     */
  /*  public function deleteSong($song_id)
    {
        // simple message to show where you are
        echo 'Message from Controller: You are in the Controller: Songs, using the method deleteSong().';

        // if we have an id of a song that should be deleted
        if (isset($song_id)) {
            // load model, perform an action on the model
            $songs_model = $this->loadModel('SongsModel');
            $songs_model->deleteSong($song_id);
        }

        // where to go after song has been deleted
        header('location: ' . URL . 'songs/index');
    }*/
