<!DOCTYPE html>
<html>
  <head>
    
  </head>

  <?php 
	
	require("../../appcore/config/dbconfig.php");
	require("../../appcore/config/storage.php");
	require("../../appcore/config/i18n.php");
	require("../../appcore/auth/auth.php");
    require("../../appcore/controller/controller.php");
    require("../../src/util/util.php");
	require('../../src/controller/auth.php');
	require('../dashboard-data.php');
	
	$lang = Util::evalUrl($_SERVER['REQUEST_URI']);
	
	$lang_fr = '&lang=fr';
	$lang_en = '&lang=en';
	$req_uri = $_SERVER['REQUEST_URI'];
	$french = "$req_uri$lang_fr";
	$eng = "$req_uri$lang_en";

	
	$param = substr(strstr($req_uri, '?'), 6); 
	$data = DashboardData::queries($param);

	$profile = $data['profile'];
	//print_r($data['profile']['role']);
	$username = $data['profile']['username'];
	$firstname = $profile['firstname'];
	$lastname = $profile['lastname'];
	$fullname = "$firstname $lastname";
	
	if($profile['role'] == 'user') {
		header('Location: dashboard-client.php');
	   exit;	
	}


  ?>
  <body>
    <form method="post" action=<?php echo "update.php?user=$username" ?>>
 	<div id="profile">
	   <h3>User Profile</h3>
           <input type="text" name="firstname" placeholder="Firstname" value=<?php echo $firstname ?> />
	   <input type="text" name="lastname" placeholder="Lastname" value=<?php echo $lastname ?> />
	   <input type="date" name="birthday" placeholder="Date of Birth" value=<?php echo $data['profile']['birthday'] ?> />
           <input type="text" name="userid" placeholder="Username" value=<?php echo $data['profile']['userId'] ?> />
	   <input type="text" name="cni_number" placeholder="CnI Identification" value=<?php echo $data['profile']['cni_number'] ?> />
	   <input type="date" name="cni_issue_date" placeholder="CnI Issue Date" value=<?php echo $data['profile']['cni_issue_date'] ?> />	
	   <input type="date" name="cni_expiry_date" placeholder="CnI Expiry Date" value=<?php echo $data['profile']['cni_expiry_date'] ?> />
	   <input type="text" name="gender" placeholder="Gender" value=<?php echo $data['profile']['gender'] ?> />
	   <input type="text" name="address" placeholder="Address" value=<?php echo $data['profile']['address'] ?> />
	   <input type="text" name="phone" placeholder="Phone" value=<?php echo $data['profile']['phone'] ?> />
	   <input type="text" name="city" placeholder="City" value=<?php echo $data['profile']['city'] ?> />
	</div>
	<input type="submit" value="Update"/>
    </form>
    <hr>
    <form method="post" action=<?php echo "upload.php?user=$username" ?>>
	<input type="file" value="Upload">
	<input type="submit" value="Upload"/>
    </form>
	
    </form>
    <hr>
	<a href=<?php echo "redirect.php?link=dashboard/dashboard.php&user=$username" ?>>Dashboard</a> |
	<a href=<?php echo "redirect.php?link=car/list.php&user=$username" ?>>List of Cars</a> |
	<a href=<?php echo "redirect.php?link=booking/list.php&user=$username" ?>>List of Bookings</a>
  </body>
</html>
