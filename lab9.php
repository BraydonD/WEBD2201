<?php
/*
Name: Braydon Duprey
Date: August 1, 2021
Course Code: Webd2201-05
*/
$file = "lab9.php";
$date = "August 1, 2021";
$title = "Braydon's Website";
$desc = "Webpage for Lab 9";
$banner = "Braydon's Website - Lab 9";
include ("./header.php");
?>

<?php
$loginPassed = False;
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $login = "";
    $pass = "";
}
else
{
    $date = date('Y-m-d');
    $login=$_POST['log'];
    $pass=$_POST['pas'];
    $errorMessage = "<br/>This is the SQL <span class='code'>SELECT</span> that was used to retrieve the user's information from the <span class='code'>users</span> table:
                <span class='code'>SELECT first_name, last_name, email_address, last_access FROM users WHERE id='$login' AND password='$pass'</span>
                <br/><br/>Either the user's <span class='code'>id</span> and/or <span class='code'>password</span> was incorrect, this SQL <span class='code'>SELECT</span> statement that was used to check if
                the <span class='code'>id</span> entered exists in the <span class='code'>users</span> table: <span class='code'>SELECT * FROM users WHERE id = '$login'</span> </br></br>
                If a record is returned, the <span class='code'>id</span> exists, therefore it can be left in the form. If no records exists, remove it from the form.";
    
    $passMessage = "This is the SQL <span class='code'>SELECT</span> that was used to retrieve the user's information from the <span class='code'>users</span> table:
                    <br><span class='code'>SELECT first_name, last_name, email_address, last_access FROM users WHERE id='$login' AND password='$pass'</span>
                    <br><br>As the user successfully logged in, this SQL <span class='code'>UPDATE</span> command was used to update the <span class='code'>last_access</span> field in the user's record:
                    <span class='code'>UPDATE</span> users SET last_access = '$date' WHERE id = '$login'";

//issue the query
$sql = "SELECT * FROM users WHERE id='$login'";
$user = pg_query(db_connect(), $sql);
$found = pg_num_rows($user);
    if($found < 1)
    {
        $login="";
        echo $errorMessage;
        $loginPassed = False;
    }
    else
    {
        $sql = "SELECT first_name, last_name, email_address, last_access FROM users WHERE id = '$login' AND password = '$pass'";
        $user = pg_query(db_connect(), $sql);
        $found = pg_num_rows($user);        
        
        if($found < 1)  
        {
            echo $errorMessage;
            $pass = "";
            $loginPassed = False;
        }
        else
        {
            $loginPassed = True;
            $fn = pg_fetch_result($user, 0, "first_name");
            $ln = pg_fetch_result($user, 0, "last_name");
            $em = pg_fetch_result($user, 0, "email_address");
            $la = pg_fetch_result($user, 0, "last_access");
            $sql = "UPDATE users SET last_access = '" . date("Y-m-d",time()) . "' WHERE id = '" . $login . "'";
            $user = pg_query(db_connect(), $sql);
            echo $passMessage;
        }
    }
}
?>

    This webpage will demonstate a user login that will take a user information search the database
    to match the login with the password and display a message depending on if it was valid or not.
    The SQL script is linked below.
    <ul>
    <li><a href="./sql/lab9_users.sql">lab9_users.sql</a></li>
    </ul>
<hr/>
<?php
if ($loginPassed == True)
{
    echo "<h2>Welcome back $fn $ln<br/>
    Our records show that your<br/>
    email address is: $em<br/>
    and you last accessed our system: $la<br/></h2><hr/>";

}
?>
<div style="text-align: center">
<h1>Please log in</h1>
<p>Enter your login ID and password to connect to this system<br/>
</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table style="border: 0px; margin-left: auto; margin-right: auto; background-color:lightgoldenrodyellow;" cellpadding="8" >
    <tr>
	    <td><b>Login ID</b></td>
	    <td><input type="text" name="log" value="<?php echo $login; ?>" size="20" /></td>
    </tr>
    <tr>
	    <td><b>Password</b></td>
	    <td><input type="password" name="pas" value="<?php echo $pass; ?>" size="20" /></td>
    </tr>
    </table>
    <table style="border: 0px; margin-left: auto; margin-right: auto;" cellspacing="10" >
    <tr>
	    <td><input type="submit" value = "Log In" /></td>
	    <td><input type="reset" value = "Reset" /></td>
    </tr>
    </table>
</form>
<p>
Please wait after pressing <b>Log in</b>
while we retrieve your records from our database.<br/>
<span class="code">(This may take a few moments)</span>
</p>
</div>
<hr/>
<?php
$xhtml = "http://validator.w3.org/check?uri=http%3A%2F%2Fopentech.durhamcollege.org%2Fwebd2201%2Fdupreyb%2Flab9.php";
$css = "http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fopentech.durhamcollege.org%2Fwebd2201%2Fdupreyb%2Flab9.php&amp;profile=css3svg&amp;usermedium=all&amp;warning=1&amp;vextwarning=";
include ("./footer.php");
?>