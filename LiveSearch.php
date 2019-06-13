<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 20/05/2018
 * Time: 14:41
 */
include("Models/AdvertDataSet.php"); //needs to make use of these two classes and methods.
$advertDataSet = new AdvertDataSet();
$q = $_REQUEST["q"];
$array = $advertDataSet->adSearch($q);

echo json_encode($array);