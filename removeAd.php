<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 16/02/2018
 * Time: 14:25
 */

require_once ("Models/Database.php"); //requires database once
$database = Database::getInstance(); //creates a new instance
$dbHandle = $database->getdbConnection(); //creates a new database connection
$sqlQuery = "DELETE FROM Adverts WHERE advertID = '".$_POST['adID']."'"; //deletes a value from advetrs where the advert id matches
$dbHandle->exec($sqlQuery); //executes the query
$database->__destruct(); //closes the database connection