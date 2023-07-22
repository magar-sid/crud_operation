<?php
require "dbconnect.php";
// print_r($conn);
if(isset($_POST['submit'])){
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = sha1($_POST['password']);
    // $confirm_password = $_POST['cpassword'];
    
$sql = "INSERT INTO tbl_users(fullname, email, phone, password) VALUES ('$fullname', '$email', '$phone', '$password')";
$res = mysqli_query($conn, $sql);
if($res){
    echo "data inserted successfully.";
    
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER REGISTER</title>
</head>
<body>
    <h1>REGISTER USER</h1>
    <form action="#" method="POST" name="register_user">
        <div class="field-group">
            <label for="fname">Fullname</label>
            <input type="text" id="fname" name="fname" vlaue="">
        </div>
        <div class="field-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" vlaue="">
        </div>
        <div class="field-group">
            <label for="phone">Phone</label>
            <input type="number" id="phone" name="phone" vlaue="">
        </div>
        <div class="field-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" vlaue="">
        </div>
        <!-- <div class="field-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword" vlaue="">
        </div> -->
        <button type="submit" name="submit">Register Now</button>


    </form>
</body>
</html>