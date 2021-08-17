<?php
require './includes/functions.inc'; 

$output ="";
$number1 =0;
$number2 =0;
$opp = "";
$ran1 = randdigit();
$ran2 = randdigit();
$ranopp = randop();
$question = "<h2>$ran1 $ranopp $ran2 = ?</h2>";
$answer ="";
$game_done = "";
$check = 0;
$question_counter=0;
$correct = 0;
$form_block ="";

// If user clicks button this starts
if($_SERVER["REQUEST_METHOD"] == "GET")
{
}
else
{
	$answer = ($_POST['guess']);
	$number1 = ($_POST['num1']);
	$number2 = ($_POST['num2']);
	$opp = ($_POST['opper']);
	$question_counter = ($_POST['count']);
	$correct = ($_POST['cor']);
	$game_done = ($_POST['gd']);
	$check = 0;
	// Checks for empty input and not whole numbers
	if(!isset($answer) || $answer == "")
	{
		$answer = 100;
	}
	$question_counter = $question_counter +1;
	
	// First math question
	if($question_counter < 5)
	{
		$check = evaluate( $number1, $number2, $opp);
		if($answer == $check)
		{
			$correct = $correct + 1;
			$output = "<h2>Congratulations</br></br>";
			$output .= "$number1 $opp $number2 = $check</br></br>";
			$output .= "$correct out of $question_counter</h2><br/>";
		}
		else
		{
			$output = "<h2>Sorry</br></br>";
			$output .= "$number1 $opp $number2 = $check</br></br>";
			$output .= "$correct out of $question_counter</h2><br/>";
		}
	}
	// Last Question
	if($question_counter == 5)
	{
		$check = evaluate( $number1, $number2, $opp);
		if($answer == $check)
		{
			$correct = $correct + 1;
			$output = "<h2>Congratulations</br></br>";
			$output .= "$number1 $opp $number2 = $check</br></br>";
			$output .= "$correct out of $question_counter</h2><br/>";
		}
		else
		{
			$output = "<h2>Sorry</br></br>";
			$output .= "$number1 $opp $number2 = $check</br></br>";
			$output .= "$correct out of $question_counter</h2><br/>";
		}
		$output .="<h2>Do you want another 5 questions? </h2>";
		$game_done = "gd";
	}
	// Resets the values
	if($question_counter > 5)
	{
		$output = "";
		$game_done = "";
		$question_counter = 0;
		$answer = "";
		$correct= 0;
	}
	// Clear the text box
	$answer = "";
}
$body = "<p>This webpage will display a randomized math question.
		 The user will need to enter the answer in the text box and click the submit button.
		 It will keep track of how many were correct and after 5 questions
		 display the results and ask to play again</p><hr/>";
$body .= "<h1>Math Quiz</h1>\n";

$form_block = '
				<form method="post" action="'.$_SERVER['PHP_SELF'].' ">
				<table style="border: 0px; color:black;" cellpadding="8"><tr>';
// Quiz Not Done Show Input Box & Question
if($game_done == "")
{
$form_block .= '<td>'.$question.'</td>
				<td><input type="text" name="guess" value="'.$answer.'" size="2" /></td></tr>';
}
// Quiz Done Show Output & Button
if($game_done == "gd") {$form_block .= '<td>'.$output.'</td>';}

 $form_block .=	'</table>
				<input type="hidden" name="num1" value="'.$ran1.'"/>
			 	<input type="hidden" name="num2" value=" '.$ran2.'"/>
				<input type="hidden" name="opper" value="'.$ranopp.'"/>
				<input type="hidden" name="count" value="'.$question_counter.'"/>
				<input type="hidden" name="cor" value="'.$correct.'"/>
				<input type="hidden" name="gd" value="'.$game_done.'"/>';

// Quiz Not Done Show Try It Button
if($game_done == "")	{$form_block .= '<input type="submit" value = "Try It!" />';}
// Quiz Is Done Show Yes Button
if($game_done == "gd")	{$form_block .='<input type="submit" value = "Yes" />
						<input type="hidden" name="guess" value="'.$answer.'"/>'; $output = "";}
// XHTML OUTPUT
/* These are the last statements in the initial PHP block.
 * They set the HTTP Content-Type header and the first line
 * of XHTML output. Together, the lines declare that the 
 * following document is an XML document, encoded in the UTF-8
 * character set (Unicode).
 */
header( 'Content-Type: text/html; charset=utf-8');
print("<?xml version=\"1.0\" encoding=\"utf-8\"?>\n");
/* XHTML starts after the end-php tag */
?>

<?php 
	$file = "lab11.php";
	$date = "August 10, 2021";
	$title = "Braydon's Website";
	$desc = "Webpage for Lab 11";
	$banner = "Braydon's Website - Bonus Lab 11";
	include ('./header.php');?>
	<?php /* Output the content string that was processed above */
		print $body;
		print $output;
		print $form_block;
	?>	
<?php include ("./footer.php");?>