<?php

// Called in navigation.inc.php, movie-list.inc.php, & admin-users.inc.php

function showUsers($data) {
  global $db, $user_id;
  
  switch ($data) {
    case 'all':
      $stmt = $db->prepare("SELECT *
                            FROM `movie_goers`
                            ORDER BY `firstname`");
                            
      $tag = 'li';
      break;
    case 'others':
      $stmt = $db->prepare("SELECT *
                            FROM `movie_goers`
                            WHERE `user_id` != ?
                            ORDER BY `firstname`");
                            
      $stmt->bind_param('i', $user_id);
      $tag = 'li';
      break;
    case 'current':
      $stmt = $db->prepare("SELECT *
                            FROM `movie_goers`
                            WHERE `user_id` = ?");
                            
      $stmt->bind_param('i', $user_id);
      $tag = 'h2';
      break;
    case 'get_name':
      $stmt = $db->prepare("SELECT *
                            FROM `movie_goers`
                            WHERE `user_id` = ?");
      
      $stmt->bind_param('i', $user_id);
      $tag = 'h2';
      break;
    case 'admin':
      $stmt = $db->prepare("SELECT *
                            FROM `movie_goers`");
      $tag = '';
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
    
    switch ( $data ) {
      case 'get_name':
        $output .= '<'. $tag . '>';
        $output .= 'Hi, ' . $firstname . ' ' . $lastname;
        $output .= '</'. $tag . '>';
        break;
      case 'all'; case 'others'; case 'current':
        $output .= '<'. $tag . '>';
        $output .= '<a href="/?user_id='. $id . '">'. $firstname . ' ' . $lastname. '</a>';
        $output .= '</'. $tag . '>';
        break;
      case 'admin':
        $output .= '<tr class="data-row">';
        $output .= '<td><input class="data" type="text" name="firstname" value="' . $firstname . '"></td>';
        $output .= '<td><input class="data" type="text" name="lastname" value="' . $lastname . '"></td>';
        $output .= '<td class="delete-cell"><div class="delete"></div></td>';
        $output .= '</tr>';
        break;
    }
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