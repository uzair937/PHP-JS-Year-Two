<?php

require_once('Models/Login.php');

if (isset($_POST['submit']))
{
    $login = new Login();
    $login->login($_POST['varUserName'], $_POST['varPassword']);
}

require_once('Views/login.phtml');