<?php

$con=mysql_connect("127.0.0.1","root","");


if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(!mysql_select_db('dmn')){
	echo'error database';
}

if(isset($_POST['name'])&&isset($_POST['location'])&&isset($_POST['pincode'])&&isset($_POST['lat'])&&isset($_POST['lon'])){
	$name=$_POST['name'];
	$user=$_POST['location'];
	$pass=$_POST['pincode'];
	$id=$_POST['id'];
	$lat=$_POST['lat'];
	$lon=$_POST['lon'];
         if(!empty($name)&&!empty($user)&&!empty($pass)){
				
				$query="SELECT `id` FROM `check` WHERE `id`='".mysql_real_escape_string($id)."'";
				if($queryrun=mysql_query($query)){
				if(mysql_num_rows($queryrun)>=1){
				echo'CANNOT EDIT ALREADY EXIST';
				}

				else{
				
				$iquery="INSERT INTO `check` VALUES(".mysql_real_escape_string($id).",'".mysql_real_escape_string($name)."','".mysql_real_escape_string($user)."',
					'".mysql_real_escape_string($pass)."','".mysql_real_escape_string($lat)."','".mysql_real_escape_string($lon)."')";
				if(mysql_query($iquery)){
				echo $id;
				                         }else{echo mysql_error();}
				       }
				  
				
				
				}else{echo mysql_error();}   
				
																					
				
																				}


																				 @mysql_close($con);
																				 	}												 



?>






