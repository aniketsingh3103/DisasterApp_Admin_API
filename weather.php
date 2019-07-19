<?php
$con=mysql_connect("localhost","root","","dmn");

if (!$con)
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysql_select_db('dmn');
if(isset($_GET['w_id'])){
$w_id = $_GET['w_id'];

$id=array();


		
$select="SELECT `min`,`max` FROM `weather` WHERE `w_id`='".$w_id."';";
$result = mysql_query($select,$con) or die('Errant query:  '.$select);	

if(mysql_num_rows($result)) {
    while($post = mysql_fetch_assoc($result)) {
      $id[]= $post;
    }
}else{$id[]=0;}
	  


    header('Content-type: application/json');
    echo json_encode(array('id'=>$id));
  }

@mysql_close($con);

?>