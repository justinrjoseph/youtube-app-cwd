<?php require_once 'functions/show-users.fn.php'; ?>

<?php require_once 'includes/connect.inc.php'; ?>

<?php require_once 'includes/get-variables.inc.php'; ?>

<?php require_once 'includes/head.inc.php'; ?>

<?php require_once 'includes/header.inc.php'; ?>
    
<?php require_once 'includes/navigation.inc.php'; ?>
    
<?php require_once 'includes/favorites.inc.php'; ?>
    
<?php

  if ( isset($movie_id) ) {
    require_once 'includes/single-movie.inc.php';
  } else {
    require_once 'includes/movie-list.inc.php';
  }

?>
    
<?php require_once 'includes/footer.inc.php'; ?>