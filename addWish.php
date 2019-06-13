<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 23/02/2018
 * Time: 21:16
 */
//echo $_GET['id'];
require_once ("Models/WishDataSet.php"); //requires database once
$wishID = uniqid("W", false);
$wish = new WishData($wishID,$_SESSION['userID'],$_GET['id']);
//echo $wish->wishlistID;
$wishData = new WishDataSet(); //creates a new wishdataset
$wishData->addWish($wish); //adds the wish to the wishlist table
echo "<a href='wishlist.php'>Click here to see your wishlist.</a>"; //takes you to the wishlist page