<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 15/02/2018
 * Time: 15:12
 */
require_once("Database.php"); //requires the database once
class AdvertData
{
    public $advertID; //declares all the variable this class needs
    public $carManufacturer;
    public $carModel;
    public $year;
    public $mileage;
    public $fuelType;
    public $engineSize;
    public $price;
    public $contactNumber;
    public $adImage;
    public $wishList;

    public function __construct($advertIDInput, $carManInput, $carModInput, $yearInput, $mileageInput, $fuelInput, $engineInput, $priceInput, $contactInput, $adImgInput, $wishInput)
    {
        $this->advertID=$advertIDInput; //constructs the class and sets the variables in the class to match the inputs which are in brackets above.
        $this->carManufacturer=$carManInput;
        $this->carModel=$carModInput;
        $this->year=$yearInput;
        $this->mileage=$mileageInput;
        $this->fuelType=$fuelInput;
        $this->engineSize=$engineInput;
        $this->price=$priceInput;
        $this->contactNumber=$contactInput;
        $this->adImage=$adImgInput;
        $this->wishList=$wishInput;
    }

    /**
     * @return mixed    All getters and setters are below.
     */
    public function getAdvertID()
    {
        return $this->advertID;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getAdImage()
    {
        return $this->adImage;
    }

    /**
     * @param mixed $adImage
     */
    public function setAdImage($adImage)
    {
        $this->adImage = $adImage;
    }

    /**
     * @param mixed $advertID
     */
    public function setAdvertID($advertID)
    {
        $this->advertID = $advertID;
    }

    /**
     * @return mixed
     */
    public function getCarManufacturer()
    {
        return $this->carManufacturer;
    }

    /**
     * @param mixed $carManufacturer
     */
    public function setCarManufacturer($carManufacturer)
    {
        $this->carManufacturer = $carManufacturer;
    }

    /**
     * @return mixed
     */
    public function getCarModel()
    {
        return $this->carModel;
    }

    /**
     * @param mixed $carModel
     */
    public function setCarModel($carModel)
    {
        $this->carModel = $carModel;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * @param mixed $mileage
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    }

    /**
     * @return mixed
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * @param mixed $fuelType
     */
    public function setFuelType($fuelType)
    {
        $this->fuelType = $fuelType;
    }

    /**
     * @return mixed
     */
    public function getEngineSize()
    {
        return $this->engineSize;
    }

    /**
     * @param mixed $engineSize
     */
    public function setEngineSize($engineSize)
    {
        $this->engineSize = $engineSize;
    }

    /**
     * @return mixed
     */
    public function getContactNumber()
    {
        return $this->contactNumber;
    }

    /**
     * @param mixed $contactNumber
     */
    public function setContactNumber($contactNumber)
    {
        $this->contactNumber = $contactNumber;
    }

}