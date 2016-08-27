<?php

// Called in favorites.inc.php & movie-list.inc.php

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
    case 'non-favorites':
      $stmt = $db->prepare("SELECT *
                            FROM movies
                            WHERE `movie_id` NOT IN (
                              SELECT `movie_id`
                              FROM `favourites`
                              WHERE `favourites`.`user_id` = ?)
                            ORDER BY `title`");
      $stmt->bind_param('i', $user_id);
      break;
  }
  
  $stmt->bind_result($id, $title, $description);
  $stmt->execute();
  
  if ( $data == 'non-favorites' ) {
    $output = '<ul>';
  } else {
    $output = '';
  }
  
  while ( $stmt->fetch() ) {
    $title = htmlentities($title, ENT_QUOTES, "UTF-8");
    $description = htmlentities($description, ENT_QUOTES, "UTF-8");
    
    $output .= '<li>';
    
    if ( $data == 'favorites' ) {
      $output .= '<a href="/?user_id=' . $user_id . '&amp;movie_id=' . $movie_id . '">' . $title . '</a>';
    } else {
      if ( file_exists('img/movies/' . $id . '-tn.png')) {
        $thumbnail = 'img/movies/' . $id . '-tn.png';
      } else {
        $thumbnail = 'img/movies/generic-tn.png';
      }
      
      $output .= '<figure>';
      $output .= '<a href="/?movie_id=' . $id . '&amp;user_id=' . $user_id . '"><img src=' . $thumbnail . ' class="thumbnail" alt="Thumbnail"></a>';
      $output .= '<figcaption>';
      $output .= '<h3><a href="/?movie_id=' . $id . '&amp;user_id=' . $user_id . '">' . $title . '</a></h3>';
      $output .= '<div class="description">' . $description . '</div>';
      $output .= '<div class="add-remove favorite"></div>';
      $output .= '</figcaption>';
      $output .= '</figure>';
    }
    
    $output .= '</li>';
  }
  
  if ( $data == 'non-favorites' ) {
    $output .= '</ul>';
  }
  
  $stmt->close();
  
  return $output;
}

?>