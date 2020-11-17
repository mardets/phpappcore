<?php


	class DashboardData {

		public static function queries($username) {
				
				$db = Util::getDb();
				$dbserver = $db->getDbserver();
				
				$profile = Controller::findOne($dbserver, 'profile_dashboard', 'username', $username);
				print_r($profile);
				$profiles = Controller::find($db, 'profile');
				$cars = Controller::find($db, 'car');
				$bookings = Controller::find($db, 'booking');
				$data['profile'] = $profile;
				$data['profiles'] = $profiles;
				$data['cars'] = $cars;
				$data['bookings'] = $bookings;
				return $data;
		}

		public static function queriesOption($username, $option) {
				
				$db = Util::getDb();
				$dbserver = $db->getDbserver();
				
				$profile = Controller::findOne($dbserver, 'profile_dashboard', 'username', $username);
				print_r($profile);
				$car = Controller::findOne($dbserver, 'car', 'immatriculation', $option);
				$location = Controller::findOne($dbserver, 'location', 'car_id', $car['car_id']);
				$booking = Controller::findOne($dbserver, 'booking', 'bid', $option);
				$profiles = Controller::find($db, 'profile');
				$cars = Controller::find($db, 'car');
				$data['profile'] = $profile;
				$data['profiles'] = $profiles;
				$data['cars'] = $cars;
				$data['car'] = $car;
				$data['location'] = $location;
				$data['booking'] = $booking;
				return $data;
		}	
	
	}



?>
