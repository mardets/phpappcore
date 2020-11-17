<?php
 
	class Controller
	{
		
		
		public static function save($db,$table, $pkey_field, $data)
		{

			 $resShow = array();
			 $req = " INSERT INTO $table (";
			 $resShow = Controller::showColumn($db,$table,$pkey_field);

			print_r($resShow);
			foreach ($resShow as $key => $value) {
				$req .= $value.",";
			}

			$q  =  substr($req, 0, -1);
			$q .=  ") values( ";

			var_dump($data);
			// print_r($Tab);

			foreach ($data as $key => $value) {
				echo "VALUE ======= '".$value."'";
			 	$q .= "'".$value."',";
			 } 

			 $query = substr($q, 0,-1);
			 $query .= ")";
			 var_dump($query);
			 $res = $db->getDbserver()->query($query);
			//$res->close();
			 var_dump($res);
		}


		public static function showColumn($db,$table,$pkey_field)
		{
			$dbserver = $db->getDbserver();
			$req = "SHOW COLUMNS FROM `".$table."`";
			$res = $dbserver->query($req);
			var_dump($res->num_rows);
			$tab =  array();
 			$count = 0;
			

			while ($column = $res->fetch_array()) {
				array_push($tab, $column[0]);	
			}
			
			if(strcmp($pkey_field, 'username') !== 0) {
				array_shift($tab);
			} 
			echo "The tabbbbbbbbbbbbbbbbbbbb";
			print_r($tab);
			return $tab;
 			
		}
		

		public static function findOne($dbserver,$table,$field, $predicat){

			$req = "SELECT * FROM  $table  WHERE `".$field."`= '".$predicat."'";
			$res = $dbserver->query($req);
			$row = $res->fetch_array();
			return $row;
			
		}

		public static function update($db,$table, $pkey_field, $predicat, $obj){
			$dbserver = $db->getDbserver();
			$resShow = array();
			 $req = "UPDATE $table SET ";
			 $resShow = Controller::showColumn($db, $table, $pkey_field);
			foreach($resShow as $key => $value) {
				foreach($obj as $k => $val) {
					if (strcmp($k, $value) === 0) {
						$req .= "`".$value."`". "=". "'".$val."'".",";
					}					
				}				
			}
			$q  =  substr($req, 0, -1);
			$q .=  " WHERE $pkey_field = '".$predicat."' ";
			echo $q;
			$res = $dbserver->query($q);
			var_dump($res);
			//$res->close();
		}

		public static function delete ($dbserver,$table, $field, $predicat){

			$req = "DELETE FROM `".$table."` WHERE `".$field."`= '".$predicat."'";
			echo $req;
			$res = $dbserver->query($req);
			var_dump($res);

		}

		public static function find ($db,$table){

			 $req = " SELECT * FROM `".$table."`";
			 $req = $db->getDbserver()->query($req);
			 $rows = $req->fetch_All();

					
			return $rows;

		}
		
		public static function rowCount ($dbserver,$table){

			 $req = " SELECT * FROM $table WHERE 1 ";
			 $req1 = $dbserver->query($req);
			 $rows = $req1->fetch_All();

			  

		   return count($rows);

			

		}

		public static function filter($db,$table,$obj){
			
		     $resShow = array();
			 $req = " Select * from `".$table."` where (";
			 $resShow = Controller::showColumn($db, $table, '');


			foreach ($resShow as $value) {
					    $req .=   " `".$value."`". " like ". "('%".$obj ."%') "."or";
					}

			$q  =  substr($req, 0, -2);

			$q .= ")";

			$res = $db->getDbserver()->query($q); 

			$result = $res->fetch_array();
			
			return $result;			
		}
		
		public static function workflow_request($db ,$table ,$field, $predicat,$obj, $status ){

            if($status == "SENT") {
                try {
                   Controller::save($db, $table, '', $obj);
                    echo "success";
                    return true;
                } catch (Exception $e) {
                    echo $e->getMessage();
                    return false;
                }
            }elseif($status == "REJECTED"){
                try{
                    Controller::delete($db->getDbserver(),$table,$field, $predicat);
                    echo "success";
                    return true;
                }catch (Exception $e){
                    echo $e->getMessage();
                    return false;
                }
            }else{
                try{

                    Controller::update($db,$table,$field,$predicat,$obj);
                    echo "success";
                    return true;
                }catch (Exception $e){
                    echo $e->getMessage();
                    return false;
                }
            }
        }
		
		public static function uploadMultiple($dir) {
			foreach ($_FILES["pictures"]["error"] as $key => $error) {
				if ($error == UPLOAD_ERR_OK) {
					$tmp_name = $_FILES["pictures"]["tmp_name"][$key];
					// basename() may prevent filesystem traversal attacks;
					// further validation/sanitation of the filename may be appropriate
					$name = basename($_FILES["pictures"]["name"][$key]);
					move_uploaded_file($tmp_name, "$dir/$name");
				}
			}
		}
		
		public static function upload() {
			$emplacement  = "/assets/img";

	      $file = $emplacement.basename($_FILES["file"]["name"]);

			if (isset($_POST["submit"])) {
				$check = getimagesize($_FILES["file"]["tmp_name"]);
				if ($check = false) {
					echo "File is an image -".check["mine"].".";
					$uploadok = 1;
				} else {
					echo "File is not an image";
					$uploadok = 0;
				}
			}

			if (move_uploaded_file($_FILES["file"]["name"], $file)) {
				echo "the file".basename($_FILES["file"]["name"]." has uploaded");
			} else {
				echo " Error the file has not uploaded try again";
			}	
			return basename($_FILES["file"]["name"]);
		}
		
		public static function render($uri, $id) {
			$url = "$uri$id";
			header($url);
			exit;
		}



	}

?>
