<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 20/05/2018
 * Time: 18:37
 */

include("../Models/AdvertDataSet.php");

$advertDataSet= new AdvertDataSet();
$i=1;
while($i<100) {
    $advert = new AdvertData($i, $i, $i, $i, $i, $i, $i, $i, $i, $i, $i);
    $advertDataSet->addAdvert($advert);
$i++;
}
print_r($advert);
//$advertDataSet->addAdvert($advert);