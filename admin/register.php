<?php
    include("main/extends/header.php");
?>
    <div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Add Admin</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <!-- Register success massage start-->
            <?php if (isset($_SESSION['registersuccess'])) { ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                    <span class="alert-title"><?= $_SESSION['registersuccess']; ?></span>
                     <span class="alert-text"><?= $_SESSION['register_name'];?> your registration is successfull</span>
                    </div>
                 </div>
                <?php } unset($_SESSION['registersuccess'])?>
            <div class="card-header">
               <h3> Admin Registration Form</h3>
            </div>
            <div class="card-body">
            <form action="main/register_script/register.php" method="POST">
            <div class="auth-credentials m-b-xxl">

            <!---------------------- Admin name --------------------  -->

                <label for="signUpUsername" class="form-label">Full Name</label>
                <input type="text" class="form-control m-b-md <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : ''?>" name="admin_name" aria-describedby="signUpUsername" placeholder="Enter Full Name" value="<?= (isset($_SESSION["Entered_name"])) ? $_SESSION["Entered_name"] : ""; unset($_SESSION["Entered_name"]); ?>" >
                <?php if (isset($_SESSION['name_error'])) {?>
                <div class="form-text m-b-md text-danger"><?= $_SESSION['name_error']?></div>
                <?php } unset($_SESSION['name_error']);?>

            <!-- --------------------------Admin Phone -------------------  -->

                <label for="signUpUsername" class="form-label">Phone</label>
                <input type="text" class="form-control m-b-md <?= (isset($_SESSION['phone_error'])) ? 'is-invalid' : ''?>" name="admin_phone" aria-describedby="signUpUsername" placeholder="Enter Valid Phone Number" value="+88<?= (isset($_SESSION["Entered_phone"])) ? $_SESSION["Entered_phone"] : ""; unset($_SESSION["Entered_phone"]); ?>" >
                <?php if (isset($_SESSION['phone_error'])) {?>
                <div class="form-text m-b-md text-danger"><?= $_SESSION['phone_error']?></div>
                <?php } unset($_SESSION['phone_error']);?>

                    <!-- -----------------------Admin Email --------------------------------  -->

                <label for="signUpEmail" class="form-label">Email address</label>
                <input type="text" class="form-control m-b-md <?= (isset($_SESSION['email_error']))? 'is-invalid':'';?>" name="admin_email" aria-describedby="signUpEmail" placeholder="example@neptune.com" value="<?= (isset($_SESSION["Entered_email"])) ? $_SESSION["Entered_email"] : "";unset($_SESSION["Entered_email"]);?>">
                    <?php if (isset($_SESSION['email_error'])) {?>
                    <div class="error text-danger"><?= $_SESSION['email_error']?></div>
                    <?php } unset($_SESSION['email_error']);?>

<!-- ---------------------------Gender---------------------- -->


<!-- ---------------------------Password---------------------- -->

                <label for="signUpPassword" class="form-label ">Password</label>
                <input type="password" class="form-control <?= (isset($_SESSION['password_error']))?'is-invalid':'';?>" name="admin_password" id="showpass" aria-describedby="signUpPassword" placeholder="Password" value="<?= (isset($_SESSION["Entered_password"])) ? $_SESSION["Entered_password"] : "";?>">
                    <?php if (isset($_SESSION['password_error'])) {?>
                    <div class="error text-danger"><?php echo $_SESSION['password_error'];?></div>
                    <?php } unset($_SESSION['password_error']);?>
                <div id="emailHelp" class="form-text m-b-md">Password must be minimum 8 characters length*</div>

                <!-- ----------------------------Admon Confirm Password ----------------------  -->

                <label for="signUpPassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control <?= (isset($_SESSION['c_password_error']))?'is-invalid':'';?>" name="c_password" aria-describedby="signUpPassword" placeholder="Confirm Password" value="<?= (isset($_SESSION["Entered_name"])) ? $_SESSION["Entered_name"] : "";?>">
                    <?php if (isset($_SESSION['c_password_error'])) {?>
                    <div class="error text-danger"><?=$_SESSION['c_password_error']?></div>
                    <?php } unset($_SESSION['c_password_error']);?>
            </div>
            <div class="showpassword">
                <label for=""><input class="checkbox" type="checkbox" onclick="myFunction()">Show password</label>
            </div>
            <div class="auth-submit">
                <!-- <a href="#"  name="registerbtn">Sign Up</a> -->
                <button type="submit" class="btn btn-primary" name="registerbtn">Register</button>
            </div>

            </form>
            <script>function myFunction() {
                    var x = document.getElementById("showpass");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
    }</script>
            </div>
        </div>
    </div>
</div>
    <?php
    include("extends/footer.php");
?>