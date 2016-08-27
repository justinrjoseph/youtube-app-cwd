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
}

?>

    <nav class="navigation">
      <div class="select-users">
        <?php echo $heading; ?>
      </div>
      
      <div class="profile <?php echo $state; ?>"></div>
      <div class="admin-button"></div>
      
      <?php echo $users; ?>
      
      <ul class="admin-menu">
        <li><a href="admin.php?page=users">Manage Users</a></li>
        <li><a href="admin.php?page=movies">Manage Moves</a></li>
      </ul>
    </nav>
    
<?php if ( $test_users == 'no_id' ) : ?>
    <div class="message">
      <h2>Please choose one of the movie goers from the menu on the right.</h2>  
    </div>
<?php require_once 'footer.inc.php'; ?>
<?php exit; ?>
<?php endif; ?>

<?php if ( $test_users == 'invalid_id' ) : ?>
    <div class="alert">
      <h2>Invalid user ID. Choose one of the movie goers from the menu on the right.</h2>  
    </div>
<?php require_once 'footer.inc.php'; ?>
<?php exit; ?>
<?php endif; ?>