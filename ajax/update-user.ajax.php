<?php

require_once '../includes/connect.inc.php';

$id = $_POST['id'];
$updated_first_name = $_POST['updatedFirstName'];

$stmt = $db->prepare("UPDATE `movie_goers`
                      SET `firstname` = ?
                      WHERE `user_id` = ?");
                      
$stmt->bind_param('si', $updated_first_name, $id);
$stmt->execute();
$stmt->close();

?>