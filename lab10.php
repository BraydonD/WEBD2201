<?php
/*
Name: Braydon Duprey
Date: August 6, 2021
Course Code: Webd2201-05
*/
$file = "lab10.php";
$date = "August 6, 2021";
$title = "Braydon's Website";
$desc = "Webpage for Lab 10";
$banner = "Braydon's Website - Lab 10";
include ("./header.php");
?>
<p>
This webpage is used to register users to the website. It will take user information and will check that no entries are left blank. 
The form will then check if the data is valid and within range.  
Once the data has been validated the webpage will check the database to see if the Login ID or Email Address has already been registered. 
If all information is valid and not in the database, it will add the user to the database and redirect to the login page. 
</p>
<hr/>
<div style="text-align: center">
<?php
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $user_name = "";
    $pass = "";
    $conf_pass = "";
    $f_name = "";
    $l_name = "";
    $email = "";
}
else
{
    // Variables for all form inputs
    $user_name = trim($_POST['id']);
    $pass = trim($_POST['passwd']);
    $conf_pass = trim($_POST['conf_passwd']);
    $f_name = trim($_POST['first_name']);
    $l_name = trim($_POST['last_name']);
    $email = trim($_POST['email_address']);
    // Variable to store error message
    $error = "";
    $today = date('Y-m-d', time());

    // Test if Login ID is valid
    if (!isset($user_name) || $user_name == "")
    {
        $error = "You did not enter a Login ID!<br/>";
    }
    else if (strlen($user_name) < MINIMUM_ID_LENGTH)
    {
        $error .="The Login ID must be at least 3 characters, $user_name is not long enough!<br/>";
        $user_name = "";
    }
    else if(strlen($user_name) > MAXIMUM_ID_LENGTH)
    {
        $error .="The Login ID must be less than 20 characters, $user_name is too long enough!<br/>";
        $user_name = "";
    }
    // Test if Password is valid
    if (strcmp($pass, $conf_pass) !== 0)
    {
        $error .="The Password and Confirm Password were not the same!<br/>";
        $pass = "";
        $conf_pass = "";
    }
    else if (!isset($pass) || $pass == "")
    {
        $error .="You did not enter a Password!<br/>";
    }
    else if (strlen($pass) < MINIMUM_PASSWORD)
    {
        $error .="Your Password must be at least 6 characters!<br/>";
        $pass = "";
        $conf_pass = "";
    }
    else if(strlen($pass) > MAXIMUM_PASSWORD)
    {
        $error .="Your Password cannot be more than 15 characters!<br/>";
        $pass = "";
        $conf_pass = "";
    }
    // Test if First Name is valid
    if (!isset($f_name) || $f_name == "")
    {
        $error .="You did not enter your First Name!<br/>";
    }
    else if(is_numeric($f_name) == 1)
    {
        $error .="Your First Name cannot be a number, you entered: $f_name<br/>";
        $f_name = "";
    }
    else if(strlen($f_name) > MAX_FIRST_NAME_LENGTH)
    {
        $error .="Your Fast Name needs to be less than 20 characters: $f_name is too long!<br/>";
        $f_name = "";
    }
    // Check if Last Name is valid
    if (!isset($l_name) || $l_name == "")
    {
        $error .="You did not enter your Last Name!<br/>";
    }
    else if(is_numeric($l_name) == 1)
    {
        $error .="Your Last Name cannot be a number, you entered: $l_name<br/>";
        $l_name = "";
    }
    else if(strlen($l_name) > MAX_LAST_NAME_LENGTH)
    {
        $error .="Your Last Name needs to be less than 30 characters: $l_name is too long!<br/>";
        $l_name = "";
    }
    // Test if Email Adresss is Valid
    if (!isset($email) || $email == "")
    {
        $error .="You did not enter an Email Address!<br/>";
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $error .="The Email Address $email is not valid!<br/>";
        $email = "";
    }
    else if(strlen($email) > MAXIMUM_EMAIL_LENGTH)
    {
        $error .="Your Email Address needs to be less than 255 characters!<br/>";
        $email = "";
    }
    // All data is valid
    if ($error == "")
    {
        // Checking the database for existing users.
        $sql = "SELECT * FROM users WHERE id='$user_name'";
        $check_user = pg_query(db_connect(), $sql);
        $found = pg_num_rows($check_user);
        if($found > 0)
        {
            $user_name="";
            $error .="That Login ID is already in use. Please choose another one.<br/>";
        }
        // Check if the email address is in use
        else
        {
            $sql = "SELECT * FROM users WHERE email_address='$email'";
            $check_user = pg_query(db_connect(), $sql);
            $found = pg_num_rows($check_user);
            if($found > 0)
            {
                $email="";
                $error .="That Email Address is associated with an existing account!<br/>";
            }
            // Everything is fully valid post to the info to the database!
            else
            {

            $sql = "INSERT INTO users(id, password, first_name, last_name, email_address, enrol_date, last_access) VALUES ('$user_name', '$pass', '$f_name', '$l_name', '$email', '$today', '$today')";
            $query= pg_query(db_connect(), $sql);
            echo "<h1>Registration Complete!<h1><h3> Redirecting you to the login page! </h3>";
            header('location: ./lab9.php');
            ob_flush();
            }
        }
       
    }
    echo "<h3> $error </h3> <hr/>";
}
?>
<h2>Please register in our system</h2>
<p>Please enter your personal information<br/></p>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	<table style="border: 0px; margin-left: auto; margin-right: auto; background-color:lightgoldenrodyellow;" cellpadding="8">
	<tr>
		<td><strong>Login ID</strong></td>
		<td><input type="text" name="id" value="<?php echo $user_name; ?>" size="20" /></td>
	</tr>
	<tr>
		<td><strong>Password</strong></td>
		<td><input type="password" name="passwd" value= "<?php echo $pass; ?>" size="20" /></td>
	</tr>
	<tr>
		<td><strong>Confirm Password</strong></td>
		<td><input type="password" name="conf_passwd" value="<?php echo $conf_pass; ?>" size="20" /></td>
	</tr>
	<tr>
		<td><strong>First Name</strong></td>
		<td><input type="text" name="first_name" value="<?php echo $f_name; ?>" size="20" /></td>
	</tr>
	<tr>
		<td><strong>Last Name</strong></td>
		<td><input type="text" name="last_name"  value="<?php echo $l_name; ?>" size="20" /></td>
	</tr>
	<tr>
		<td><strong>Email Address</strong></td>
		<td><input type="text" name="email_address" value="<?php echo $email; ?>" size="20" /></td>
	</tr>

	</table>
	<table style="border: 0px; margin-left: auto; margin-right: auto;" cellspacing="10" >
<tr>
	<td><input type="submit" value = "Register" /></td><td><input type="reset" value = "Clear" /></td>
</tr></table>
</form>
</div>
<hr/>
<?php
$xhtml = "http://validator.w3.org/check?uri=http%3A%2F%2Fopentech.durhamcollege.org%2Fwebd2201%2Fdupreyb%2Flab10.php";
$css = "http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fopentech.durhamcollege.org%2Fwebd2201%2Fdupreyb%2Flab10.php&amp;profile=css3svg&amp;usermedium=all&amp;warning=1&amp;vextwarning=";
include ("./footer.php");
?>