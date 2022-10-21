<?php session_start();
ob_start(); ?>
<?php include("class_lib/db_conf.php"); ?>
<?php include("class_lib/database.php"); ?>
<?php $db = new Database(); ?>
<?php
if (isset($_POST['do_regis'])) {
    $cid = $_POST['cid'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $tel = $_POST['tel'];
    $gender = $_POST['gender'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $birthdayDate = $_POST['birthdayDate'];
    $provinces = $_POST['provinces'];
    $amphures = $_POST['amphures'];
    $districts = $_POST['districts'];
    $accept = $_POST['accept'];
    $select_data = "SELECT * FROM `older_user` WHERE `cid` = '$cid'";

    $sql1 = "INSERT INTO `older_user`(`cid`, `tel`, `password`, `gender`, `fname`, `lname`, `birthdayDate`, `provinces`, `amphures`, `districts`, `accept`) 
    VALUES ('$cid','$tel','$password','$gender','$fname','$lname','$birthdayDate','$provinces','$amphures','$districts','$accept')";
    if ($db->count_rows($select_data) == 0) {
        if ($db->todb($sql1)) {
            $_SESSION['cid'] = $_POST['cid'];
            echo "success";
        }
    } else {
        echo "fail";
    }
    exit();
}
if (isset($_POST['do_login'])) {
    $cid = $_POST['cid'];
    $password = $_POST['password'];
    $select_data = "SELECT * FROM `older_user` WHERE `cid` = '$cid'";

    $sql1 = "SELECT * FROM `older_user` WHERE `cid` = '$cid'";
    $run_qry=mysqli_query($connection,$sql1);
    
    if (mysqli_num_rows($run_qry) > 0) 
    {
        while($row=mysqli_fetch_assoc($run_qry))
        {
            if (password_verify($password, $row['password'])) {
                $_SESSION['cid'] = $_POST['cid'];
                echo "success";
            }
        }
    } else {
        echo "fail";
    }
    
    exit();
}
?>
