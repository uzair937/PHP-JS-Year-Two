<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 15/02/2018
 * Time: 15:09
 */
include("UserData.php");
include("UserDataRow.php");
class UserDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct() //constructs the class and connects to the database
    {
        $this->_dbInstance = Database::getInstance(); //creates a new database instance
        $this->_dbHandle = $this->_dbInstance->getdbConnection(); //connects to the database
    }

    public function addUser($userData)
    {
        //$userData = new UserData();
        $database = $this->_dbInstance; //initiates a new database
        $query = $this->_dbHandle->prepare("INSERT INTO Users VALUES(:uID,:uName,:fName,:sName,:email,:phone,:addr1,:addr2,:PC,:city,:pass)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        //the code above inserts the values into the database
        $query->execute(array(':uID'=>$userData->userID, ':uName'=>$userData->userName, ':fName'=>$userData->firstName, ':sName'=>$userData->surName, ':email'=>$userData->email, ':phone'=>$userData->phoneNo, ':addr1'=>$userData->address1, ':addr2'=>$userData->address2, ':city'=>$userData->city, ':PC'=>$userData->postcode, ':pass'=>$userData->password));
        //the code above renames variables as this will aid in preventing against injection attacks to the site
        $database->__destruct();//closes the database connection
    }

    public function viewUsers() //allows the viewing of users on the admin account
    {
        $query = 'SELECT * FROM Users'; //selects all the users
        $query = $this->_dbHandle->prepare($query); //prepares the query for the database
        $query->execute(); //executes the query

        $userSet = []; //creates an array userset
        while ($row = $query->fetch()) //while the row is equal to the fecth query
        {
            $userSet[] = new UserDataRow($row); //creates a new userdatarow object
        }
        return $userSet; //returns userset
    }

    public function validUser($email, $password, $phoneNo, $postcode)
    {
        $query = $this->_dbHandle->prepare("SELECT userID FROM Users WHERE email='".$email."'");
        $errorCheck = $query->execute(array(':email'=>$email));

        if($errorCheck!='')
        {
            $errorCheck = 'true';
        }
        else
        {
            $errorCheck = 'false';
        }

        $errorCheck = checkEmail($email, $errorCheck);
        $errorCheck = checkPassword($password, $errorCheck);
        $errorCheck = checkPhoneNo($phoneNo, $errorCheck);
        $errorCheck = checkPostCode($postcode, $errorCheck);

        return $errorCheck;
    }
}