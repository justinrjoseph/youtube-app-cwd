<?php require_once 'includes/connect.inc.php'; ?>

<?php require_once 'includes/get-variables.inc.php'; ?>

<?php require_once 'includes/head.inc.php'; ?>

<?php require_once 'includes/header.inc.php'; ?>
    
<?php require_once 'includes/navigation.inc.php'; ?>
    
<?php

if ( isset($page) ) {
  if ( $page == 'users' ) {
    require_once 'includes/admin-users.inc.php';
  } else {
    if ( $page == 'movies' ) {
      require_once 'includes/admin-movies.inc.php';
    } else {
      echo '<div class="message">';
      echo '<h2 class="alert">Please use the admin menus to navigate</h2>';
      echo "</div>";
      require_once 'includes/footer.inc.php';
      exit;
    }
  }
}

?>
    
<?php require_once 'includes/footer.inc.php'; ?>