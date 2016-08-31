<?php

if ( isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) {
    
    require_once '../../../../connect.inc.php';
    
    $id = $_POST['id'];
    $this_field = $_POST['thisField'];
    $updated_title = $_POST['updatedTitle'];
    
    $stmt = $db->prepare("UPDATE `movies`
                          SET ` . $this_field . ` = ?
                          WHERE `movie_id` = ?");
                          
    $stmt->bind_param('si', $updated_title, $id);
    $stmt->execute();
    $stmt->close();
}

?>