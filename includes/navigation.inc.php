<?php

$test_users = testUsers();

switch ($test_users) {
  case 'no_id'; case 'invalid_id':
    $users = showUsers('all');
    $heading = '<h2><a>Choose a movie goer</a></h2>';
    $state = 'logged-out';
    break;
  case 'id_set':
    $users = showUsers('others');
    $heading = showUsers('current');
    $state = 'logged-in';
    break;
  case 'no_data':
    $heading = '<h2><a href="index.php?page=users">Add movie-goers</a></h2>';
    $users = "";
    $state = 'logged-out';
    break;
}

?>

    <nav class="navigation">
      <div class="select-users">
        <?php echo $heading; ?>
      </div>
      
      <div class="profile <?php echo $state; ?>"></div>
      <div class="admin-button"></div>
      
      <?php echo $users; ?>
      
      <ul class="admin-menu hidden">
        <li><a href="/?page=users">Manage Users</a></li>
        <li><a href="/?page=movies">Manage Movies</a></li>
      </ul>
    </nav>

<?php if ( $page == 'users' ) : ?>
  <?php include 'admin-users.inc.php'; ?>
  <?php include 'footer.inc.php'; ?>
  <?php exit; ?>
<?php endif; ?>

<?php if ( $page == 'movies' ) : ?>
  <?php include 'admin-movies.inc.php'; ?>
  <?php include 'footer.inc.php'; ?>
  <?php exit; ?>
<?php endif; ?>

<?php if ( $test_users == 'no_id' ) : ?>
    <div class="message">
      <h2>Please choose one of the movie goers from the menu on the right.</h2>  
    </div>
<?php include 'footer.inc.php'; ?>
<?php exit; ?>
<?php endif; ?>

<?php if ( $test_users == 'invalid_id' ) : ?>
    <div class="alert">
      <h2>Invalid user ID. Choose one of the movie goers from the menu on the right.</h2>  
    </div>
<?php include 'footer.inc.php'; ?>
<?php exit; ?>
<?php endif; ?>

<?php if ( $test_users == 'no_data' ) : ?>
    <div class="message alert">
      <h2>There are no movie-goers in the database. Please add records below.</h2>
    </div>
<?php include 'admin-users.inc.php'; ?>
<?php include 'footer.inc.php'; ?>
<?php exit; ?>
<?php endif; ?>