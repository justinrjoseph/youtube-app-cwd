<?php

require_once '../includes/connect.inc.php';

$user_id = $_POST['user_id'];
$movie_id = $_POST['movie_id'];

$stmt = $db->prepare("INSERT INTO `favourites`
                      (movie_id, user_id)
                      VALUES
                      (?, ?)");
                      
$stmt->bind_param('ii', $movie_id, $user_id);
$stmt->execute();
$stmt->close();

?>