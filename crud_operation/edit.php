<?php
require "dbconnect.php";
$id = $_GET['id'];
// print_r($conn);
if(isset($_POST['submit'])){
    $fullname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    // $confirm_password = $_POST['cpassword'];
    
$sql = "UPDATE tbl_users SET fullname='$fullname', email='$email', phone='$phone' WHERE id='$id'";
$res = mysqli_query($conn, $sql);
    if($res){
        echo "data updated successfully.";   
    }
}


$user = "SELECT * FROM tbl_users WHERE id='$id'";
$user_res = mysqli_query($conn, $user);

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
    <?php if(mysqli_num_rows($user_res) > 0): 
        while($data = mysqli_fetch_assoc($user_res)):
            // print_r($data);
        ?>
    <form action="#" method="POST" name="register_user">
        <div class="field-group">
            <label for="fname">Fullname</label>
            <input type="text" id="fname" name="fname" value="<?php echo isset($data['fullname']) ? $data['fullname'] : ''; ?>">
        </div>
        <div class="field-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>">
        </div>
        <div class="field-group">
            <label for="phone">Phone</label>
            <input type="number" id="phone" name="phone" value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>">
        </div>
        <!-- <div class="field-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword" value="">
        </div> -->
        <button type="submit" name="submit">Update Now</button>


    </form>
    <?php endwhile; 
else: ?>
        <p>User <?php echo $id; ?> data not found.</p>
    <?php endif; ?>
</body>
</html>