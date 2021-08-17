<?php
/*
Name: Braydon Duprey
Date: July 15, 2021
Course Code: Webd2201-05
*/
$file = "termtest2.php";
$date = " July 15 2021";
$title = "Braydon's Website";
$desc = "Webpagefor Term Test 2";
$banner = "Termtest 2 - Discount Calculator";
include ("./header.php");

$error = "";
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $price="";
    $discount="";
    $output = "";
    $saved = "";

}
else
{
    $price=$_POST['pbd'];
    $discount=$_POST['disc'];
    $type="";
    $type = (isset($_POST['typ']));

    // Price is empty
    if(!isset($price) || $price == "")
    {
        $error .="<h2>Price is not given</h2><br/>";
    }
    // Price is not numeric
    else if(!is_numeric($price))
    {
        $error .="<h2>Price should be numeric, you entered $price</h2><br/>";
        $price="";
    }
    // Price is less than or equal to 0
    else if($price <= 0)
    {
        $error .="<h2>Price should be greater than zero</h2><br/>";
        $price="";
    }
    // Discount is empty
    if(!isset($discount) || $discount == "")
    {
        $error .="<h2>Discount amount is not given</h2></br>";
        $discount="";
    }
    // Discount is not numeric
    else if(!is_numeric($discount))
    {
        $error .="<h2>Discount should be numeric, you entered $discount</h2><br/>";
        $discount="";
    }
    // Discount is less than 0
    else if($discount < 0)
    {
        $error .="<h2>Discount amount cannot be negative</h2>";
        $discount="";
    }
    if($type == "")
    {
        $error .="<h2>Choose the type of discount, Percent or Fixed</h2>";

    }
    // No error
    if ($error=="")
    {
        $type = $_POST['typ'];
        // If percent
        if($type == "p")
        {
            $output = $price-(($discount/100)*$price);
            $saved = $price-$output;
            echo "<h2>You have to pay $$output </h2><br/>";
            echo "<h2>You saved $$saved</h2>";

        }
        // If Fixed
        else if($type == "f")
        {
            $output = $price-$discount;
            $saved = $discount;
            echo "<h2>You have to pay $$output </h2><br/>";
            echo "<h2>You saved $$saved</h2>";
        }
    }
    else
    {
        echo "$error";
    }
}

?>

<p>
The term discount can be used to refer to many forms of reduction in price of a good or service.<br/>
Two most common types of discounts are discounts in which you get a percent off, or a fixed amount off.
</p>
<p>
A fixed amount off of a price refers to subtracting whatever the fixed amount is from the original price.<br/>
A percent off of a price typically refers to getting some percent, say 10%, off of the original price of the product or service.
</p>

<form method="post" action="termtest2.php"<?php echo $_SERVER['PHP_SELF']; ?>>
    <p>Price Before Discount: $<input type="text" name="pbd" size="10" value="<?php echo $price; ?>"/></p>
    <p>Discount: $<input type="text" name="disc" size="10" value="<?php echo $discount; ?>"/></p>
    <p>Discount Type:<br/></p>
    <p> Percent: <input type="radio" name="typ" value="p">
        Fixed: <input type="radio" name="typ" value="f">
    </p>
    <input type="submit" value="Calculate" />
</form>
<?php
include ("./footer.php");
?>