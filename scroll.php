<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 20/05/2018
 * Time: 17:27
 */
include("Models/AdvertDataSet.php"); //needs to make use of these two classes and methods.

$advertDataSet = new AdvertDataSet();
$array = $advertDataSet->viewAdvert();

echo json_encode($array);