<?php



 class Dbconfig
 {

 	private $hostname;  
	private $password;  
	private $dbname; 
 	private $username;
	private $port;
 	private $dbserver;


 	function __construct() {
        print " \n";
    }

    public function setUsername($username){  
    $this->username = $username;  
	  }  
	    
	  public function getUsername() {  
	    return $this->username;  
	  }  


	  public function setPassword($password){
	     $this->password = $password;
	  }

	  public function getPassword() {
	    return $this->password;
	  }

	public function setPort($port){
	     $this->port = $port;
	  }

	  public function getPort() {
	    return $this->port;
	  }
	
	  public function setDbname($dbname){  
      $this->dbname = $dbname;  
    }  
      
    public function getDbname() {  
      return $this->dbname;  
    }  



    public function setHostname($hostname){
       $this->hostname = $hostname;
    }

    public function getHostname() {
      return $this->hostname;
    }


    public function setDbserver($dbserver)
    {
      $this->dbserver = $dbserver;
    }

    public function getDbserver()
    {
      return $this->dbserver;
    }

   	public static function getConnection($server , $dbconfig){

   		switch ($server) {
   			case "mysql":

        
   				 $dbconfig->setDbserver(new mysqli( $dbconfig->getHostname(), $dbconfig->getUsername() ,$dbconfig->getPassword(),$dbconfig->getDbname(),$dbconfig->getPort()));
          //echo "Connexion reussi!!! </br>";
   				if($server === false){
  			    	die("ERROR: Could not connect. " . $dbserver->connect_error);
  				}
  			 break;
 
   		}


   	}

	
 }




?>
