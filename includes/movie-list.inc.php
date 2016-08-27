<?php $non_favorites = showMovies('non-favorites'); ?>

    <section class="movie-list">
      <h2>Hi, (username)</h2>
      
      <p class="welcome">Here are some movies you might like. Click the heart icon to add a movie to your list of favorites.</p>
      
      <?php echo $non_favorites; ?>
    </section>