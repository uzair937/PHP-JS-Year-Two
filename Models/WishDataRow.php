<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 15/02/2018
 * Time: 17:35
 */
require_once ("Database.php"); //needs the database once.
class WishDataRow
{
    public $wID; //declares all variables required
    public $aID;
    public $carMan;
    public $carMod;

    public function __construct($tRow) //constructs the function with tRow being table row.
    {
        $this->wID = $tRow['wishlistID']; //sets the variable in this class to match the table row with x name.
        $this->aID = $tRow['advertID'];
        $this->carMan = $tRow['carManufacturer'];
        $this->carMod = $tRow['carModel'];
    }
}