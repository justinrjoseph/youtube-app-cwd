<?php 

$user_favorites = showMovies('favorites');
$non_favorites = showMovies('non-favorites');
$test_movies = testMovies();
$test_favorite = testFavorite();

if ( $user_favorites == '' ) {
  $favorites_title = 'You haven\'t chosen any movies yet as a Favorite.';
  $state = 'hidden';
} else {
  $favorites_title = 'Your Favorities';
  $state = '';
}

if ( $non_favorites == '' ) {
  $message = 'It looks like you love all the movies!';
  $message .= ' If you wish, drag any movie title to the trash can to delete it from your Favorites list.';
  $open_tag = '';
  $close_tag = '';
  $border = 'no-border-bottom';
} else {
  $message = 'Here are some movies to add to your Favorites list.';
  $message .= ' Click on a movie\'s heart icon to add it to your Favorites list.';
  $open_tag = '<ul>';
  $close_tag = '</ul>';
  $border = '';
}

switch ( $test_movies ) {
  case 'no_data':
    echo '<div class="message alert">';
    echo '<h2>There are no movies in the database. Please add records below.</h2>';
    echo '</div>';
    require_once 'admin-movies.inc.php';
    require_once 'footer.inc.php';
    exit;
  case 'no_id':
    $greeting = showUsers('get_name');
    break;
  case 'invalid_id':
    echo '<div class="message alert">';
    echo '<h2>Invalid movie ID: Please choose a movie-goer from the menu on the right.</h2>';
    echo '</div>';
    include 'footer.inc.php';
    exit;
  case 'id_set':
    $movie = showMovies('single');
    break;
}

?>

    <nav class="favorites-list">
      <h2><?php echo $favorites_title; ?></h2>
      
      <ul class="favorites">
        <?php echo $user_favorites; ?>
      </ul>
      
      <div class="trash <?php echo $state; ?>"></div>
    </nav>

<?php

switch ( $test_movies ) {
  case 'no_id':
    echo '<section class="movie-list">';
    echo $greeting;
      
    echo '<p class="welcome ' . $border . '">' . $message . '</p>';
    
    echo $open_tag;
    echo $non_favorites;
    echo $close_tag;
    echo '</section>';
    break;
  case 'id_set':
    echo '<section class="single-movie">';
    echo $movie;
    echo '</section>';
    break;
}

?>