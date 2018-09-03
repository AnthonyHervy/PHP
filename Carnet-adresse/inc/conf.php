<?php

// Globales
define('WEBSITE_TITLE', "Adresse book");
define('SITEBASE_URL', "http://localhost:8888/Carnet-adresse/");
    //id for mail sending
define('REF_EMAIL_ADRESS', "Carnet d'adresses");
define('SEND_EMAIL_ADRESS', "anthony.hervy@gmail.com");

// Dependencies
require('./lang/lang-fr.php');
require('./inc/functions.php');

// Database
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "root";
$DB_NAME = "adressbook";

$db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

?>