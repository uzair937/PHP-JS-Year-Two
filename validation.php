<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 11/02/2018
 * Time: 15:27
 */
include ('Models/Calls.php');

function validRegistration($email, $password, $phoneNo, $postCode)
{
    $user = new User('null', $email, $phoneNo, 'null', $postCode, 'null', 'null', $password);
    $errorCheck = $user->validUser($email,$password,$phoneNo,$postCode);
    return $errorCheck;
}

function checkEmail($checkEmail, $errorCheck)
{
    if(!filter_Var($checkEmail, FILTER_VALIDATE_EMAIL))
    {
        $errorCheck = 'true';
        setcookie('registerError',"E-mail format is incorrect.");
    }
    return $errorCheck;
}

function checkPassword($checkPassword, $errorCheck)
{
    if ($checkPassword=="")
    {
        $errorCheck = 'true';
    }
    elseif (strtolower($checkPassword) == $checkPassword)
    {
        $errorCheck= 'true';
        setcookie('registerError', "Password needs at least one capital letter");
    }
    elseif (!preg_match('/\d/', $checkPassword))
    {
        $errorCheck = 'true';
        setcookie('registerError', "Password needs at least one number");
    }
    elseif (strlen($checkPassword)<7)
    {
        $errorCheck = 'true';
        setCookie('registerError', "Password must be at least 8 characters");
    }
    return $errorCheck;
}

function checkPostCode($checkPostCode, $errorCheck)
{
    $checkPostCode = preg_replace('/\s/', '', $checkPostCode);
    $checkPostCode = strtoupper($checkPostCode);

    if (preg_match("/^[A-Z]{1,2}[0-9]{2,3}[A-Z]{2}$/",$checkPostCode)
        || preg_match("/^[A-Z]{1,2}[0-9]{2,3}[A-Z]{2}$/", $checkPostCode)
        || preg_match("/^GIRO[A-Z]{2}$/", $checkPostCode))
    {
        //do nothing
    }
    else
    {
        $errorCheck = 'true';
        setcookie('registerError', "This Postcode is invalid.");
    }
    return $errorCheck;
}

function checkPhoneNo($checkPhoneNo, $errorCheck)
{
    if (preg_match('/[A-Z]/', $checkPhoneNo) || preg_match('/[a-z]/', $checkPhoneNo))
    {
        $errorCheck = 'true';
        setcookie('registerError', "Phone number is invalid");
    }
    elseif (strlen($checkPhoneNo) <=10 || strlen($checkPhoneNo) >=12)
    {
        $errorCheck = 'true';
        setcookie('registerError', "Phone number is invalid");
    }
    return $errorCheck;
}


?>