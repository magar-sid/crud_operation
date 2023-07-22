<?php
session_start();
include "dbconnect.php";

$tbl_sel = "SELECT * FROM tbl_users";
$res =  mysqli_query($conn, $tbl_sel);

if($res){
    // echo "success";  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fetchh</title>
</head>
<body>
    <h1>feching data</h1>
    <?php if(isset($_SESSION['success_message'])): ?>
        <p class="success"><?php echo $_SESSION['success_message']; ?></p>
    <?php
    endif;
    if(mysqli_num_rows($res)>0){  ?>
        <table border="2px" cellspacing="0" cellpadding="10px">  
             <thead>
                <tr>
                   <th>ID</th>
                   <th>Fullname</th>
                   <th>Email</th>
                   <th>Phone</th>
                   <th>Status</th>
                   <th>Created At</th>
                   <th>Updated at</th>
                   <th>Action</th>
                </tr>
                <tbody>
                    
                        <?php while($datas = mysqli_fetch_assoc($res)) {
                            echo "<pre>";
                            print_r($datas);
                            ?>
                            <tr><?php foreach($datas as $key => $value): 
                                if($key != "password"): ?>
                                <td><?php echo $value; ?></td>
                                <?php endif; 
                            endforeach; ?>
                                <td>
                                    <a href="delete.php?id=<?php echo $datas['id']; ?>">Delete</a>
                                    <a href="edit.php?id=<?php echo $datas['id']; ?>">Edit</a>
                                </td>
                            </tr>
                       <?php } ?>
                       
                   
                </tbody>
             </thead>
        </table>

<?php
    } else{
        echo "no record found";
        } 
        
        session_destroy(); ?>
</body>
</html>