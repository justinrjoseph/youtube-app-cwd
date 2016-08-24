<?php

$db_connect = array(
  'server' => 'localhost',
  'user'   => 'root',
  'pass'   => '',
  'name'   => 'test_db'
);

$db = new mysqli(
  $db_connect['server'],
  $db_connect['user'],
  $db_connect['password'],
  $db_connect['name']
);

echo $db->host_info;
echo "<br>";
echo $db->connect_errno;
echo "<br>";

if ( $db->connect_errno > 0 ) {
  echo "Database connection error! " . $db->connect_error;
  exit;
}

$sql = "SELECT * FROM `test_db` ORDER BY `name`";

$result = $db->query($sql);

echo '<table border="1" cellpadding="0" cellspacing="0">';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Name</th>';
echo '<th>Password</th>';
echo '<th>Secrets</th>';

while ($row = $result->fetch_object()) {
  $id = $row->id;
  $name = htmlentities($row->name, ENT_QUOTES, "UTF-8");
  $password = htmlentities($row->password, ENT_QUOTES, "UTF-8");
  $secrets = htmlentities($row->secrets, ENT_QUOTES, "UTF-8");
  echo '<tr>';
  echo "<td>$id</td>";
  echo "<td>$name</td>";
  echo "<td>$password</td>";
  echo "<td>$secrets</td>";
  echo '<tr>';
}

echo '</table>';

?>