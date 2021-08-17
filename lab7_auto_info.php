<?php
/*
Name: Braydon Duprey
Date: July 25, 2021
Course Code: Webd2201-05
*/
$file = "lab7_auto_info.php";
$date = "July 25, 2021";
$title = "Braydon's Website Lab 7 - Automobiles";
$desc = "Webpage for Lab 7 page for web2201, Favourite automobiles";
$banner = "Braydon's Website - Lab 7";
include ("./header.php");
?>
<p>
This page will use PostgreSQL to creat a database that we will populate a HTML table with automobiles make, model, year, and msrp. 
</p>
<!-- setup the table -->
<table border="1" width="75%">
	<tr><th width="25%">Make</th><th width="25%">Model</th><th width="25%">Year</th><th width="25%">MSRP</th></tr>

<?php
$output = ""; //Set up a variable to store the output of the loop 
//connect
$conn = pg_connect("host=127.0.0.1 dbname=dupreyb_db user=dupreyb password=100584481" );  
//N.B. replace the YOUR variables with your specific information
//NOTE: "host=localhost..." SHOULD work, but there is a problem with the config on opentech, use 127.0.0.1 instead

//issue the query
$sql = "SELECT make, model, year, msrp
			FROM automobiles
			ORDER BY msrp DESC";
	$result = pg_query($conn, $sql);
	$records = pg_num_rows($result);

//generate the table
	for($i = 0; $i < $records; $i++){  //loop through all of the retrieved records and add to the output variable
		$output .= "\n\t<tr>\n\t\t<td>".pg_fetch_result($result, $i, "make")."</td>"; 
		$output .= "\n\t\t<td>".pg_fetch_result($result, $i, "model")."</td>";
        $output .= "\n\t\t<td align='center'>".pg_fetch_result($result, $i, "year")."</td>";
		$output .= "\n\t\t<td align='center'>$".pg_fetch_result($result, $i, "msrp")."</td>\n\t</tr>"; 
	}

	echo $output; //display the output
?>
</table>
<!-- end the table -->
<?php
include ("./footer.php");
?>
