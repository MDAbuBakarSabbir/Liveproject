<?php
// session_start();
    include("main/extends/header.php");
    $user_query = "SELECT * FROM admins";
    $users = mysqli_query($db,$user_query);
?>
<title>Profile</title>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Profile</h1>
        </div>
                <!-- Button trigger modal -->
                <!-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch
                </button> -->

                <!-- Modal -->
                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Successfull</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <?php if (isset($_SESSION['updatesuccess'])) { ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                    <span class="alert-title"><?= $_SESSION['author_name']; ?></span>
                    <span class="alert-title"><?= $_SESSION['updatesuccess']; ?></span>
                    </div>
                 </div>
                <?php } unset($_SESSION['updatesuccess'])?>
        <div class="row">
            <div class="col">
                        <!-- Name and Description Update section  -->
                        <form action="main/script/profile.php" method="post">
                        <div class="card">
                            <div class="card-header">
                                <h4>Update Your Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <label for="settingsInputFirstName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : ''?>" name="profilename" placeholder="Sabbir Ahamed">
                                        <?php if (isset($_SESSION['name_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['name_error']?></div>
                                        <?php } unset($_SESSION['name_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="nameubtn" type="submit">Update</button>
                                        </div>

                                        <label for="settingsInputLastName" class="form-label my-2">Short Description </label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['descrip_error'])) ? 'is-invalid' : ''?>" name="shortdes" placeholder="About yourself shortly">
                                        <?php if (isset($_SESSION['descrip_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['descrip_error']?></div>
                                        <?php } unset($_SESSION['descrip_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="desubtn" type="submit">Update</button>
                                        </div>

                                        <label for="settingsInputEmail" class="form-label my-2">Facebook link</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['fblink_error'])) ? 'is-invalid' : ''?>" name="fblink" aria-describedby="settingsEmailHelp" placeholder="example@neptune.com">
                                        <?php if (isset($_SESSION['fblink_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['fblink_error']?></div>
                                        <?php } unset($_SESSION['fblink_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="fblinkbtn" type="submit">Update</button>
                                        </div>

                                        <label for="settingsInputEmail" class="form-label my-2">Instagram Link</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['instalink_error'])) ? 'is-invalid' : ''?>" name="instalink" aria-describedby="settingsEmailHelp" placeholder="example@neptune.com">
                                        <?php if (isset($_SESSION['instalink_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['instalink_error']?></div>
                                        <?php } unset($_SESSION['instalink_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="instalinkbtn" type="submit">Update</button>
                                        </div>  
                                    </div>

                                    <div class="col-md-6">
                                        <label for="settingsPhoneNumber" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['Phone_error'])) ? 'is-invalid' : ''?>" name="phone_no" placeholder="(+880) 1xxx-xxxxx">
                                        <?php if (isset($_SESSION['Phone_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['Phone_error']?></div>
                                        <?php } unset($_SESSION['Phone_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="phoneubtn" type="submit">Update</button>
                                        </div>

                                        <label for="settingsInputEmail" class="form-label my-2">Email address</label>
                                        <input type="email" class="form-control <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : ''?>" name="email_up" aria-describedby="settingsEmailHelp" placeholder="example@neptune.com">
                                        <?php if (isset($_SESSION['email_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['email_error']?></div>
                                        <?php } unset($_SESSION['email_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="emailubtn" type="submit">Update</button>
                                        </div>

                                        <label for="settingsInputEmail" class="form-label my-2">Twitter Link</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['twitlink_error'])) ? 'is-invalid' : ''?>" name="twitlink" aria-describedby="settingsEmailHelp" placeholder="example@neptune.com">
                                        <?php if (isset($_SESSION['twitlink_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['twitlink_error']?></div>
                                        <?php } unset($_SESSION['twitlink_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="twitlinkbtn" type="submit">Update</button>
                                        </div>
                                        <label for="settingsInputEmail" class="form-label my-2">Pinterest</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['pintrstlink_error'])) ? 'is-invalid' : ''?>" name="pintrstlink" aria-describedby="settingsEmailHelp" placeholder="example@neptune.com">
                                        <?php if (isset($_SESSION['pintrstlink_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['pintrstlink_error']?></div>
                                        <?php } unset($_SESSION['pintrstlink_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="pintrstlinkbtn" type="submit">Update</button>
                                        </div>  
                                    </div>
                                    <div class="col">
                                        <label for="settingsInputEmail" class="form-label my-2">Address</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['address_error'])) ? 'is-invalid' : ''?>" name="address" aria-describedby="settingsEmailHelp" placeholder="House, Road, City, Country">
                                        <?php if (isset($_SESSION['address_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['address_error']?></div>
                                        <?php } unset($_SESSION['address_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="addressubtn" type="submit">Update</button>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        </form>
                        
                        <!-- Picture  Update section  -->
                        <form action="main/script/profile.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h4>Update Your Picture</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="settingsInputFirstName" class="form-label">First Picture</label>
                                        <input type="file" class="form-control"  name="first_img"> 
                                        <div id="emailHelp" class="form-text">Image size : height: 850px, width: 600px for better output</div>
                                        <?php if (isset($_SESSION['firstimg_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['firstimg_error']?></div>
                                        <?php } unset($_SESSION['firstimg_error']);?>                 
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="firstimgubtn" type="submit">Upload</button>
                                        </div> 
                                    </div>
                                <!------------About me picture update ------------>
                                    <div class="col-6">
                                    <label for="settingsPhoneNumber" class="form-label">About ME Picture</label>
                                        <input type="file" class="form-control" id="settingsPhoneNumber" name="about_img">
                                        <div id="emailHelp" class="form-text">Image size : height: 635px,width: 434px for better output</div>
                                        <?php if (isset($_SESSION['aboutimg_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['aboutimg_error']?></div>
                                        <?php } unset($_SESSION['aboutimg_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="aboutimgubtn" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                        <!-- About Me section  -->

                        <form action="main/script/profile.php" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h4>Update About Me And Skills</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <label for="settingsAbout" class="form-label">Introduction</label>
                                        <textarea class="form-control" name="aboutme_des"  maxlength="500" rows="4" aria-describedby="settingsAboutHelp" style="height: 165px;" placeholder="Introduction About your Self.."></textarea>
                                        <div id="emailHelp" class="form-text">Brief information about you to display on profile (max: 500 characters)</div> 
                                        <?php if (isset($_SESSION['aboutme_des_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['aboutme_des_error']?></div>
                                        <?php } unset($_SESSION['aboutme_des_error']);?>           
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="aboutdesubtn" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>

                                <!--------------Skills Section --------------->

                            <div class="row">
                                <div class="col-6">
                                    <label for="settingsPhoneNumber" class="form-label"> Skills - 1 Name</label>
                                        <input type="text" class="form-control" name="skill_1" placeholder="Skills">
                                        <?php if (isset($_SESSION['skill_1_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['skill_1_error']?></div>
                                        <?php } unset($_SESSION['skill_1_error']);?>  
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="skill_1btn" type="submit">Update</button>
                                        </div> 

                                    <label for="settingsPhoneNumber" class="form-label"> Skills - 2 Name</label>
                                        <input type="text" class="form-control" id="settingsPhoneNumber" placeholder="Skills">
                                        <?php if (isset($_SESSION['skill_2_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['skill_2_error']?></div>
                                        <?php } unset($_SESSION['skill_2_error']);?>  
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="skill_2btn" type="submit">Update</button>
                                        </div> 

                                    <label for="settingsPhoneNumber" class="form-label"> Skills - 3 Name</label>
                                        <input type="text" class="form-control" id="settingsPhoneNumber" placeholder="Skills">
                                        <?php if (isset($_SESSION['skill_3_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['skill_3_error']?></div>
                                        <?php } unset($_SESSION['skill_3_error']);?>  
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="skill_3btn" type="submit">Update</button>
                                        </div> 

                                    <label for="settingsPhoneNumber" class="form-label"> Others Skills Name</label>
                                        <input type="text" class="form-control" id="settingsPhoneNumber" placeholder="Skills">
                                        <?php if (isset($_SESSION['others_skills_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['others_skills_error']?></div>
                                        <?php } unset($_SESSION['others_skills_error']);?>  
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="others_skillsbtn" type="submit">Update</button>
                                        </div> 
                                    </div>
                                            <!-------------Skills % -------------->
                                <div class="col-6">
                                    <label for="settingsPhoneNumber" class="form-label"> Skills - 1 </label>
                                        <input type="text" class="form-control" id="settingsPhoneNumber" name="skill_1%" placeholder="%">
                                        <?php if (isset($_SESSION['skill_1%_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['skill_1%_error']?></div>
                                        <?php } unset($_SESSION['skill_1%_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="skill_1%btn" type="submit">Update</button>
                                        </div> 

                                    <label for="settingsPhoneNumber" class="form-label"> Skills - 2 </label>
                                        <input type="text" class="form-control" id="settingsPhoneNumber" name="skill_2%" placeholder="%">
                                        <?php if (isset($_SESSION['skill_2%_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['skill_2%_error']?></div>
                                        <?php } unset($_SESSION['skill_2%_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="skill_2%btn" type="submit">Update</button>
                                        </div> 

                                    <label for="settingsPhoneNumber" class="form-label"> Skills - 3 </label>
                                        <input type="text" class="form-control" id="settingsPhoneNumber" name="skill_3%" placeholder="%">
                                        <?php if (isset($_SESSION['skill_3%_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['skill_3%_error']?></div>
                                        <?php } unset($_SESSION['skill_3%_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="skill_3%btn" type="submit">Update</button>
                                        </div> 

                                    <label for="settingsPhoneNumber" class="form-label"> Others Skills</label>
                                        <input type="text" class="form-control" id="settingsPhoneNumber" name="otherskill_%" placeholder="%">
                                        <?php if (isset($_SESSION['other_skillsav_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['other_skillsav_error']?></div>
                                        <?php } unset($_SESSION['other_skillsav_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="otherskill_1%btn" type="submit">Update</button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                        <!-- Services section  -->

                        <div class="card">
                            <div class="card-header">
                                <h4>Services</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="settingsAbout" class="form-label">Introduction</label>
                                        <textarea class="form-control" id="settingsAbout" maxlength="500" rows="4" aria-describedby="settingsAboutHelp" style="height: 165px;">Write from here....</textarea>
                                        <div id="emailHelp" class="form-text">Brief information about you to display on profile (max: 500 characters)</div>                  
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" type="button">Update</button>
                                        </div>
                                        <label for="settingsPhoneNumber" class="form-label"> Educaional Qualification</label>
                                        <input type="text" class="form-control" id="settingsPhoneNumber" placeholder="BSC,PhD">
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" type="button">Update</button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Works -->

                    <div class="card">
                        <div class="card-header">
                            <h4>Recent Best Works</h4>
                        </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="settingsAbout" class="form-label">Introduction</label>
                                <textarea class="form-control" id="settingsAbout" maxlength="500" rows="4" aria-describedby="settingsAboutHelp" style="height: 165px;">Write from here....</textarea>
                                <div id="emailHelp" class="form-text">Brief information about you to display on profile (max: 500 characters)</div>                  
                                <div class="d-grid gap-2 col mx-auto my-3">
                                    <button class="btn btn-primary" type="button">Update</button>
                                </div>
                                <label for="settingsPhoneNumber" class="form-label"> Educaional Qualification</label>
                                <input type="text" class="form-control" id="settingsPhoneNumber" placeholder="BSC,PhD">
                                <div class="d-grid gap-2 col mx-auto my-3">
                                    <button class="btn btn-primary" type="button">Update</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include("./extends/footer.php");

?>