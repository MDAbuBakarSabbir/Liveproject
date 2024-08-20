<?php session_start();
    if (isset($_SESSION["author_id"])) {
       header("location:../main/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">

    <title>Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/plugins/pace/pace.css" rel="stylesheet">

    <link href="../assets/css/main.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/neptune.png" />
</head>
<body>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-center">

        <div class="app-auth-container">
            <div class="logo">
                <a href="../main/index.php">Neptune</a>
            </div>
                    <!-- Login failed massage  -->

                <?php if (isset($_SESSION['login_failed'])) { ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                    <span class="alert-title text-danger"><?= $_SESSION['login_failed']?></span>
                     <span class="alert-text text-danger"> Your entered email or password is wrong!!</span>
                    </div>
                 </div>
                <?php } unset($_SESSION['login_failed'])?>

            <form action="script/login.php" method="POST">
                <div class="auth-credentials m-b-xxl">
                    <label for="signInEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control m-b-md <?= (isset($_SESSION['email_error']))? 'is-invalid':'';?>" name = "email" aria-describedby="signInEmail" placeholder="example@gmail.com" value="<?=(isset($_SESSION['register_email'])) ? $_SESSION['register_email']:'';unset($_SESSION['register_email'])?>">
                    <?php if (isset($_SESSION['email_error'])) {?>
                        <div class="error text-danger"><?= $_SESSION['email_error']?></div>
                        <?php } unset($_SESSION['email_error']);?> 

                    <label for="signInPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control <?= (isset($_SESSION['password_error']))? 'is-invalid':'';?>" id="showpass" aria-describedby="signInPassword" placeholder="Password" value="<?= (isset($_SESSION['register_password'])) ? $_SESSION['register_password']: ''; unset($_SESSION['register_password'])?>">
                    <?php if (isset($_SESSION['password_error'])) {?>
                        <div class="error text-danger"><?= $_SESSION['password_error']?></div>
                        <?php } unset($_SESSION['password_error']);?> 
                </div>

                <div class="showpassword">
                    <label for=""><input class="checkbox" type="checkbox" onclick="myFunction()">Show password</label>

                <div class="auth-submit">
                    <button class="btn btn-primary" name = "loginbtn">Login</button>
                </div>
            </form>           
        </div>
    </div>
    

    <script>function myFunction() {
                    var x = document.getElementById("showpass");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
    }</script>
    <!-- Javascripts -->
    <script src="../../assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="../../assets/plugins/pace/pace.min.js"></script>
    <script src="../../assets/js/main.min.js"></script>
    <script src="../../assets/js/custom.js"></script>
</body>
</html>