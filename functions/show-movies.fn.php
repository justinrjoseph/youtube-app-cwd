<?php

// Called in favorites.inc.php & movie-list.inc.php

function showMovies($data) {
  global $db, $user_id, $movie_id;
  
  switch ($data) {
    case 'favorites':
      $stmt = $db->prepare("SELECT *
                            FROM `movies`
                            WHERE `movie_id` IN (
                              SELECT `movie_id`
                              FROM `favourites`
                              WHERE `favourites`.`user_id` = ?)
                            ORDER BY `title`");
                              
      $stmt->bind_param('i', $user_id);
      break;
    case 'non-favorites':
      $stmt = $db->prepare("SELECT *
                            FROM `movies`
                            WHERE `movie_id` NOT IN (
                              SELECT `movie_id`
                              FROM `favourites`
                              WHERE `favourites`.`user_id` = ?)
                            ORDER BY `title`");
      $stmt->bind_param('i', $user_id);
      break;
    case 'single':
      $stmt = $db->prepare("SELECT *
                            FROM `movies`
                            WHERE `movie_id` = ?");
      $stmt->bind_param('i', $movie_id);
      break;
  }
  
  $stmt->bind_result($id, $title, $description);
  $stmt->execute();
  
  $output = '';
  
  while ( $stmt->fetch() ) {
    $title = htmlentities($title, ENT_QUOTES, "UTF-8");
    $description = htmlentities($description, ENT_QUOTES, "UTF-8");
    
    switch ( $data ) {
      case 'favorites':
        $output .= '<li>';
        $output .= '<a href="/?user_id=' . $user_id . '&amp;movie_id=' . $id . '">' . $title . '</a>';
        $output .= '</li>';
        break;
      case 'non-favorites':
        if ( file_exists('img/movies/' . $id . '-tn.png')) {
          $thumbnail = 'img/movies/' . $id . '-tn.png';
        } else {
          $thumbnail = 'img/movies/generic-tn.png';
        }
        
        $output .= '<li>';
        $output .= '<figure>';
        $output .= '<a href="/?movie_id=' . $id . '&amp;user_id=' . $user_id . '"><img src=' . $thumbnail . ' class="thumbnail" alt="Thumbnail"></a>';
        $output .= '<figcaption>';
        $output .= '<h3><a href="/?movie_id=' . $id . '&amp;user_id=' . $user_id . '">' . $title . '</a></h3>';
        $output .= '<div class="description">' . $description . '</div>';
        $output .= '<div class="add-remove favorite"></div>';
        $output .= '</figcaption>';
        $output .= '</figure>';
        $output .- '</li>';
        break;
      case 'single':
        if ( file_exists('img/movies/' . $id . '-tn.png') ) {
          $thumbnail = 'img/movies/' . $id . '-tn.png';
        } else {
          $thumbnail = 'img/movies/generic-tn.png';
        }
        
        $output .= '<img class="movie-player" alt=' . $title . ' src=' . $thumbnail . '>';
        $output .= '<h3>' . $title . '</h3>';
        $output .= '<div class="actions>';
        $output .= '<div class="add-remove">';
        $output .= '<p>Add To/Remove from Favorites</p>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '<p class="description">' . $description . '</p>';
        break;
    }
  }
  
  $stmt->close();
  
  return $output;
}

?>