<?php
//database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_crud_operation";

$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn){
    die("connection failed" . $conn->connect_error);
}

//Create from form


?>