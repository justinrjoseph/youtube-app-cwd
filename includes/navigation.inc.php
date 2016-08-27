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