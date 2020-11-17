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
	//print_r($data['profile']['role_name']);
	$role = $profile['role'];
	$username = $data['profile']['username'];
	$firstname = $profile['firstname'];
	$lastname = $profile['lastname'];
	$fullname = "$firstname $lastname";
	//$car = $data['car'];
	//print_r($car);
	//$location = $data['location'];
	$bookings = $data['bookings'];
	//print_r($location);
	print_r($bookings);
  ?>
  <body>
    <table>
	<thead>
        <tr>
	  <th>#</th>
          <th>Status</th>
	  <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($bookings as $key=>$value): ?>
        	 <tr>
        	   <td><?php echo $value['0']; ?></td>
          		<td><?php echo $value['3']; ?></td>
			<td><a href=<?php $bid = $value[0]; echo "redirect.php?link=booking/booking.php&user=$username&statubookingid=$bid"; ?>>View</a> | <a href=<?php $bid = $value[0]; echo "redirect.php?link=booking/accept.php&user=$username&statubookingid=$bid"; ?>>ACCEPT</a> | <?php   if(strcmp($role, 'client') === 0): ?> <a href=<?php $bid = $value[0]; echo "redirect.php?link=booking/reject.php&user=$username&statubookingid=$bid"; ?>>REJECT</a><?php endif; ?></td>
        	</tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <hr>
	<a href=<?php echo "redirect.php?link=dashboard/dashboard.php&user=$username" ?>>Dashboard</a> |
	<a href=<?php echo "redirect.php?link=car/new.php&user=$username" ?>>New Car</a> |
	<a href=<?php echo "redirect.php?link=booking/list.php&user=$username" ?>>List of Bookings</a>
  </body>
</html>
