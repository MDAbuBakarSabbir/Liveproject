<?php
session_start();
include("../../config/dbconnection.php");
$woner_query = "SELECT * FROM woner";
$connect = mysqli_query($db, $woner_query);
$woner = mysqli_fetch_assoc($connect);

// name update code ------------------------

if (isset($_POST['nameubtn'])) {
    $name = $_POST['profilename'];
    $username_regex = '/^(?! $)[a-zA-Z ]*$/';
    
    if (!$name) {
        $_SESSION['name_error'] = "*Name requred";
        header("location:../../profile.php");
    }elseif (!preg_match($username_regex,$name)) {
        $flag = true;
        $_SESSION['name_error'] = "This name can not be taken";
        header("location:../../profile.php");
    }else{
        $name_query = "UPDATE woner SET name='$name'";
        mysqli_query($db,$name_query);
        $_SESSION['updatesuccess'] = " Name Update Successfull.";
        // $_SESSION["woner_name"] = $name;
        header("location:../../profile.php");
    }
}

// Phone number update code ---------------------------

if (isset($_POST["phoneubtn"])) {
    $phone = $_POST["phone_no"];
    $phone_regex = '/^\+880\d{10}$/';
    if (!$phone) {
        $_SESSION['Phone_error'] = "*Phone Number requred";
        header("location:../../profile.php");
    }
    elseif (!preg_match($phone_regex,$phone)) {
        $flag = true;
        $_SESSION['Phone_error'] = "Enter phone number with Country Codes";
        header("location:../../profile.php");
    }
    else{
        $phone_query = "UPDATE woner SET phone='$phone'";
        mysqli_query($db,$phone_query);
        $_SESSION['updatesuccess'] = " Phone Number Update Successfull.";
        header("location:../../profile.php");
    }
}


// SHort description code -------------------------------

if (isset($_POST['desubtn'])) {
    $shortdes = $_POST['shortdes'];
    if (!$shortdes) {
        $_SESSION['descrip_error'] = "*Short Description requred";
        header("location:../../profile.php");
    }
    // elseif (!preg_match($username_regex,$name)) {
    //     $flag = true;
    //     $_SESSION['descrip_error'] = "Maximum 100 charecter !!";
    //     header("location:../../profile.php");
    // }
    else{
        $shortdes_query = "UPDATE woner SET short_des='$shortdes'";
        mysqli_query($db,$shortdes_query);
        $_SESSION['updatesuccess'] = " Short Description Update Successfull.";
        header("location:../../profile.php");
    }
}


// Email update code ---------------------------------------------

if (isset($_POST['emailubtn'])) {
    $email = $_POST['email_up'];
    $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    if (!$email) {
        $_SESSION['email_error'] = "*Valid Email requred";
        header("location:../../profile.php");
    }elseif (!preg_match($email_regex,$email)) {
        $flag = true;
        $_SESSION['email_error'] = "This Email Is Not Valid !!";
        header("location:../../profile.php");
    }else{
        $email_query = "UPDATE woner SET email='$email'";
        mysqli_query($db,$email_query);
        $_SESSION['updatesuccess'] = " Email Update Successfull.";
        header("location:../../profile.php");
    }
}

// Facebook link update code -----------------------------------------

if (isset($_POST['fblinkbtn'])) {
    $fblink = $_POST['fblink'];
    if (!$fblink) {
        $_SESSION['fblink_error'] = "*Currect Facebook Link requred";
        header("location:../../profile.php");
    }else{
        $fblink_query = "UPDATE woner SET fblink='$fblink'";
        mysqli_query($db,$fblink_query);
        $_SESSION['updatesuccess'] = " Facebook Update Successfull.";
        header("location:../../profile.php");
    }
}

// Twitter update code -------------------------------------------

if (isset($_POST['twitlinkbtn'])) {
    $twitlink = $_POST['twitlink'];
    if (!$twitlink) {
        $_SESSION['twitlink_error'] = "*Currect Twitter Link requred";
        header("location:../../profile.php");
    }else{
        $twitlink_query = "UPDATE woner SET twitlink='$twitlink'";
        mysqli_query($db,$twitlink_query);
        $_SESSION['updatesuccess'] = " Twitter Update Successfull.";
        header("location:../../profile.php");
    }
}

// Instagram update code ------------------------------------------

if (isset($_POST['instalinkbtn'])) {
    $instalink = $_POST['instalink'];
    if (!$instalink) {
        $_SESSION['instalink_error'] = "*Currect Instagram Link requred";
        header("location:../../profile.php");
    }else{
        $instalink_query = "UPDATE woner SET instalink='$instalink'";
        mysqli_query($db,$instalink_query);
        $_SESSION['updatesuccess'] = " Instagram Update Successfull.";
        header("location:../../profile.php");
    }
}

// Pinterest update code -------------------------------------------

if (isset($_POST['pintrstlinkbtn'])) {
    $pinterestlink = $_POST['pintrstlink'];
    if (!$pintrstlink) {
        $_SESSION['pintrstlink_error'] = "*Currect Pinterest Link requred";
        header("location:../../profile.php");
    }else{
        $pinterestlink_query = "UPDATE woner SET pinterestlink='$pinterestlink'";
        mysqli_query($db,$pinterestlink_query);
        $_SESSION['updatesuccess'] = " Pinterest Update Successfull.";
        header("location:../../profile.php");
    }
}

// Address update code ----------------------------------------------

if (isset($_POST['addressubtn'])) {
    $address = $_POST['address'];
    if (!$address) {
        $_SESSION['address_error'] = "*Proper Address requred";
        header("location:../../profile.php");
    }else{
        $address_query = "UPDATE woner SET address='$address'";
        mysqli_query($db,$address_query);
        $_SESSION['updatesuccess'] = " Address Update Successfull.";
        header("location:../../profile.php");
    }
}

// ------------- First Picture Update code ---------------

if (isset($_POST["firstimgubtn"])) {
    $first_img = $_FILES["first_img"]['name'];
    $temp_path = $_FILES['first_img']['tmp_name'];
    $name = $woner['name'];

    if ($first_img) {
        $imgexplode = explode('.', $first_img);
        $extention = end($imgexplode);
        $img_name = "first-image-" . $name . "-". date("d-m-Y") .".". $extention;
        $local_path = "../../../frontend/img/my_image/uploads/". $img_name;

        if (move_uploaded_file($temp_path, $local_path)) {
            $firstimg_query = "UPDATE woner SET first_img='$img_name'";
            mysqli_query($db,$firstimg_query);
            $_SESSION['updatesuccess'] = " First Image Update Successfull.";
            header("location:../../profile.php"); 
        }
    }else {
        $_SESSION['firstimg_error'] = "*Choise a image to upload";
        header("location:../../profile.php"); 
    }

}

// ---------------------About me image update code -----------------------------

if (isset($_POST["aboutimgubtn"])) {
    $first_img = $_FILES["about_img"]['name'];
    $temp_path = $_FILES['about_img']['tmp_name'];
    $name = $woner['name'];

    if ($first_img) {
        $imgexplode = explode('.', $first_img);
        $extention = end($imgexplode);
        $img_name = "aboutme-image-" . $name . "-". date("d-m-Y") .".". $extention;
        $local_path = "../../../frontend/img/my_image/uploads/". $img_name;

        if (move_uploaded_file($temp_path, $local_path)) {
            $aboutimg_query = "UPDATE woner SET aboutme_img='$img_name'";
            mysqli_query($db,$aboutimg_query);
            $_SESSION['updatesuccess'] = " About Me Image Update Successfull.";
            header("location:../../profile.php"); 
        }
    }else {
        $_SESSION['aboutimg_error'] = "*Choise a image to upload";
        header("location:../../profile.php"); 
    }

}


// -------------------About me-------------------------------

if (isset($_POST['aboutdesubtn'])) {
    $aboutme_des = $_POST['aboutme_des'];
    if (!$aboutme_des) {
        $_SESSION['aboutme_des_error'] = "*About Me Introduction requred";
        header("location:../../profile.php");
    }
    else{
        $shortdes_query = "UPDATE woner SET aboutme_des='$aboutme_des'";
        mysqli_query($db,$shortdes_query);
        $_SESSION['updatesuccess'] = " About ME Description Update Successfull.";
        header("location:../../profile.php");
    }
}


// ----------------Skills update Code -------------

// -----Skill 1 Name-----------

if (isset($_POST['skill_1btn'])) {

    $skill_1 = $_POST['skill_1'];
    if (!$skill_1) {
        $_SESSION['skill_1_error'] = "*Skill Name requred!!";
        header("location:../../profile.php");
    }
    else{
        $skill_1_query = "UPDATE woner SET skill1_name='$skill_1'";
        mysqli_query($db,$skill_1_query);
        $_SESSION['updatesuccess'] = " Your Skill 1 name Update Successfull.";
        header("location:../../profile.php");
    }
}


// Skill 2 name---------------

if (isset($_POST['skill_2btn'])) {

    $skill_2 = $_POST['skill_2'];
    if (!$skill_2) {
        $_SESSION['skill_2_error'] = "*Skill Name requred!!";
        header("location:../../profile.php");
    }
    else{
        $skill_2_query = "UPDATE woner SET skill2_name='$skill_2'";
        mysqli_query($db,$skill_2_query);
        $_SESSION['updatesuccess'] = " Your Skill 2 name Update Successfull.";
        header("location:../../profile.php");
    }
}

// -------Skill 3 name ------------

if (isset($_POST['skill_3btn'])) {

    $skill_3 = $_POST['skill_3'];
    if (!$skill_3) {
        $_SESSION['skill_3_error'] = "*Skill Name requred!!";
        header("location:../../profile.php");
    }
    else{
        $skill_2_query = "UPDATE woner SET skill3_name='$skill_3'";
        mysqli_query($db,$skill_3_query);
        $_SESSION['updatesuccess'] = " Your skill 3 name Update Successfull.";
        header("location:../../profile.php");
    }
}

// -----------Others Skills name----------

if (isset($_POST['others_skillsbtn'])) {

    $others_skills = $_POST['others_skills'];
    if (!$others_skills) {
        $_SESSION['others_skills_error'] = "*Skill Name requred!!";
        header("location:../../profile.php");
    }
    else{
        $others_skills_query = "UPDATE woner SET others_skills_name='$others_skills'";
        mysqli_query($db,$others_skills_query);
        $_SESSION['updatesuccess'] = " Your Others Skills Name Update Successfull.";
        header("location:../../profile.php");
    }
}

// --------------------Skill % ------------------------

// Skill 1 ------------------------

if (isset($_POST['skill_1%btn'])) {

    $skill_1av = $_POST['skill_1%'];
    if (!$skill_1av) {
        $_SESSION['skill_1%_error'] = "*Skill Name requred!!";
        header("location:../../profile.php");
    }
    else{
        $skill_1av_query = "UPDATE woner SET skill_1='$skill_1av'";
        mysqli_query($db,$skill_1av_query);
        $_SESSION['updatesuccess'] = " Your Others Skills Name Update Successfull.";
        header("location:../../profile.php");
    }
}

// Skill 2-------------

if (isset($_POST['skill_2%btn'])) {

    $skill_2av = $_POST['skill_2%'];
    if (!$skill_2av) {
        $_SESSION['skill_2_error'] = "*Skills % requred!!";
        header("location:../../profile.php");
    }
    else{
        $skill_2av_query = "UPDATE woner SET skill_2='$skill_2av'";
        mysqli_query($db,$skill_2av_query);
        $_SESSION['updatesuccess'] = " Your Skills % Update Successfull.";
        header("location:../../profile.php");
    }
}

// Skill 3-------------

if (isset($_POST['skill_3%btn'])) {

    $skill_3av = $_POST['skill_3%'];
    if (!$skill_3av) {
        $_SESSION['skill_3_error'] = "*Skill % requred!!";
        header("location:../../profile.php");
    }
    else{
        $others_skills_query = "UPDATE woner SET skill_3='$skill_3av'";
        mysqli_query($db,$others_skills_query);
        $_SESSION['updatesuccess'] = " Your Skills % Update Successfull.";
        header("location:../../profile.php");
    }
}

// others skills-----------------

if (isset($_POST['otherskill_1%btn'])) {

    $other_skillsav = $_POST['otherskill_%'];
    if (!$other_skillsav) {
        $_SESSION['other_skillsav_error'] = "*Skill % requred!!";
        header("location:../../profile.php");
    }
    else{
        $others_skills_query = "UPDATE woner SET others_skill='$other_skillsav'";
        mysqli_query($db,$other_skillsav_query);
        $_SESSION['updatesuccess'] = " Your Others Skills % Update Successfull.";
        header("location:../../profile.php");
    }
}


?>