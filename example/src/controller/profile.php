<?php

     class ProfileController extends Controller {

			public static function upload() {
				//get db server
				$db = Util::getDb();
				
				$filename = $_POST['filename'];

				$req_uri = $_SERVER['REQUEST_URI'];
				$userid = substr(strstr($req_uri, '?'), 6);
				$profile = Controller::findOne($db->getDbserver(), 'profile', 'userid', $username);
		 		$update_profile = $profile;

				Controller::update($db, 'profile', 'userId', $username, $new_profile);
			}

			public static function updateProfile() {
				//get db server
				$db = Util::getDb();
				
				$username = $_POST['userid'];
				$profile = Controller::findOne($db->getDbserver(), 'profile', 'userId', $username);
				
				$fname = $_POST['firstname'];
				$lname = $_POST['lastname'];					
				$fullname = "$fname $lname";
				$date_profile = new DateTime();
				$new_profile = $profile;
				$new_profile['firstname'] = $_POST['firstname'];
				$new_profile['lastname'] = $_POST['lastname'];
				$new_profile['fullname'] = "$fname $lname";
				$new_profile['phone'] = $_POST['phone'];
				$new_profile['gender'] = $_POST['gender'];
				$new_profile['city'] = $_POST['city'];
				$new_profile['address'] = $_POST['address'];
				$new_profile['cni_number'] = $_POST['cni_number'];
				$new_profile['cni_issue_date'] = $_POST['cni_issue_date'];
				$new_profile['cni_expiry_date'] = $_POST['cni_expiry_date'];
				$new_profile['birthday'] = $_POST['birthday'];
				$new_profile['edited'] = $date_profile->format('Y-m-d H:i:s');
				$new_profile['created'] = $date_profile->format('Y-m-d H:i:s');
					
				$userid = $profile['userId'];
					 
				Controller::update($db, 'profile', 'userId', $username, $new_profile);
				
				
			}

     }

?>
