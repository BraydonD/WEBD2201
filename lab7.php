<?php
/*
Name: Braydon Duprey
Date: July 25, 2021
Course Code: Webd2201-05
*/
$file = "lab7.php";
$date = "July 25, 2021";
$title = "Braydon's Website";
$desc = "Webpage for Lab 7";
$banner = "Braydon's Website - Lab 7";
include ("./header.php");
?>
<p>
This webpage will link to two different webpages that use PostgreSQL to create a database. 
<br/><br/>In the first database we will populate a HTML table with James Bond movies. 
<br/>The second database we will populate a HTML table with automobiles make, model, year, and msrp.
<br/><br/>There are also links that will download both sql database scripts. 
</p>
<ul>
    <li><a href="lab7_bond_info.php">lab7_bond_info.php</a></li>
    <li><a href="lab7_auto_info.php">lab7_auto_info.php</a></li>
    <li><a href="./sql/lab7_bond_movies.sql">lab7_bond_movies.sql</a></li>
    <li><a href="./sql/lab7_auto_records.sql">lab7_auto_records.sql</a></li>
</ul>
<?php
include ("./footer.php");
?>