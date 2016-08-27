<?php set_include_path('./includes' . PATH_SEPARATOR . './functions'); ?>

<?php require_once 'test-users.fn.php'; ?>

<?php require_once 'show-users.fn.php'; ?>

<?php require_once 'show-movies.fn.php'; ?>

<?php require_once 'connect.inc.php'; ?>

<?php require_once 'get-variables.inc.php'; ?>

<?php require_once 'head.inc.php'; ?>

<?php require_once 'header.inc.php'; ?>
    
<?php require_once 'navigation.inc.php'; ?>
    
<?php require_once 'favorites.inc.php'; ?>
    
<?php

  if ( isset($movie_id) ) {
    require_once 'single-movie.inc.php';
  } else {
    require_once 'movie-list.inc.php';
  }

?>
    
<?php require_once 'footer.inc.php'; ?>