<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 13/02/2018
 * Time: 12:42
 */

require_once ("Database.php");

class Login
{
    protected $_dbHandle, $_dbInstance; //database variables

    public function __construct() //construcs the class and initialises a database connection
    {
        $this->_dbInstance = Database::getInstance(); //creates a new database instance
        $this->_dbHandle = $this->_dbInstance->getdbConnection(); //connects to the database
    }

    function login($varUserName, $varPassword) //login with parameters username and password
    {
        $sqlQuery = "SELECT password, userID FROM Users WHERE userName ='".$varUserName."'"; //selects password from the row with the value of the username
        $statement = $this->_dbHandle->prepare($sqlQuery); //gets the statement ready to put into the database
        $statement->execute(); //executes the query and adds the new value
        $result = $statement->fetchAll(); //returns all the results that match the statement
        $pass=$result[0]['password']; //checks the password at position 0

        if(password_verify($varPassword, $pass)) //makes sure the password is correct
        {
            if ($varUserName === "admin" or $varUserName === "Admin") //if the username is admin or Admin you will get admin privileges
            {
                session_start(); //starts a session
                $_SESSION['admin_user'] = true; //creates an admin session
                $_SESSION['userID'] = $result[0]['userID'];
                header('Location: index.php'); //returns you to the home page
            }
            else
            {
                session_start(); //starts a session
                $_SESSION['login_user'] = true; //creates a standard user session
                $_SESSION['userID'] = $result[0]['userID'];
                header('Location: index.php'); //returns you to the home page
            }
        }
        else
        {
            echo "Your Username or Password is incorrect."; //if the information provided is incorrect you can't login
        }
    }
}