<?php
$con=mysqli_connect("localhost","root","","aniket");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysql_select_db('aniket');
//if(isset($_POST['username'])&&isset($_POST['password'])){
$username = "aniket";
$password = "1234";
echo "error1";
$result = mysql_query("SELECT`username`FROM`check`WHERE `username`='".mysql_real_escape_string($username)."' AND  `password`='".mysql_real_escape_string($password)."'");
echo "error2";
$row = mysql_num_rows($result);
echo "error3";
if($row==1){
			echo'user found in the data base';
		}

//}
mysqli_close($con);
echo "hello";

?>