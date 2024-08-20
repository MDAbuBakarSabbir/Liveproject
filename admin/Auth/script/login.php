<?php
session_start();
include "../../config/dbconnection.php";
// login page script --------------------------------------------------------------------------------------------------------------------------------------------------------------------

if (isset($_POST["loginbtn"])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $flag = false;

        if (!$email) {
            $flag = true;
            $_SESSION['email_error'] = "*Email requred";
            header("location:../login.php");
        }else {
        $_SESSION["Entered_email"] = $email;
        }

        if (!$password) {
            $flag = true;
            $_SESSION['password_error'] = "*Password requried";
            header("location:../login.php");
        }

    if ($flag == false) {
        $encrypt = md5($password);
        $login_quary = "SELECT COUNT(*) AS 'validate' FROM admins WHERE email = '$email' AND password = '$encrypt'";
        $conection = mysqli_query($db, $login_quary);
        $login_result = mysqli_fetch_assoc($conection);

        if ($login_result['validate'] == 1) {
            $login_quary = "SELECT * FROM admins WHERE email = '$email'";
            $db_conection = mysqli_query($db, $login_quary);
            $author = mysqli_fetch_assoc($db_conection);

            $_SESSION["author_id"] = $author["id"];
            $_SESSION["author_name"] = $author["name"];
            $_SESSION["author_email"] = $author["email"];
            header("location:../../index.php");
        }else {
            $_SESSION['login_failed'] = " LOGIN UNSUCCESSFULL";
            header("location: ../login.php");
            die();
    }
    }

}

?>

