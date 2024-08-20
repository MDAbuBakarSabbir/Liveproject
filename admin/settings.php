<?php
    include("main/extends/header.php");
    $user_query = "SELECT * FROM admins";
    $users = mysqli_query($db,$user_query);
?>
<!-- <title>Settings</title> -->
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Settings</h1>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['admin_up_success'])) { ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                    <span class="alert-title"><?= $_SESSION['author_name']; ?></span>
                    <span class="alert-title"><?= $_SESSION['admin_up_success']; ?></span>
                    </div>
                 </div>
                <?php } unset($_SESSION['admin_up_success'])?>
<form action="main/script/settings.php" method="POST" enctype="multipart/form-data">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Update Your Profile Picture</h4>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <input type="file" class="form-control <?= (isset($_SESSION['admin_pic_error'])) ? 'is-invalid' : ''?>" name="admin_img" placeholder="Sabbir Ahamed">
                            <div class="d-grid gap-2 col mx-auto my-3">
                            <?php if (isset($_SESSION['admin_pic_error'])) {?>
                            <div class="form-text m-b-md text-danger"><?= $_SESSION['admin_pic_error']?></div>
                            <?php } unset($_SESSION['admin_pic_error']);?>
                                <button class="btn btn-primary" name="adimgubtn" type="submit">Upload Picture</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>                 
    </div>
</form>
<form action="main/script/settings.php" method="POST">
<div class="row">
    <!-- Information Update section  -->
    <div class="col-6">
        <div class="card">
             <div class="card-header">
                <h4>Change Your Login Information</h4>
            </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label for="settingsInputFirstName" class="form-label">Full Name</label>
                            <input type="text" class="form-control <?= (isset($_SESSION['admin_name_error'])) ? 'is-invalid' : ''?>" name="admin_name" placeholder="Sabbir Ahamed">
                            <div class="d-grid gap-2 col mx-auto my-3">
                            <?php if (isset($_SESSION['admin_name_error'])) {?>
                            <div class="form-text m-b-md text-danger"><?= $_SESSION['admin_name_error']?></div>
                            <?php } unset($_SESSION['admin_name_error']);?>
                                <button class="btn btn-primary" name="adnameubtn" type="submit">Change Name</button>
                            </div>


                            <label for="settingsPhoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control <?= (isset($_SESSION['admin_phone_error'])) ? 'is-invalid' : ''?>" name="admin_phone" placeholder="+880 1xxx-xxxx">
                            <?php if (isset($_SESSION['admin_phone_error'])) {?>
                            <div class="form-text m-b-md text-danger"><?= $_SESSION['admin_phone_error']?></div>
                            <?php } unset($_SESSION['admin_phone_error']);?>
                            <div class="d-grid gap-2 col mx-auto my-3">
                                <button class="btn btn-primary" name="adphoneubtn" type="submit">Change Number</button>
                            </div>


                            <label for="settingsInputEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control <?= (isset($_SESSION['admin_email_error'])) ? 'is-invalid' : ''?>" name="admin_email" aria-describedby="settingsEmailHelp" placeholder="example@gmail.com">
                            <div id="settingsEmailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            <?php if (isset($_SESSION['admin_email_error'])) {?>
                            <div class="form-text m-b-md text-danger"><?= $_SESSION['admin_email_error']?></div>
                            <?php } unset($_SESSION['admin_email_error']);?>
                            <div class="d-grid gap-2 col mx-auto my-2">
                                <button class="btn btn-primary" name="ademailubtn" type="submit">Change Email</button>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>                 
    </div>
    <div class="col-6">
        <!-- Password change  -->

        <div class="card">
            <div class="card-header">
                <h4>Change Your Login Password</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <!-- <div class="settings-security-two-factor ">
                            <h5>Two-Factor Authentication</h5>
                            <span>Two-factor authentication is automatically enabled on your account, for security reasons we require all users to authenticate with SMS code or authorized third-party auth apps. Read more about our security policy <a href="#">here</a>.</span>
                        </div> -->
                        <label for="settingsInputFirstName" class="form-label my-3">Current Password</label>
                        <input type="password" class="form-control <?= (isset($_SESSION['oldpass_error'])) ? 'is-invalid' : ''?>" aria-describedby="settingsCurrentPassword" placeholder="Old Password" name="oldpass">
                        <?php if (isset($_SESSION['oldpass_error'])) {?>
                        <div class="form-text m-b-md text-danger"><?= $_SESSION['oldpass_error']?></div>
                        <?php } unset($_SESSION['oldpass_error']);?>
                        

                        <label for="settingsNewPassword" class="form-label my-2">New Password</label>
                        <input type="password" class="form-control <?= (isset($_SESSION['newpass_error'])) ? 'is-invalid' : ''?>" aria-describedby="settingsNewPassword" placeholder=" New Password" name="newpass">
                        <?php if (isset($_SESSION['newpass_error'])) {?>
                        <div class="form-text m-b-md text-danger"><?= $_SESSION['newpass_error']?></div>
                        <?php } unset($_SESSION['newpass_error']);?>

                        <label for="settingsConfirmPassword" class="form-label my-2">Confirm Password</label>
                        <input type="password" class="form-control <?= (isset($_SESSION['c_pass_error'])) ? 'is-invalid' : ''?>" aria-describedby="settingsConfirmPassword" placeholder="Confirm New Password" name="c_newpass">
                        <?php if (isset($_SESSION['c_pass_error'])) {?>
                        <div class="form-text m-b-md text-danger"><?= $_SESSION['c_pass_error']?></div>
                        <?php } unset($_SESSION['c_pass_error']);?>

                        <div id="settingsCurrentPassword" class="form-text">Never share your password with anyone.</div>
                        <div class="d-grid gap-2 col mx-auto my-3">
                            <button class="btn btn-primary" name="passubtn" type="submit">Change Password</button>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<?php
include("./main/extends/footer.php");

?>
