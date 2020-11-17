<?php  

 class Auth {



      //fonctions qui qui utilises les propriétés de la classe

    public static function verify_email($email) {

      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
             return true;
      } else {
             return false;
    }

    }
    public static function verify_password($password) {

        $lenght = strlen($password);

        if ($lenght < 8) {
          echo "le mot de pass dois avoir 8 caratères au moins";
          return false;
        }

        for ($i=0; $i < $lenght; $i++) { 
          $lettre = $password[$i];
          echo $lettre;

          if ($lettre >= 'A'&& $lettre <= 'Z'){
            echo "mot de pass vérifié";
            return true; 
          }
           elseif ($lettre >= '0' && $lettre <= '9') {
              echo "mot de pass vérifié";
              return true ; 

          }

        }
        
        return false ;

    }

     public static function encript_password($password)
     {
         return password_hash($password, PASSWORD_DEFAULT);
     }



     public static function decript_password($password,$encrypted_Password)
     {
         if (password_verify($password, $encrypted_Password)) {
             echo "verifier";
             return true ;
         }
         else echo"non verifier";
         return false;
     }




     public static function sendMail($email, $username, $password){

		 ini_set('SMTP', "smtp.gmail.com");
		 ini_set('smtp_port', "587");
		 ini_set('sendmail_from', "slhenny30@gmail.com");  
			ini_set('display_errors', 'On');
         $headers = array(
				'MIME-Version' => '1.0',
				'Content-type' => 'text/html; charset=iso-8859-1',
    			'From' => "slhenny30@gmail.com",
    			'Reply-To' => "slhenny30@gmail.com"
			);
			
			$subject = 'Bienvenue sur Together!';
			
			$message = '
				<html>
					<head>
  						<title>Vos informations de connection</title>
					</head>
					<body>
  						<p>Here are the birthdays upcoming in August!</p>
  						<table>
    						<tr>
      						<th>Username</th><th>Password</th>
    						</tr>
    						<tr>
      						<td>"'.$username.'"</td><td>"'.$password.'"</td>
    						</tr>
    				
  						</table>
					</body>
				</html>
			';

         mail($email, $subject, $message, $headers);

         echo "l'email a été envoyé à ".$email." </br> subject : ".$subject."</br> message : ".$message."</br>";
         
         return true;
         

     }
 //fonctions qui interagissent avec la bas de données

     public static function verification_password($db,$table,$email)
     {

         $req = "SELECT  `password` FROM `".$table."` WHERE  `email` = '$email'";

         $resultat = $db->getDbserver()->query($req);

         $obj1 = $resultat->fetch_array();

         $mot =  $obj1[0];

         if ($mot) {
             echo "Authentification  reussi";
             return true;
         } else {
             echo "Echec de l'authenetification";
             return false;
         }

     }
    public static function register($db,$table,$username,$email,$password) {



          $verify_user = Auth::verify_user_exist($db->getDbserver(),$table,$username);

			var_dump($verify_user);

      if ( $verify_user == false ) {

           $req = "INSERT INTO `".$table."` (`username`,`email`,`password`) VALUES ('.$username.','.$email.','.$password.')";


        $callback =  Auth::callback($req,$db->getDbserver());

         return $callback;

         echo "Register Success";
                  
     } 
     else echo "erreur";

     return false;

   }
    public static  function login ($db,$table,$username,$password)
    {    

        //$ve = Auth::verify_email($email);
      $exist = Auth::verify_user_exist($db->getDbserver(),$table,$username);

         
      if ($exist == true) {
		  
		$req = "SELECT username, password FROM `".$table."` WHERE `username` = '".$username."' and `password` = '".$password."'";
		$resultat = $db->getDbserver()->query($req);
        
		if($resultat->num_rows == 1) {
			//echo "Login succeeded!";
			return true;
		} else {

			//echo "Login failed! Try again";
			return false;
		  
		}
 
      } 

    }

    public static function verify_user_exist($dbserver, $table, $username) {

       
	  $req = "SELECT COUNT(username) FROM `".$table."` WHERE `username` = '".$username."'";
      
      //var_dump($req);
      $resultat = $dbserver->query($req);
	  //var_dump($resultat->num_rows);
		
	  if($resultat->num_rows == 1) {
		  //echo "the user already exists";
		  return true;
	  }
      return false;
    }

   
    public static function callback ($query, $db) {
      
      $resultat =  $db->getDbserver()->query($query);
  
        if($resultat === true){

            //echo "User exist ";
            return $resultat;

        } else {
          
            echo "ERROR: Could not able to execute  " . $db->getDbserver()->error;
        }
      
       return false;

    }
    // fonctions statiques

    public static function generate_key() 
    {

      $key = uniqid();

      return $key;

    }
   public static  function generateStringCode(){
         $y = (String)getDate()["year"];
         $year = substr($y,2,4);
         $code = "C".$year;
         $specialChar = array("&","é","(","-","-","è","_","ç","à",")","=","+","@","°","}","]","^","ù","|","#","~","¤","$","£","*","µ","!","/",":",";",".",",","?",";");
         $minChar = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
         $majChar = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
         $code .= Auth::randString($majChar).Auth::randString($minChar).Auth::randString($minChar).Auth::randString($minChar).rand(0,9).rand(0,9).rand(0,9).Auth::randString($specialChar);
         return $code;
     }
     
     public static  function generatePassword(){
         $y = (String)getDate()["year"];
         $year = substr($y,2,4);
         $code = "C".$year;
         $specialChar = array("&","é","(","-","-","è","_","ç","à",")","=","+","@","°","}","]","^","ù","|","#","~","¤","$","£","*","µ","!","/",":",";",".",",","?",";");
         $minChar = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
         $majChar = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
         $code .= Auth::randString($minChar).Auth::randString($majChar).rand(0,9).rand(0,9).rand(0,9).Auth::randString($specialChar);
         return $code;
     }


    public  function randString($tab){
         return $tab[rand(0,count($tab)-1)];

     }

 }





?>
