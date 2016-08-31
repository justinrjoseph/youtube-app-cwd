<?php

if ( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) {
    
    require_once '../../../../connect.inc.php';
    
    $id = $_POST['id'];
    $this_field = $_POST['thisField'];
    $updated_first_name = $_POST['updatedFirstName'];
    
    $stmt = $db->prepare("UPDATE `movie_goers`
                          SET ` . $this_field . ` = ?
                          WHERE `user_id` = ?");
                          
    $stmt->bind_param('si', $updated_first_name, $id);
    $stmt->execute();
    $stmt->close();
}

?>