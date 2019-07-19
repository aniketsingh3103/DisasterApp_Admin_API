<?php

$con=mysql_connect("127.0.0.1","root","");


if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(!mysql_select_db('dmn')){
	echo'error database';
}

if(isset($_GET['app'])&&isset($_GET['service'])&&isset($_GET['gernal'])){
	$app=$_GET['app'];
	$service=$_GET['service'];
	$gernal=$_GET['gernal'];
	$id=$_GET['id'];
         if(!empty($app)&&!empty($service)&&!empty($gernal)){
				
				
			$iquery="INSERT INTO `feedback` VALUES(".mysql_real_escape_string($id).",'".mysql_real_escape_string($app)."','".mysql_real_escape_string($service)."','".mysql_real_escape_string($gernal)."')";

				if(mysql_query($iquery)){
							echo "Feedback Sent";
				                         
				                         }else{echo mysql_error();}
				       
				       }else{echo "some feilds are empty";}


}

@mysql_close($con);												 



?>






