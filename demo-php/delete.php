<?php

include 'connect.php';

if ( isset($_GET['id']) ) {
    $id = $_GET['id'];
}

// Add code here
$stmt = $db->prepare("DELETE FROM `test_db` WHERE `id` = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();

header("Location: display-and-delete.php");

?>