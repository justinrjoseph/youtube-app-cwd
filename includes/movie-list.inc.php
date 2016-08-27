<?php

  $greeting = showUsers('get_name');
  $non_favorites = showMovies('non-favorites');
  
?>

    <section class="movie-list">
      <?php echo $greeting; ?>
      
      <p class="welcome">Here are some movies you might like. Click the heart icon to add a movie to your list of favorites.</p>
      
      <?php echo $non_favorites; ?>
    </section>