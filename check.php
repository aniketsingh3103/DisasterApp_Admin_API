<?php
$con=mysql_connect("localhost","root","","dmn");

if (!$con)
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysql_select_db('dmn');
if(isset($_POST['phone'])){
$phone = $_POST['phone'];

$id=array();
$iquery="INSERT INTO `user` (`phone`) VALUES('".mysql_real_escape_string($phone)."')";
				if(!mysql_query($iquery)){
					$id[]=0;
				}else{
		
$select="SELECT `id` FROM `user` WHERE `phone`='".$phone."';";
$result = mysql_query($select,$con) or die('Errant query:  '.$select);	

if(mysql_num_rows($result)) {
    while($post = mysql_fetch_assoc($result)) {
      $id[]= $post;
    }
}else{$id[]=0;}
	  
}

    header('Content-type: application/json');
    echo json_encode(array('id'=>$id));
  }

@mysql_close($con);

?>