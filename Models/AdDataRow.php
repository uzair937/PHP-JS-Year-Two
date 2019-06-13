<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 15/02/2018
 * Time: 17:35
 */
require_once ("Database.php"); //needs the database once.
class AdDataRow
{
    public $adID; //declares all variables required
    public $carMan;
    public $carMod;
    public $yr;
    public $mile;
    public $fuel;
    public $eng;
    public $cash;
    public $cn;
    public $adImg;

    public function __construct($tRow) //constructs the function with tRow being table row.
    {
        $this->adID = $tRow['advertID']; //sets the variable in this class to match the table row with x name.
        $this->carMan = $tRow['carManufacturer'];
        $this->carMod = $tRow['carModel'];
        $this->yr = $tRow['year'];
        $this->mile = $tRow['mileage'];
        $this->fuel = $tRow['fuelType'];
        $this->eng = $tRow['engineSize'];
        $this->cash = $tRow['price'];
        $this->cn = $tRow['contactNumber'];
        $this->adImg = $tRow['adImage'];
    }
}