<?php
/**
 * $host
 * $username
 * $password
 * $post
 */

$host = "localhost";
$username = "root";
$password = "";
$port = 3306;
$db =  "blog_native_php";

$connection  = mysqli_connect($host, $username, $password, $db, $port);

if(!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}