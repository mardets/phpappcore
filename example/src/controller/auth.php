<?php
     
    class AuthController extends Controller {

		   public static function login() {
		   	$db = Util::getDb();
				$dbserver = $db->getDbserver();
				$username = $dbserver->real_escape_string($_POST['username']);
         	$password = $dbserver->real_escape_string($_POST['password']);
				
          	Auth::login($db, 'user', $username, $password);
			
				$profile = Controller::findOne($db->getDbserver(), 'profile_dashboard', 'username', $username);
				print_r($profile);
				$data['profile'] = $profile;
				return $data;
          }


		   function register() {
				$db = Util::getDb();
				
								
				if($db) {
					$username = Auth::generateStringCode();
					$password = Auth::generatePassword();
					$fname = $_POST['firstname'];
					$lname = $_POST['lastname'];					
					$fullname =  "$fname $lname";
					
					
					//array of user from form
					$date_user = new DateTime();
					$u_body = array('username' => $username, 'email' => $_POST['email'],
					 'password' => $password, 'token' => '', 'role' => 'client',
					 'created' => $date_user->format('Y-m-d H:i:s'), 'edited' => $date_user->format('Y-m-d H:i:s'));	
					
					//register the user
					Controller::save($db, 'user', 'username', $u_body);
					Auth::sendMail($email, $username, $password);
					
				}
		   }
		   
		   
		   
		   public static function update_password_get() {
				$db = Util::getDb();
				$message = '';
				$user = Controller::findOne($db->getDbserver(), 'user', 'email', $POST['email']);  
				$password = Auth::generateStringCode();
				
				if($user) {
					$user['password'] = $password;	
					Controller::update($db, 'user', 'username', $user['username'], $user);	
					$message = 'New user has been sent to your email';	
					Auth::sendMail($email, $username, $password);
				} else {
					$message = 'User doesnt exist!!';	
					return $message;			
				}
				
				
		   }
		   
		   public static function logout() {
				Storage::clear();
				header('Location: index.php');
	   		exit;			   
		   }

     }

?>
