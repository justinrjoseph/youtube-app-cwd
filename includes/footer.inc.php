    <footer>
      <p>Instant Database Update Project</p>
    </footer>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="js/navigation.js"></script>
    <script src="js/jquery.tinysort.min.js"></script>
    
    <?php if ( isset($user_id) ) : ?>
      <script src="js/add-favorites.js"></script>
      <script src="js/remove-favorites.js"></script>
    <?php endif; ?>
    
    <?php if ( isset($movie_id) ) : ?>
      <script src="js/add-favorite.js"></script>
      <script src="js/remove-favorite.js"></script>
    <?php endif; ?>
    
    <?php if ( $page == 'users' ) : ?>
      <script src="js/delete-user.js"></script>
      <script src="js/add-user.js"></script>
    <?php endif; ?>
    
    <?php if ( $page == 'movies' ) : ?>
      <script src="js/delete-movie.js"></script>
      <script src="js/add-movie.js"></script>
    <?php endif; ?>
  </body>
</html>