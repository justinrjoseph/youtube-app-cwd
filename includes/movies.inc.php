<?php 

$user_favorites = showMovies('favorites');
$non_favorites = showMovies('non-favorites');
$test_movies = testMovies();

switch ( $test_movies ) {
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
      <h2>Favorites</h2>
      
      <ul class="favorites">
        <?php echo $user_favorites; ?>
      </ul>
      
      <div class="trash"></div>
    </nav>
    
<?php if ( !isset($movie_id) ) : ?>
    <section class="movie-list">
      <?php echo $greeting; ?>
      
      <p class="welcome">Here are some movies you might like. Click the heart icon to add a movie to your list of favorites.</p>
      
      <?php echo $non_favorites; ?>
    </section>
<?php else : ?>
    <section class="single-movie">
      <?php echo $movie; ?>
    </section>
<?php endif; ?>