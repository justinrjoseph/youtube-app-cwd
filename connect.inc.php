<?php

$connection = array(
  'server'     => 'localhost',
  'user'       => 'root',
  'password'   => '',
  'name'       => 'movies'
);

$db = new mysqli(
  $connection['server'],
  $connection['user'],
  $connection['pass'],
  $connection['name']
);

if ( $db->connect_errno > 0 ) {
  echo "Database connection error: " . $db->connect_error;
  exit;
}

?>