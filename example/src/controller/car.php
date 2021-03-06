<?php

     class CarController extends Controller {

			public static function upload() {
				//get db server
				$db = Util::getDb();
				
				$files = $_POST['pictures'];

				$req_uri = $_SERVER['REQUEST_URI'];
				$userid = substr(strstr($req_uri, '?'), 6);
				$profile = Controller::findOne($db->getDbserver(), 'profile', 'userId', $userid);
				$car = Controller::findOne($db->getDbserver(), 'car', 'pro_id', $profile['pro_id']);

				$new_car = $car;
				$new_car['pictures'] = $files;
				Controller::update($db, 'car', 'pro_id', $$car['pro_id'], $new_car);
			}

			public static function updateCar() {
				//get db server
				$db = Util::getDb();
				
				$req_uri = $_SERVER['REQUEST_URI'];
				$username = substr(strstr($req_uri, '?'), 6, 5); 
				print_r($username);
				$immat = substr(strstr($req_uri, '?'), 28);
				print_r($immat); 
				$profile = Controller::findOne($db->getDbserver(), 'profile', 'userId', $username);
				$car = Controller::findOne($db->getDbserver(), 'car', 'immatriculation', $immat);
				
				
				$date_profile = new DateTime();
				$new_car = $car;
				$new_car['car_name'] = $_POST['car_name'];
				$new_car['brand'] = $_POST['brand'];
				$new_car['model'] = $_POST['model'];
				$new_car['year'] = $_POST['year'];
				$new_car['immatriculation'] = $_POST['immatriculation'];
				$new_car['pictures'] = 'null';
				$new_car['type_car'] = $_POST['type_car'];
				$new_car['seats'] = $_POST['seats'];
				$new_car['doors'] = $_POST['doors'];
				$new_car['location_price'] = $_POST['location_price'];

				$new_car['edited'] = $date_profile->format('Y-m-d H:i:s');
				$new_car['created'] = $date_profile->format('Y-m-d H:i:s');
					 
				Controller::update($db, 'car', 'immatriculation', $new_car['immatriculation'], $new_car);
					 

					
					/*$uri = 'Location: http://localhost:8083/togetherup/dashboard/dashboard.php?user=';
					$url = "$uri$userid";*/
				
				
			}

			public static function createCar() {
				//get db server
				$db = Util::getDb();
				
				$req_uri = $_SERVER['REQUEST_URI'];
				$username = substr(strstr($req_uri, '?'), 6);
				$profile = Controller::findOne($db->getDbserver(), 'profile', 'userId', $username);
				
				
				$date_profile = new DateTime();
				$new_car = array();
				$new_car['pro_id'] = $profile['pro_id'];
				$new_car['car_name'] = $_POST['car_name'];
				$new_car['brand'] = $_POST['brand'];
				$new_car['model'] = $_POST['model'];
				$new_car['year'] = $_POST['year'];
				$new_car['immatriculation'] = $_POST['immatriculation'];
				$new_car['pictures'] = 'null';
				$new_car['type_car'] = $_POST['type_car'];
				$new_car['seats'] = $_POST['seats'];
				$new_car['doors'] = $_POST['doors'];
				$new_car['location_price'] = $_POST['location_price'];
				$new_car['edited'] = $date_profile->format('Y-m-d H:i:s');
				$new_car['created'] = $date_profile->format('Y-m-d H:i:s');
					 
				Controller::save($db, 'car', '', $new_car);
					
					/*$uri = 'Location: http://localhost:8083/location/dashboard/dashboard.php?user=';
					$url = "$uri$userid";*/
				
				
			}

			public static function deleteCar() {
				//get db server
				$db = Util::getDb();
				
				$req_uri = $_SERVER['REQUEST_URI'];
				$username = substr(strstr($req_uri, '?'), 6, 5); 
				print_r($username);
				$immat = substr(strstr($req_uri, '?'), 28);
				print_r($immat); 
				$profile = Controller::findOne($db->getDbserver(), 'profile', 'userId', $username);
				$car = Controller::delete($db->getDbserver(), 'car', 'immatriculation', $immat);
				
				
				
			}

			public static function createLocation() {
				//get db server
				$db = Util::getDb();
				$req_uri = $_SERVER['REQUEST_URI'];
				$username = substr(strstr($req_uri, '?'), 6);
				$profile = Controller::findOne($db->getDbserver(), 'profile', 'userId', $username);
				$locatio = Controller::findOne($db->getDbserver(), 'car', 'pro_id', $profile['pro_id']);
				
				
				$date_profile = new DateTime();
				$new_car = $car;
				$new_car['car_name'] = $_POST['car_name'];
				$new_car['brand'] = $_POST['brand'];
				$new_car['model'] = $_POST['model'];
				$new_car['year'] = $_POST['year'];
				$new_car['immatriculation'] = $_POST['immatriculation'];
				$new_car['car_type'] = $_POST['car_type'];
				$new_car['seats'] = $_POST['seats'];
				$new_car['doors'] = $_POST['doors'];
				$new_car['location_price'] = $_POST['location_price'];
				$new_car['edited'] = $date_profile->format('Y-m-d H:i:s');
				$new_car['created'] = $date_profile->format('Y-m-d H:i:s');
					 
				Controller::save($db, 'car', '', $new_car);
					
					$uri = 'Location: http://localhost:8083/togetherup/dashboard/dashboard.php?user=';
					$url = "$uri$userid";
				
				
			}

     }

?>
