<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 15/02/2018
 * Time: 15:13
 */
include("AdvertData.php"); //needs to make use of these two classes and methods.
include("AdDataRow.php");
class AdvertDataSet
{
    protected $_dbHandle, $_dbInstance;

    public function __construct() //constructs the class which connects to the database
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function addAdvert($advertData) //adds a new advert to the database
    {
        $database = $this->_dbInstance; //initiates a new database
        $query = $this->_dbHandle->prepare("INSERT INTO Adverts VALUES(:aID,:cMan,:cMod,:yr,:miles,:fuelT,:eSize,:cash,:contact,:img, :wl)", array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        //the code above inserts the values into the database
        $query->execute(array(':aID'=>$advertData->advertID, ':cMan'=>$advertData->carManufacturer, ':cMod'=>$advertData->carModel, ':yr'=>$advertData->year, ':miles'=>$advertData->mileage, ':fuelT'=>$advertData->fuelType, ':eSize'=>$advertData->engineSize, ':cash'=>$advertData->price, ':contact'=>$advertData->contactNumber, ':img'=>$advertData->adImage, ':wl'=>$advertData->wishList));
        //the code above renames variables as this will aid in preventing against injection attacks to the site
        $database->__destruct();//closes the database connection
    }

    public function viewAdvert() //allows the user to view adverts on the browse page
    {
        $query = 'SELECT * FROM Adverts'; //selects all values from advert
        $query = $this->_dbHandle->prepare($query); //this gets the query ready to insert into the database
        $query->execute(); //the query goes into the database creating new data

        $adSet = []; //array of adSet
        while ($row = $query->fetch()) //goes through each row
        {
            $adSet[] = new AdDataRow($row); //creates a new addatarow class with row as the parameter
        }
        return $adSet; //returns the value of the array
    }

    public function adSearch($searchTerm) //allows the user to search for adverts
    {
        $query = "SELECT * FROM Adverts WHERE carManufacturer LIKE '%".$searchTerm."%' OR carModel LIKE '%".$searchTerm."%'";

        $query = $this->_dbHandle->prepare($query);
        $query->execute();

        $adSet = []; //array of adSet
        while ($row = $query->fetch()) //goes through each row
        {
            $adSet[] = new AdDataRow($row); //creates a new addatarow class with row as the parameter
        }
        return $adSet;
    }
}