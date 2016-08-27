<?php

// Called in movies.inc.php

function testMovies() {
  global $db, $movie_id;
  
  $sql = "SELECT *
          FROM `movies`";
  
  $result = $db->query($sql);
  $rows = $result->num_rows;
  
  if ( $rows < 1 ) {
    return 'no_data';
  }
  
  if ( !isset($movie_id) ) {
    return 'no_id';
  }
  
  if ( !is_numeric($movie_id) ) {
    return 'invalid_id';
  }
  
  $stmt = $db->prepare("SELECT * FROM `movies` WHERE `movie_id` = ?");
  $stmt->bind_param('i', $movie_id);
  $stmt->execute();
  $stmt->store_result();
  $rows = $stmt->num_rows;
  $stmt->close();
  
  if ( $rows < 1 ) {
    return 'invalid_id';
  } else {
    return 'id_set';
  }
}


?>