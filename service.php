<?php  

if(isset($_GET['user']) && intval($_GET['user'])) {
 
  $number_of_posts = isset($_GET['num']) ? intval($_GET['num']) : 10; 

  $format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml'; 

  $user_id = intval($_GET['user']); 
 
  $link = mysql_connect('localhost','root','') or die('Cannot connect to the DB');

  mysql_select_db('dmn',$link) or die('Cannot select the DB');
  

  $query = "SELECT * FROM `check`;";
  $result = mysql_query($query,$link) or die('Errant query:  '.$query);
  
  $posts = array();
  if(mysql_num_rows($result)) {
    while($post = mysql_fetch_assoc($result)) {
      $posts[] = array('post'=>$post);
    }
  }

  if($format == 'json') {
    header('Content-type: application/json');
    echo json_encode(array('posts'=>$posts));
  }
  
  
  @mysql_close($link);
}
?>