<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 15/02/2018
 * Time: 15:12
 */
require_once("Database.php"); //requires the database once
class WishData
{
    public $wishID; //variables required
    public $advertID;
    public $userID;

    public function __construct($wishIDInput, $userIDInput, $advertIDInput)
    {
        $this->wishID=$wishIDInput;
        $this->userID=$userIDInput;
        $this->advertID=$advertIDInput;
        //constructs the class and sets the variables in the class to match the inputs which are in brackets above.
    }

    /**
     * @return mixed
     */
    public function getWishID()
    {
        return $this->wishID;
    }

    /**
     * @param mixed $wishID
     */
    public function setWishID($wishID)
    {
        $this->wishID = $wishID;
    }

    /**
     * @return mixed
     */
    public function getAdvertID()
    {
        return $this->advertID;
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
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed    All getters and setters are below.
     */
}