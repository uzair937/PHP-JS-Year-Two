<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 06/02/2018
 * Time: 11:11
 */

include("UserDataSet.php"); //includes userdataset
include("AdvertDataSet.php"); //includes advertdataset

//user registration form

if(isset($_POST['email'])) { //checks if the form has an "email" input
    $userID = uniqid("Acc", false); //gives every new ID an appendix of "Acc"
    $varUname = ($_POST['userName']); //posts into username
    $varFname = ($_POST['firstName']); //posts into first name
    $varSname = ($_POST['surName']); //posts into password
    $varEmail = ($_POST['email']); //posts into email
    $varPhone = ($_POST['phoneNo']); //posts into phoneno
    $varAddress1 = ($_POST['address1']); //posts into address 1
    $varAddress2 = ($_POST['address2']); //posts into address 2
    $varCity = ($_POST['city']); //posts into city
    $varPostcode = ($_POST['postCode']); //posts into postcode
    $varPassword = ($_POST['password']); //posts into password

    $hashPassword = password_hash($varPassword, PASSWORD_DEFAULT); //hashes the password so that it isn't viewable in the database
    $user = new UserData($userID, $varUname, $varFname, $varSname, $varEmail, $varPhone, $varAddress1, $varAddress2, $varCity, $varPostcode, $hashPassword);
    //creates a new userdata file and calls all the variables needed
    $userDataSet = new UserDataSet(); //creates a new userdataset
    $userDataSet->addUser($user); //adds the data using the adduser call
}

//new advert form

elseif (isset($_POST['year'])) { //checks if the form has a "year" input
    $advertID = uniqid("Ad", false); //gives every new ID an appenfix of "Ad"
    $varCman = ($_POST['carMan']); //posts into car manufacturer
    $varCmod = ($_POST['carMod']); //posts into car model
    $varYear = ($_POST['year']); //posts into year
    $varMileage = ($_POST['mileage']); //posts into mileage
    $varFueltype = ($_POST['fuelType']); //posts into fueltype
    $varEnginesize = ($_POST['engineSize']); //posts into enginesize
    $varPrice = ($_POST['price']); //posts into price
    $varContactNo = ($_POST['contactNumber']); //posts into contactnumber
    $varImageName = ($_FILES['adImage']['tmp_name']); //posts into adimage and temporarily creates a name
    $varImageName2 = substr($varImageName,8); //posts the image name into the database
    $varWishList = ($_POST['wishList']);
    echo $_SERVER['DOCUMENT_ROOT'].'\uploads'.$varImageName; //echo's the location of the upload
    move_uploaded_file($_FILES['adImage']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].$varImageName2); //uploads the image but unfortunately as a .tmp file

    $advert = new AdvertData($advertID, $varCman, $varCmod, $varYear, $varMileage, $varFueltype, $varEnginesize, $varPrice, $varContactNo, $varImageName, $varWishList);
    //creates a new advertdata file and calls all the variables needed
    $advertDataSet = new AdvertDataSet(); //creates a new advertdataset
    $advertDataSet->addAdvert($advert); //adds the data using the addadvert call

    echo "
        <a href='../browse.php'>Click here to see adverts.</a>"; //let's you view adverts after you post yours
    //header('Location: ../browse.php');
}