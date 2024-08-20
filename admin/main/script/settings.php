<?php
session_start();
include("../../config/dbconnection.php");

// Admin profile picture upload code---------------------------------

if (isset($_POST['adimgubtn'])) {
    $admin_img = $_FILES['admin_img']['name'];
    $temp_path = $_FILES['admin_img']['tmp_name'];

    if ($admin_img) {
        $id = $_SESSION["author_id"];
        $name = $_SESSION["author_name"];
        $imgexplode = explode('.', $admin_img);
        $extention = end($imgexplode);
        $img_name = $id . "-" . $name . "-". date("d-m-Y") .".". $extention;
        $local_path = "../../assets/images/profile/". $img_name;

        if (move_uploaded_file($temp_path, $local_path)) {
            $imageupquery = "UPDATE admins SET image='$img_name' WHERE id='$id'";
            mysqli_query($db,$imageupquery);
            $_SESSION['admin_up_success'] = "Your Profile Picture Update Sucessfull";
            header("location:../../settings.php"); 
        }
    }else {
        $_SESSION['admin_pic_error'] = "*Choise a image to upload";
        header("location:../../settings.php"); 
    }
}

// admin name update code --------------------------------------

if (isset($_POST["adnameubtn"])) {
    $admin_name = $_POST['admin_name'];
    $username_regex = '/^(?! $)[a-zA-Z ]*$/';
    $id = $_SESSION["author_id"];
    if ($admin_name && preg_match($username_regex, $admin_name)){
        $nameupquery = "UPDATE admins SET name='$admin_name' WHERE id='$id'";
        mysqli_query($db,$nameupquery);
        $_SESSION['author_name'] = $admin_name;
        $_SESSION['admin_up_success'] = "Your Name update successfull";
        header("location: ../settings.php");

    }else{
        $_SESSION['admin_name_error'] = "*Valid Name requred!!";
        header("location:../../settings.php");      
    }
}

// ADmin phone update code -----------------------------------

if (isset($_POST["adphoneubtn"])) {
    $admin_phone = $_POST['admin_phone'];
    $phone_regex = '/^\+880\d{10}$/';
    $id = $_SESSION["author_id"];
    if ($admin_phone && preg_match($phone_regex,$admin_phone)) {
        $phoneupdate_query = "UPDATE admins SET phone='$admin_phone' WHERE id='$id'";
        mysqli_query($db,$phoneupdate_query);
        $_SESSION["admin_up_success"] = "Your Phone update successfull";
        header("location:../../settings.php");
    }else{
        $_SESSION['admin_phone_error'] = "*Phone Number requred";
        header("location:../../settings.php");
    }
}

// admin email update code -----------------------------------------

if (isset($_POST["ademailubtn"])) {
    $admin_email = $_POST['admin_email'];
    $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $id = $_SESSION["author_id"];
    if ($admin_email && preg_match($email_regex,$admin_email)) {
        $emailup_query = "UPDATE admins SET email='$admin_email' WHERE id='$id'";
        mysqli_query($db,$emailup_query);
        $_SESSION["admin_up_success"] = "Your Email Update Successfull";
        header("location: ../settings.php");
    }else{
        $_SESSION['admin_email_error'] = "*Valid Email requred";
        header("location:../../settings.php");
    }
}

// Admin password update code------------------------------------------

if (isset($_POST["passubtn"])) {
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['$newpass'];
    $c_newpass = $_POST['$c_newpass'];
    $password_regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/';
    $id = $_SESSION["author_id"];

    if ($oldpass && $newpass && $c_newpass) {
        if (preg_match($password_regex,$newpass && $newpass == $c_newpass)) {
            $oldencrypt = md5($oldpass);
            $passmatch_query = "SELECT COUNT(*) AS 'match' FROM admins WHERE id='$id' AND password='$oldencrypt'";
            $connection = mysqli_query($db,$passmatch_query);
            $match = mysqli_fetch_assoc($connection)['match'];
            if ($match == 1) {
                $newencrypt = md5($newpass);
                $passup_query = "UPDATE admins SET password='$newencrypt' WHERE id='$id'";
                mysqli_query($db,$passup_query);
                $_SESSION["admin_up_success"] = "Your Login Password Update Successfull";
                header("location:../../settings.php");
        }else{
            $_SESSION['oldpass_error'] = "*Password requred";
        header("location:../../settings.php");
        }
        
    }else{
        $_SESSION['oldpass_error'] = "*Password requred";
        header("location:../../settings.php");
    }
}
}

?>