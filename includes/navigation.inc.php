<?php

  $stmt = $db->prepare("SELECT * FROM `movie_goers` ORDER BY `firstname`");
  $stmt->bind_result($id, $firstname, $lastname);
  $stmt->execute();

?>

    <nav class="navigation">
      <div class="select-users">
        <h2><a href="#">Logged-in user's name</a></h2>
      </div>
      
      <div class="profile logged-out"></div>
      <div class="admin-button"></div>
      
      <ul class="users-menu">
        <?php while ( $stmt->fetch() ) : ?>
        <?php $firstname = htmlentities($firstname, ENT_QUOTES, "UTF-8"); ?>
        <?php $lastname = htmlentities($lastname, ENT_QUOTES, "UTF-8"); ?>
          <li><a href="index.php?user_id=<?php echo $id; ?>"><?php echo $firstname; ?> <?php echo $lastname; ?></a></li>
        <?php endwhile; ?>
      </ul>
      
      <?php $stmt->close(); ?>
      
      <ul class="admin-menu">
        <li><a href="admin.php?page=users">Manage Users</a></li>
        <li><a href="admin.php?page=movies">Manage Moves</a></li>
      </ul>
    </nav>