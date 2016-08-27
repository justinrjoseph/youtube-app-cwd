<?php

function testFavorite() {
  global $db, $user_id, $movie_id;
  
  $stmt = $db->prepare("SELECT *
                        FROM `favourites`
                        WHERE `user_id` = ? && `movie_id` = ?");
                        
  $stmt->bind_param('ii', $user_id, $movie_id);
  $stmt->execute();
  $stmt->store_result();
  
  if ( $stmt->num_rows > 0 ) {
    $output = 'Remove from Favorites';
  } else {
    $output = 'Add to Favorites';
  }
  
  $stmt->close();
  
  return $output;
}

?>