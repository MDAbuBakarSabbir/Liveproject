<?php
session_start();
include ("../../config/dbconnection.php");


if (isset($_POST['registerbtn'])){
    $username = $_POST['admin_name'];
    $phone = $_POST['admin_phone'];
    $email = $_POST['admin_email'];
    // $gender = $_POST['gender'];
    $password = $_POST['admin_password'];
    $c_password = $_POST['c_password'];
    $flag = false;

    $username_regex = '/^(?! $)[a-zA-Z ]*$/';
    $phone_regex = '/^\+880\d{10}$/';
    $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $password_regex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,20}$/';

    // --------------- Name ----------------------

    if (!$username) {
        $flag = true;
        $_SESSION['name_error'] = "*Name requred";
        header("location:../sign-in.php");
    }elseif (!preg_match($username_regex,$username)) {
        $flag = true;
        $_SESSION['name_error'] = "This name can not be taken";
        header("location:../../register.php");
    }else {
        $_SESSION["Entered_name"] = $username;
    }

    // ------------- Phone ----------------

    if (!$phone) {
        $flag = true;
        $_SESSION['phone_error'] = "*Phone Number requred";
        header("location:../../register.php");
    }elseif (!preg_match($phone_regex,$phone)) {
        $flag = true;
        $_SESSION['phone_error'] = "This Number can not be taken";
        header("location:../../register.php");
    }else {
        $_SESSION["Entered_phone"] = $phone;
    }

        // ----------------s Email --------------

    if (!$email) {
        $flag = true;
        $_SESSION['email_error'] = "*Email requred";
        header("location:../../register.php");
    }elseif (!preg_match($email_regex,$email)) {
        $flag = true;
        $_SESSION['email_error'] = "This email is invalid";
        header("location:../register.php.php");
    }else {
    $_SESSION["Entered_email"] = $email;
    }

    //------------------ Gender------------------

    // if (!$gender) {
    //     $flag = true;
    //     $_SESSION['gender_error'] = "*Gender requred";
    //     header("location:../../register.php");
    // }else {
    // $_SESSION["Entered_gender"] = $gender;
    // }


    //-------------------- Password----------------

    if (!$password) {
        $flag = true;
        $_SESSION['password_error'] = "*Password requred";
        header("location:../../register.php");
    }elseif (!preg_match($password_regex,$password)) {
        $flag = true;
        $_SESSION['password_error1'] = "Password must contain: <br>
        *Al least 8 charectar.<br>
        *Upper case and lower case.<br>
        *one number";
        header("location:../../register.php");
    }

    // ----------------------- Confirm Password -------------

    if (!$c_password) {
        $flag = true;
        $_SESSION['c_password_error'] = "*Confirm Password requred!";
        header("location:../../register.php");
    }elseif ($c_password != $password) {
        $flag = true;
        $_SESSION['c_password_error'] = "*Password doesn't Match!!";
        header("location:../../register.php");
    }


    if ($flag == false) {
        $p_encrypt = md5($password);
        $create_admin = "INSERT INTO admins(name, phone, email,password) VALUES ('$username','$phone','$email','$p_encrypt')";
        mysqli_query($db, $create_admin);
        $_SESSION['registersuccess'] = " Registration Complete.";
        $_SESSION['register_name'] = "$username";
        $_SESSION['register_phone'] = "$phone";
        $_SESSION['register_email'] = "$email";
        $_SESSION['register_password'] = "$password";
        header("location: ../../register.php");     
    }else{
        echo "something went wrong";
        header("location: ../../register.php");
    }

}

?>