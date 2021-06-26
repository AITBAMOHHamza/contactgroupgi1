<?php
include_once('config/config.php');
include_once('config/db.php');
if (isset($_POST['delete'])) {
    $deleted_id =  mysqli_real_escape_string($conn, $_POST['deleted_id']);
    $query = "DELETE FROM contact WHERE id={$deleted_id}";
    if (mysqli_query($conn, $query)) {
        header('location:index.php');
    } else {
        echo 'ERROR :' . mysqli_error($conn);
    }
}
