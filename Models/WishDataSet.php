<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 15/02/2018
 * Time: 15:13
 */
include("WishData.php"); //needs to make use of these two classes and methods.
include("WishDataRow.php");
class WishDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct() //constructs the class which connects to the database
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function addWish($wishData) //adds an item to the wishlist table
    {
        $database = $this->_dbInstance; //initiates a new database
        $query = $this->_dbHandle->prepare("INSERT INTO Wishlist VALUES(:wID, :uID, :aID)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        //the code above inserts the values into the database
        $query->execute(array(':wID'=>$wishData->wishID, ':uID'=>$wishData->userID, ':aID'=>$wishData->advertID));
        //the code above renames variables as this will aid in preventing against injection attacks to the site
        $database->__destruct();//closes the database connection
    }

    public function viewWishList() //allows the user to view items on the wishlist
    {
        $query = "SELECT * FROM Wishlist WHERE userID='".$_SESSION['userID']."'"; //selects values from the wishlist table where the user id is equal to the current logged in user
        $query = $this->_dbHandle->prepare($query); //this gets the query ready to insert into the database
        $query->execute(); //the query goes into the database creating new data

        $wishSet = []; //array of wishSet
        while ($row = $query->fetch()) //goes through each row
        {
            $wishSet[] = new WishDataRow($row); //creates a new wishdatarow class with row as the parameter
        }
        return $wishSet; //returns the value of the array
    }
}