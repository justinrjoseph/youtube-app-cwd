<?php

require_once '../includes/connect.inc.php';

$id = $_POST['id'];
$this_field = $_POST['thisField'];
$updated_title = $_POST['updatedTitle'];

$stmt = $db->prepare("UPDATE `movies`
                      SET ` . $this_field . ` = ?
                      WHERE `movie_id` = ?");
                      
$stmt->bind_param('si', $updated_title, $id);
$stmt->execute();
$stmt->close();

?>