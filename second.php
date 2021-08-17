<?php
$file = "lab6.php";
$date = "July 9, 2021";
$title = "Braydon's Website";
$desc = "Webpage for Lab 6";
$banner = "Braydon's Website - Lab 6";
include ("./header.php");
$error ="";

if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $a="";
    $b="";
}
else
{
    $a=$_POST['fn'];
    $b=$_POST['sn'];
    
    if(!isset($a) || $a == "")
    {
        $error .="The first number cannot be empty ";
    }
    else if(!is_numeric($a))
    {
        $error .="The value of first number is not numeric! ";
        $a="";
    }
    if(!isset($b) || $b == "")
    {
        $error .="The second number cannot be empty ";
    }
    else if(!is_numeric($b))
    {
        $error .="The value of second number is not numeric! ";
        $b="";
    }
    if ($error=="")
    {

        $c=$a+$b;
        echo "<h2>The result of addition of $a and $b is $c</h2>";
    }
    else
    {
        echo "<h2>$error</h>";
    }
}
?>

<form method="post" action="lab6.php"<?php echo $_SERVER['PHP_SELF']; ?>>
    <p>First Number:<input type="text" name="fn" size="10" value="<?php echo $a; ?>"/></p>
    <p>Second Number:<input type="text" name="sn" size="10" value="<?php echo $b; ?>"/></p>
<input type="submit" value="click to process" />
</form>

<?php
include ("./footer.php");
?>
