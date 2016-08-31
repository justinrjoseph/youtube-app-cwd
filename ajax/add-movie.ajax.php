<?php

require_once '../includes/connect.inc.php';

$title = $_POST['title'];
$description = $_POST['description'];

$stmt = $db->prepare("INSERT INTO `movies`
                      (title, description)
                      values
                      (?, ?)");
                      
$stmt->bind_param('ss', $title, $description);
$stmt->execute();
$stmt->close();

$max_id_sql = "SELECT MAX(movie_id) AS movie_id
               FROM `movies`";
               
$max_id_result = $db->query($max_id_sql);
$max_id_rows = $max_id_result->num_rows;

while ( $row = $max_id_result->fetch_object() ) {
    $result = $row->movie_id;
}

echo $result;

?>