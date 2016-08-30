<?php

require_once '../includes/connect.inc.php';

$user_id = $_POST['user_id'];

$stmt = $db->prepare("DELETE
                      FROM `movie_goers`
                      WHERE `user_id` = ?");
                      
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->close();

$stmt = $db->prepare("DELETE
                      FROM `favourites`
                      WHERE `user_id` = ?");
                      
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->close();

?>