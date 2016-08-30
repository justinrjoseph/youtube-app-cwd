<?php

require_once '../includes/connect.inc.php';

$movie_id = $_POST['movie_id'];

$stmt = $db->prepare("DELETE
                      FROM `movies`
                      WHERE `movie_id` = ?");
                      
$stmt->bind_param('i', $movie_id);
$stmt->execute();
$stmt->close();

$stmt = $db->prepare("DELETE
                      FROM `favourites`
                      WHERE `movie_id` = ?");
                      
$stmt->bind_param('i', $movie_id);
$stmt->execute();
$stmt->close();

?>