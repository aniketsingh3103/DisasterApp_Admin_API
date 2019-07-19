<?php  


  $link = mysql_connect('localhost','root','') or die('Cannot connect to the DB');
  mysql_select_db('dmn',$link) or die('Cannot select the DB');

if(isset($_GET['id'])){
  $id=$_GET['id'];

}else{
  $id=1;
}
 
  $query = "SELECT * FROM `notification` WHERE n_id >".$id.";";
  $result = mysql_query($query,$link) or die('Errant query:  '.$query);
  
  $posts = array();
  if(mysql_num_rows($result)) {
    while($post = mysql_fetch_assoc($result)) {
      $posts[] = array('post'=>$post);
    }
  }
  
    header('Content-type: application/json');
    echo json_encode(array('posts'=>$posts));

  

  @mysql_close($link);

?>