<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 13/02/2018
 * Time: 10:29
 */
$target_dir = "uploads/"; //sends files to the uploads folder
$target_file = $target_dir.basename($_FILES['carImage']['name']); //gets the name of the file

if (move_uploaded_file($_FILES['carImage']['tmp_name'], $target_file)) { //moves the file to the destination
    echo "File successfully uploaded.\n"; //success = print this
    header('Location: index.php'); //return to index
}
else {
    echo "File failed to upload/Possible attack!\n"; //if the file is invalid or no file is selected
}
?>