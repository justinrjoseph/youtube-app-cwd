<?php

include 'connect.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}



?>

<p><b>Results:</b></p>

<table border="1" cellpadding="5" cellspacing="0">
    <tr style="text-align: left;">
        <th style="width: 100px;">ID</th>
        <th style="width: 150px;">Name</th>
        <th style="width: 150px;">Password</th>
        <th style="width: 200px;">Secrets</th>
    </tr>

    <?php
    
      $stmt = $db->prepare("SELECT * FROM `test_db` WHERE `name` = ? && `password` = ?");
      $stmt->bind_param('ss', $username, $password);
      $stmt->bind_result($id, $name, $password, $secrets);
      $stmt->execute();
    
      while ($stmt->fetch()) {
    ?>

    <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $name; ?></td>
        <td><?php echo $password; ?></td>
        <td><?php echo $secrets; ?></td>
    </tr>
    
    <?php
    
    }

    ?>

</table>

<?php $stmt->close(); ?>