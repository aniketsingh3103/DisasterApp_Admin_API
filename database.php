<?php$con=mysql_connect("localhost","root","","dmn");if (!$con){   echo "Failed to connect to MySQL: " . mysqli_connect_error();}mysql_select_db('dmn');if(isset($_GET['noti'])){$phone = $_GET['noti'];$iquery="INSERT INTO `notification`  VALUES(NULL,'".mysql_real_escape_string($phone)."')";				if(!mysql_query($iquery)){					echo 'error';				}else{          echo "success";		 }    }    if(isset($_GET['min'])&&isset($_GET['max'])){$min = $_GET['min'];$max=$_GET['max'];$iquery="INSERT INTO `weather`  VALUES(NULL,'".mysql_real_escape_string($max)."','".mysql_real_escape_string($min)."')";				if(!mysql_query($iquery)){					echo 'error';				}else{          echo "success";		 }    }@mysql_close($con);?>