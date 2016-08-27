<?php

// Called in navigation.inc.php

function showUsers($data) {
  global $db, $user_id;
  
  switch ($data) {
    case 'all':
      $stmt = $db->prepare("SELECT * FROM `movie_goers` ORDER BY `firstname`");
      $tag = 'li';
      break;
    case 'others':
      $stmt = $db->prepare("SELECT * FROM `movie_goers` WHERE `user_id` != ? ORDER BY `firstname`");
      $stmt->bind_param('i', $user_id);
      $tag = 'li';
      break;
    case 'current':
      $stmt = $db->prepare("SELECT * FROM `movie_goers` WHERE `user_id` = ?");
      $stmt->bind_param('i', $user_id);
      $tag = 'h2';
      break;
  }
  
  $stmt->bind_result($id, $firstname, $lastname);
  $stmt->execute();
  
  if ( $tag == 'li' ) {
    $output = '<ul class="users-menu">';
  } else {
    $output = '';
  }
  
  while ( $stmt->fetch() ) {
    $firstname = htmlentities($firstname, ENT_QUOTES, "UTF-8");
    $lastname = htmlentities($lastname, ENT_QUOTES, "UTF-8");
    $output .= '<'. $tag . '>';
    $output .= '<a href="/?user_id='. $id . '">'. $firstname . ' ' . $lastname. '</a>';
    $output .= '</'. $tag . '>';
  }
  
  if ( $data == 'others' ) {
    $output .= '<'. $tag . ' class="logout">';
    $output .= '<a href="/">Log Out</a>';
    $output .= '</'. $tag . '>';
  }
  
  if ( $tag == 'li' ) {
    $output .= '</ul>';  
  }
  
  $stmt->close();
  
  return $output;
}

?>