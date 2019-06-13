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
$sqlQuery = "DELETE FROM Wishlist WHERE wishlistID = '".$_GET['id']."'"; //deletes a value from wishlist where the id matches
$dbHandle->exec($sqlQuery); //executes the query
$database->__destruct(); //closes the database connection

echo "<a href='wishlist.php'>Click here to go back to your wishlist.</a>"; //takes the user back to the wishlist