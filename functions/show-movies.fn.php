<?php

// Called in favorites.inc.php

function showMovies($data) {
  global $db, $user_id, $movie_id;
  
  switch ($data) {
    case 'favorites':
      $stmt = $db->prepare("SELECT *
                            FROM movies
                            WHERE `movie_id` IN (
                              SELECT `movie_id`
                              FROM `favourites`
                              WHERE `favourites`.`user_id` = ?)
                            ORDER BY `title`");
                              
      $stmt->bind_param('i', $user_id);
      break;
  }
  
  $stmt->bind_result($id, $title, $description);
  $stmt->execute();
  
  $output = '';
  
  while ( $stmt->fetch() ) {
    $title = htmlentities($title, ENT_QUOTES, "UTF-8");
    $description = htmlentities($description, ENT_QUOTES, "UTF-8");
    
    $output .= '<li>';
    $output .= '<a href="/?user_id=' . $user_id . '&amp;movie_id=' . $movie_id . '">' . $title . '</a>';
    $output .= '</li>';
  }
  
  $stmt->close();
  
  return $output;
}

?>