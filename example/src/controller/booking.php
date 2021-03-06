<?php

     

     class BookingController extends Controller {

			public static function createBooking() {
				//get db server
				$db = Util::getDb();
				$req_uri = $_SERVER['REQUEST_URI'];
				$username = substr(strstr($req_uri, '?'), 6, 5); 
				print_r($username);
				$immat = substr(strstr($req_uri, '?'), 28);
				print_r($immat); 

				$status = 'PENDING';

				$date_profile = new DateTime();
				$profile = Controller::findOne($db->getDbserver(), 'profile', 'userId', $username);
				$car = Controller::findOne($db->getDbserver(), 'car', 'immatriculation', $immat);
				$location = Controller::findOne($db->getDbserver(), 'location', 'car_id', $car['car_id']);

				$new_location = $location;
				$new_location['days'] = $_POST['days'];
				$new_location['type'] = $_POST['type'];
				$new_location['itinerary'] = $_POST['itinerary'];
				
				$booking = array('pro_id' => $profile['pro_id'], 'locat_id' => $location['locat_id'], 'status'=> $status, 'created' => $date_profile->format('Y-m-d H:i:s'),'edited' => $date_profile->format('Y-m-d H:i:s'));
				Controller::update($db, 'location', 'locat_id', $new_location['locat_id'], $new_location);
				Controller::workflow_request($db ,'booking' ,'', '',$booking,'SENT' );
				
				
			}
			
			public static function accept() {
				//get db server
				$db = Util::getDb();
				$req_uri = $_SERVER['REQUEST_URI'];
				$username = substr(strstr($req_uri, '?'), 6, 5); 
				print_r($username);
				$immat = substr(strstr($req_uri, '?'), 28);
				print_r($immat); 

				$status = 'PENDING';

				$date_profile = new DateTime();
				$profile = Controller::findOne($db->getDbserver(), 'profile', 'userId', $username);
				$car = Controller::findOne($db->getDbserver(), 'car', 'immatriculation', $immat);
				$location = Controller::findOne($db->getDbserver(), 'location', 'car_id', $car['car_id']);
				$booking = Controller::findOne($db->getDbserver(), 'booking', 'locat_id', $location['locat_id']);
				workflow_request($db ,'booking' ,'', '',$booking,'ACCEPTED' );
				Auth::sendMail($_POST['email'], $username, $password);	
			}

			public static function reject() {
				//get db server
				$db = Util::getDb();
				$req_uri = $_SERVER['REQUEST_URI'];
				$username = substr(strstr($req_uri, '?'), 6, 5); 
				print_r($username);
				$immat = substr(strstr($req_uri, '?'), 28);
				print_r($immat); 

				$status = 'PENDING';

				$date_profile = new DateTime();
				$profile = Controller::findOne($db->getDbserver(), 'profile', 'userId', $username);
				$car = Controller::findOne($db->getDbserver(), 'car', 'immatriculation', $immat);
				$location = Controller::findOne($db->getDbserver(), 'location', 'car_id', $car['car_id']);
				$booking = Controller::findOne($db->getDbserver(), 'booking', 'locat_id', $location['locat_id']);
				workflow_request($db ,'booking' ,'', '',$booking,'REJECTED' );
				Auth::sendMail($_POST['email'], $username, $password);	
			}

     }

?>
