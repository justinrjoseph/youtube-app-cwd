<?php

if ( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) {
    
    require_once '../../../../connect.inc.php';
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    $stmt = $db->prepare("INSERT INTO `movie_goers`
                          (firstname, lastname)
                          values
                          (?, ?)");
                          
    $stmt->bind_param('ss', $firstname, $lastname);
    $stmt->execute();
    $stmt->close();
    
    $max_id_sql = "SELECT MAX(user_id) AS user_id
                   FROM `movie_goers`";
                   
    $max_id_result = $db->query($max_id_sql);
    $max_id_rows = $max_id_result->num_rows;
    
    while ( $row = $max_id_result->fetch_object() ) {
        $result = $row->user_id;
    }
    
    echo $result;
}

?>