<?php 
session_start();
require "dbconnect.php";
$id = $_GET['id'];
$sql = "DELETE FROM tbl_users WHERE id='$id'";

mysqli_query($conn, $sql);
$_SESSION['success_message'] = "user $id deleted successfully";
header("location: /tbl.create.php");
if($conn->affected_rows == 1){
    // echo "user deleted successfully of ID: $id";
    $_SESSION['success_message'] = "user $id deleted successfully";
    header("location: /tbl.create.php");

}
else{
    echo " user data on ID: $id not found";
}