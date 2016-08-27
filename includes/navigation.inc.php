<?php $users = showUsers(); ?>

    <nav class="navigation">
      <div class="select-users">
        <h2><a href="#">Logged-in user's name</a></h2>
      </div>
      
      <div class="profile logged-out"></div>
      <div class="admin-button"></div>
      
      <?php echo $users; ?>
      
      <ul class="admin-menu">
        <li><a href="admin.php?page=users">Manage Users</a></li>
        <li><a href="admin.php?page=movies">Manage Moves</a></li>
      </ul>
    </nav>