<?php $user_favorites = showMovies('favorites'); ?>

    <nav class="favorites-list">
      <h2>Favorites</h2>
      
      <ul class="favorites">
        <?php echo $user_favorites; ?>
      </ul>
      
      <div class="trash"></div>
    </nav>