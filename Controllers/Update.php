<?php

include "../mysql/Connection.php";

session_start();

if(isset($_POST['id']) && $_POST['id'] != "") {
    if(
        (isset($_POST['fullname']) && $_POST['fullname'] != "") &&
        (isset($_POST['username']) && $_POST['username'] != "") 
    ) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        //$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $is_active = 1;
        $id = $_POST['id'];
    
        $query = "UPDATE users SET fullname='$fullname', username='$username' WHERE id='$id'";
    
        if($connection->query($query) === TRUE) {
            $_SESSION['form_success'] = "Successfully saved";
            header("Location:../Index.php");
        }else {
            $_SESSION['form_error'] = "Error:". $connection->error;
            header("Location:../Index.php");
        }
    } else {
        $_SESSION['form_error'] = "Missing required field(s).";
        header("Location:../Index.php");
    }
} else {
    $_SESSION['form_error'] = "Missing id";
}