<?php set_include_path('./includes' . PATH_SEPARATOR . './functions'); ?>

<?php require_once 'test-users.fn.php'; ?>

<?php require_once 'show-users.fn.php'; ?>

<?php require_once 'connect.inc.php'; ?>

<?php require_once 'get-variables.inc.php'; ?>

<?php require_once 'head.inc.php'; ?>

<?php require_once 'header.inc.php'; ?>
    
<?php require_once 'navigation.inc.php'; ?>
    
<?php

if ( isset($page) ) {
  if ( $page == 'users' ) {
    require_once 'admin-users.inc.php';
  } else {
    if ( $page == 'movies' ) {
      require_once 'admin-movies.inc.php';
    } else {
      echo '<div class="message">';
      echo '<h2 class="alert">Please use the admin menus to navigate</h2>';
      echo "</div>";
      require_once 'footer.inc.php';
      exit;
    }
  }
}

?>
    
<?php require_once 'footer.inc.php'; ?>