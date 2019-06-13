<?php

$view = new stdClass();
$view->pageTitle = 'Search Page';
require_once('Views/search.phtml');

require_once("Models/Database.php");