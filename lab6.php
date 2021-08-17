<?php
/*
Name: Braydon Duprey
Date: July 15, 2021
Course Code: Webd2201-05
*/
$file = "lab6.php";
$date = "July 9, 2021";
$title = "Braydon's Website";
$desc = "Webpage for Lab 6";
$banner = "Braydon's Website - Lab 6";
include ("./header.php");
?>
<p>
This webpage will take user input for starting temperature how many times they would like to calculate it and how many jumps each calculation will take.
</p>
<?php
define("MAX_ITERATIONS", 100);
$error ="";
$output ="";

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $start="";
    $stop="";
    $incr ="";
    $under_max = 0;
    $valid = 0;
}
else
{
    $start=$_POST['strt'];
    $stop=$_POST['stp'];
    $incr=$_POST['inc'];
    
    if(!isset($start) || $start == "")
    {
        $error .="You must enter a start temperature. <br>";
        $start="";
    }
    else if(!is_numeric($start))
    {
        $error .="The start temperature must be a number. You entered: $start <br/>";
        $start="";
    }
    if(!isset($stop) || $stop == "")
    {
        $error .="You must enter a stop temperature.<br/>";
        $stop="";

    }
    else if(!is_numeric($stop))
    {
        $error .="The start temperature must be a number. You entered: $stop <br/>";
        $stop="";
    }
    else if($stop < $start)
    {
        $error .="The stop temperature must be greater than the start temperature<br/>";
        $stop="";
    }
    if(!isset($incr) || $incr == "")
    {
        $error .="You must enter an increment.<br/>";
        $incr="";

    }
    else if(!is_numeric($incr))
    {
        $error .="The temperature increment must be a number. You entered: $incr <br/>";
        $incr="";
    }
    else if($incr <= 0)
    {
        $error .="You must enter a non-zero increment.<br/>";
        $incr="";
    }
    if ($error=="")
    {
        $under_max = ($stop-$start)/$incr;
        
        if($under_max < MAX_ITERATIONS)
        {
        $valid =1;
        }
        else
        {
            $error .="The maximum iterations is 100!<br/>";
            $incr="";
            echo "<h2>$error</h>";
            $valid =0;
        }
    }
    else
    {
        echo "<h2>$error</h>";
        $valid =0;
    }
}

?>
<form method="post" action="lab6.php"<?php echo $_SERVER['PHP_SELF']; ?>>
    <table style="border: none">
        <tr>
            <td>
                <label for="start">Starting Temprature:</label>
            </td>
            <td>
                <input type="text" name="strt" size="10" value="<?php echo $start; ?>"/></br>
            </td>
        </tr>
        <tr>
            <td>
                <label for="stop">Stop Temperature:</label>
            </td>
            <td>
                <input type="text" name="stp" size="10" value="<?php echo $stop; ?>"/></br>
            </td>
        </tr>
        <tr>
            <td>
                <label for="incr">Temperature Increment:</label>
            </td>
            <td>
                <input type="text" name="inc" size="10" value="<?php echo $incr; ?>"/></br>
            </td>
		</tr>
        <tr>
            <td colspan="2"><input type="submit" value="Create Temperature Conversion Table" /></td>
        </tr>
    </table>


</form>
<?php
if ($valid==1)
{
    echo "<table border='1' width='30%'style= 'text-align: center;'>
    <thead>
        <tr>
        <th>Celsius</th>
        <th>Fahrenheit</th>
        </tr>
    </thead>
    <tbody>";
        for ($x = 0; $x <= $under_max; $x++) 
        {
            $output = ($start*(9/5)+32);
            echo
            "<tr><td>$start&#176;</td>
            <td>$output&#176;</td></tr>";
            $start = $start+$incr;
        }
    echo"
    </tbody>
    </table>";

    }
?>
<?php
include ("./footer.php");
?>