<?php

// Constants
define("MINIMUM_ID_LENGTH", 3);
define("MAXIMUM_ID_LENGTH", 20);
define("MINIMUM_PASSWORD", 6);
define("MAXIMUM_PASSWORD", 15);
define("MAX_FIRST_NAME_LENGTH", 20);
define("MAX_LAST_NAME_LENGTH", 30);
define("MAXIMUM_EMAIL_LENGTH", 255);
// Constants for termtest3.php
define("MIN_ID_LEN", 3);
define("MAX_ID_LEN", 10);
define("MIN_NAME_LEN", 4);
define("MAX_NAME_LEN", 50);
define("MIN_GRADE_VALUE", 0);
define("MAX_GRADE", 100);

// Function to connect to the database
function db_connect()
{
    return pg_connect("host=127.0.0.1 dbname=dupreyb_db user=dupreyb password=100584481" );
    
}

// Function to display copyright information
function displayCopyrightInfo()
{ 
   echo "&copy; Braydon Duprey, " .date('Y');
}
?>