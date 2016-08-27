<?php

// Called in navigation.inc.php

function testUsers() {
  global $db, $user_id;
  
  $sql = "SELECT * FROM`movie_goers`";
  $result = $db->query($sql);
  $rows = $result->num_rows;
  
  if ( $rows < 1 ) {
    return 'no_data';
  }
  
  if ( !isset($user_id) ) {
    return 'no_id';
  }
  
  if ( !is_numeric($user_id) ) {
    return 'invalid_id';
  }
  
  $stmt = $db->prepare("SELECT *
                        FROM `movie_goers`
                        WHERE `user_id` = ?");
                        
  $stmt->bind_param('i', $user_id);
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