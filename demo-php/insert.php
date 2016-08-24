<?php

include 'connect.php';

if (isset($_POST['username'])) {
    $username = $_POST['username'];
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

if (isset($_POST['secrets'])) {
    $secrets = $_POST['secrets'];
}

// Add code here
$stmt = $db->prepare("INSERT INTO `test_db` (name, password, secrets) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $username, $password, $secrets);
$stmt->execute();
$stmt->close();

header("Location: display-and-insert.php");

?>