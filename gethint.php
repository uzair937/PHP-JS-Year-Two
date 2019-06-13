<?php
/**
 * Created by PhpStorm.
 * User: Uzair-Laptop
 * Date: 19/05/2018
 * Time: 17:29
 */
$a[] = "Annabel";
$a[] = "samir";
$a[] = "Jake";
$a[] = "Zain";
$a[] = "Matt";
$a[] = "Bob";
$a[] = "Kai";
$a[] = "Alistair";
$a[] = "Liam";
$a[] = "Hanah";
$a[] = "Zainab";
$a[] = "Amarah";
$a[] = "Abdullah";

$q = $_REQUEST["q"];
$hint = "";

if($q !== "")
{
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($a as $name)
    {
        if (stristr($q, substr($name, 0, $len)))
        {
            if ($hint === "")
            {
                $hint = $name;
            }
            else
            {
                $hint .=", $name";
            }
        }
    }
}
echo $hint === "" ? "no suggestion" : $hint;

?>
