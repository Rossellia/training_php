<?php

require_once('../../../private/initialize.php');

if(is_post_request()){
    // Handle form values sent by new.php

    $subject = [];
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $result = insert_subject($subject);
    if($result === true){

        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));

    }
    else{
        $errors = $result;
    }
   
    //For INSERT statements, $result is true, false
    //if($result){
        //$new_id = mysqli_insert_id($db);
        //redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
    //    return true;
    //}
    //else{
    //    echo mysqli_error($db);
    //    db_disconnect($db);
    //    exit;
    //}
}
else{
    redirect_to(url_for('/staff/subjects/new.php'));
}



?>
