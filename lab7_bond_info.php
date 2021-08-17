<?php
/*
Name: Braydon Duprey
Date: July 25, 2021
Course Code: Webd2201-05
*/
$file = "lab7_bond_info.php";
$date = "July 25, 2021";
$title = "Braydon's Website Lab 7 - Bond Movies";
$desc = "Webpage for Lab 7 page for web2201, James Bond Movies";
$banner = "Braydon's Website - Lab 7";
include ("./header.php");
?>
<p>
This page will use PostgreSQL to creat a database that we will populate a HTML table with James Bond movies. 
</p>
<!-- setup the table -->
<table border="1" width="75%">
	<tr><th width="50%">Movie</th><th width="15%">Year</th><th width="35%">Actor</th></tr>

<?php
$output = ""; //Set up a variable to store the output of the loop 
//connect
$conn = pg_connect("host=127.0.0.1 dbname=dupreyb_db user=dupreyb password=100584481" );  
//N.B. replace the YOUR variables with your specific information
//NOTE: "host=localhost..." SHOULD work, but there is a problem with the config on opentech, use 127.0.0.1 instead

//issue the query
$sql = "SELECT movies.title, movies.year, actors.name
			FROM movies, actors
			WHERE movies.actor=actors.id
			ORDER BY movies.year ASC";
	$result = pg_query($conn, $sql);
	$records = pg_num_rows($result);

//generate the table
	for($i = 0; $i < $records; $i++){  //loop through all of the retrieved records and add to the output variable
		$output .= "\n\t<tr>\n\t\t<td>".pg_fetch_result($result, $i, "title")."</td>"; 
		$output .= "\n\t\t<td>".pg_fetch_result($result, $i, "year")."</td>"; 
		$output .= "\n\t\t<td>".pg_fetch_result($result, $i, "name")."</td>\n\t</tr>"; 
	}

	echo $output; //display the output
?>
</table>
<!-- end the table -->
<?php
include ("./footer.php");
?>
