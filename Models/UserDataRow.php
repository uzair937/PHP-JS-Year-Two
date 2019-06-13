<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 15/02/2018
 * Time: 23:47
 */

require_once ("Database.php"); //requires the database class once
class UserDataRow
{
    public $uID; //declares all variables required
    public $uName;
    public $fName;
    public $sName;
    public $mail;
    public $number;
    public $add1;
    public $add2;
    public $city;
    public $pcode;
    public $pword;

    public function __construct($tRow) //creates a userdatarow with $tRow being the table row
    {
        $this->uID = $tRow['userID']; //sets the values of variables in the class from the database based on the table row value
        $this->uName = $tRow['userName'];
        $this->fName = $tRow['firstName'];
        $this->sName = $tRow['surName'];
        $this->mail = $tRow['email'];
        $this->number = $tRow['phoneNo'];
        $this->add1 = $tRow['address1'];
        $this->add2 = $tRow['address2'];
        $this->city = $tRow['city'];
        $this->pcode = $tRow['postcode'];
        $this->pword = $tRow['password'];
    }
}