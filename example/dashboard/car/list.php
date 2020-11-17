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
print_r($role);
	$username = $data['profile']['username'];
	$firstname = $profile['firstname'];
	$lastname = $profile['lastname'];
	$fullname = "$firstname $lastname";
	$cars = $data['cars'];
	//print_r($cars);
  ?>
  <body>
    <table>
	<thead>
        <tr>
	  <th>#</th>
          <th>Name</th>
          <th>Brand</th>
          <th>Model</th>
          <th>Year</th>
	  <th>Immatriculation</th>
	  <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($cars as $key=>$value): ?>
        	 <tr>
        	   <td><?php echo $value['0']; ?></td>
          		<td><?php echo $value['2']; ?></td>
          		<td><?php echo $value['3']; ?></td>             
          		<td><?php echo $value['4']; ?></td>
          		<td><?php echo $value['5']; ?></td>
          		<td><?php echo $value['6']; ?></td>
			<td><a href=<?php $imm = $value[6]; echo "redirect.php?link=car/car.php&user=$username&immatriculation=$imm"; ?>>View</a> | <a href=<?php $imm = $value[6]; echo "redirect.php?link=car/update.php&user=$username&immatriculation=$imm"; ?>>Edit</a> | <?php   if(strcmp($role, 'client') === 0): ?> <a href=<?php $imm = $value[6]; echo "redirect.php?link=car/delete.php&user=$username&immatriculation=$imm"; ?>>Delete</a><?php endif; ?></td>
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
