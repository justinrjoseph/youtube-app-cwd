<?php

if ( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) {
  
  require_once '../../../../connect.inc.php';
  
  $user_id = $_POST['user_id'];
  $movie_id = $_POST['movie_id'];
  
  $stmt = $db->prepare("DELETE
                        FROM `favourites` 
                        WHERE `movie_id` = ? && `user_id` = ?");
  
  $stmt->bind_param('ii', $movie_id, $user_id);
  $stmt->execute();
  $stmt->close();
}

?>