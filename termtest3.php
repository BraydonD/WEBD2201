<?php
/*
Name: Braydon Duprey
Date: August 10, 2021
Course Code: Webd2201-05
*/
$file = "termtest3.php";
$date = "August 6, 2021";
$title = "Braydon's Website";
$desc = "Webpage for Term Test 3";
$banner = "Braydon's Website - Term Test 3";
include ("./header.php");
?>

<?php
$no_records = 1;
$sql = "SELECT student_id, student_name, Grade
FROM student
ORDER BY student_id ASC";
$result = pg_query(db_connect(), $sql);
$records = pg_num_rows($result);
if ($records < 1)
{
    $no_records = 0;
}

?>

<div style="text-align: center">
<p> 
    This webpage will take student info validate it and add it to the database
</p>
<hr/>
<?php
$error ="";
if($_SERVER["REQUEST_METHOD"] == "GET")
{
    $student_id = "";
    $student_name = "";
    $student_grade = "";
    $error ="";
}
else
{
    $student_id = trim($_POST['id']);
    $student_name = trim($_POST['name']);
    $student_grade = trim($_POST['grade']);
    // Checks if the grade is a valid int
    if(is_int($student_grade))
    {
        $student_grade = intval($student_grade); // Converts to int
    }
    if (!isset($student_id) || $student_id == "")
    {
        $error = "Student ID cannot be left blank!<br/>";
    }
    else if(strlen($student_id) < MIN_ID_LEN)
    {
        $error .="Student ID must be at least 3 characters, $student_id is not long enough!<br/>";
        $student_id = "";
    }
    else if (strlen($student_id) > MAX_ID_LEN)
    {
        $error .="Student ID must be 10 or less characters, $student_id is too long!<br/>";
        $student_id = "";
    }
    if (!isset($student_name) || $student_name == "")
    {
        $error .= "Student Name cannot be left blank!<br/>";
    }
    else if(strlen($student_name) < MIN_NAME_LEN)
    {
        $error .="Student ID must be at least 4 characters, $student_id is not long enough!<br/>";
        $student_name = "";
    }
    else if (strlen($student_name) > MAX_NAME_LEN)
    {
        $error .="Student ID must be 50 or less characters, $student_id is too long!<br/>";
        $student_name = "";
    }
    if (!is_numeric($student_grade) && $student_grade != "")
    {
        $error .="Grade must be a whole number, $student_grade is not valid!<br/>";
        $student_grade ="";
    }
    else if ($student_grade < MIN_GRADE_VALUE)
    {
        $error .="Grade cannot be less than 0, $student_grade is not valid!<br/>";
        $student_grade = "";
    }
    else if ($student_grade > MAX_GRADE)
    {
        $error .="Grade cannot be higher than 100, $student_grade is not valid!<br/>";
        $student_grade = "";
    }

    if ($error == "")
    {
        // Checking the database for existing users.
        $sql = "SELECT * FROM student WHERE student_id='$student_id'";
        $check_user = pg_query(db_connect(), $sql);
        $found = pg_num_rows($check_user);
        if($found > 0)
        {
            $student_id = "";
            $error .="That Student ID is already in use. Please choose another one.<br/>";
        }
        else
        {
            $sql = "INSERT INTO student(student_id,student_name, Grade) VALUES ('$student_id', '$student_name', $student_grade)";
            $query= pg_query(db_connect(), $sql);
            echo "<h2>Record has been successfully inserted!<h1>";
            $student_grade = "";
            $student_id = "";
            $student_name = "";
        }
    }
    if ($error != "")
    {
    $error .="<br/>The form was not completed correctly. Please try again!";
    echo "<h2>$error</h2><hr/>";
    }
}
?>

<h1>Register!</h1>
<p>Please enter your Student ID, Name and Grade!<br/>
</p>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <table style="border: 0px; margin-left: auto; margin-right: auto; background-color:lightgoldenrodyellow;" cellpadding="8" >
    <tr>
	    <td><b>Student ID: </b></td>
	    <td><input type="text" name="id" value="<?php echo $student_id; ?>" size="20" /></td>
    </tr>
    <tr>
	    <td><b>Student Name: </b></td>
	    <td><input type="text" name="name" value="<?php echo $student_name; ?>" size="20" /></td>
    </tr>
    <tr>
	    <td><b>Grade: </b></td>
	    <td><input type="text" name="grade" value="<?php echo $student_grade; ?>" size="20" /></td>
    </tr>
    </table>
    <table style="border: 0px; margin-left: auto; margin-right: auto;" cellspacing="10" >
    <tr>
	    <td><input type="submit" value = "Add Student To Database" /></td>
    </tr>
    </table>
</form>
<?php
    $output = "";
    if ($no_records == 0)
    {
        echo "<h2> There are no student records to found! </h2>";
    }
    else
    {
    
    echo    "<table border='1' width='60%'style= 'text-align: center; margin-left: auto; margin-right: auto;'>
             <th style = 'color: #fc6900';>Student ID</th><th style = 'color: #fc6900';>Student Name</th><th style = 'color: #fc6900';>Grade</th>";
    //loop through all of the retrieved records and add to the output variable
    for($i = 0; $i < $records; $i++)
    {
		$output .= "\n\t<tr>\n\t\t<td style = 'font-weight: bold;';>".pg_fetch_result($result, $i, "student_id")."</td>"; 
		$output .= "\n\t\t<td style = 'font-weight: bold;';>".pg_fetch_result($result, $i, "student_name")."</td>"; 
		$output .= "\n\t\t<td style = 'font-weight: bold;';>".pg_fetch_result($result, $i, "Grade")."</td>\n\t</tr>"; 
	}
	echo $output; //display the output
    echo "</table>";
    }
?>
</div>
<?php
$xhtml = "http://validator.w3.org/check?uri=http%3A%2F%2Fopentech.durhamcollege.org%2Fwebd2201%2Fdupreyb%2Flab10.php";
$css = "http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fopentech.durhamcollege.org%2Fwebd2201%2Fdupreyb%2Flab10.php&amp;profile=css3svg&amp;usermedium=all&amp;warning=1&amp;vextwarning=";
include ("./footer.php");
?>