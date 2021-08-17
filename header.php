<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./css/webd2201.css" /> 
	<!--
	Author: Braydon Duprey
	Filename: <?php echo $file; ?>
	Date: <?php echo $date; ?>
	Description: <? echo $description; ?>
	-->
	<?php 
	ob_start();
	require ("./includes/functions.php"); ?>
	<title>WEBD2201 - <?php echo $title; ?></title><!-- THE <title> WILL COME FROM A PHP VARIABLE TOO -->
</head>
<body>
<div id="container">
	<div id="header">
		<img src="./pictures/logo1.PNG" alt="Website Logo" />
		<h1>
			<?php echo $banner; ?>
		</h1>
	</div>
	<div id="sites">
		<ul>
			<li><a href="http://opentech.durhamcollege.org/pufferd/webd2201/">WEBD2201</a></li>
			<li><a href="http://www.w3schools.com">W3Schools</a></li>
			<li><a href="http://validator.w3.org">XHTML Validator</a></li>
			<li><a href="http://jigsaw.w3.org/css-validator/">CSS Validator</a></li>			
			<li><a href="http://php.net/manual/en/index.php">PHP Manual</a></li>
			<li><a href="http://www.durhamcollege.ca">Durham College</a></li>
			
		</ul>
	</div>
	<div id="content-container">
		<div id="navigation">
			<h3>
				Local Navigation Bar
			</h3>
			<ul>
				<li><a href="./index.php">WEBD2201 Home Page</a></li>
				<li><a href="./lab1.php">Lab 1: Basic XHTML pages</a></li>
				<li><a href="./lab2.php">Lab 2: HTML Tables</a></li>
				<li><a href="./lab3.php">Lab 3: Formatting with Styles</a></li>
				<li><a href="./lab4.php">Lab 4: PHP Chapter Files </a></li>
				<li><a href="./lab5.php">Lab 5: Basic PHP Scripting </a></li>
				<li><a href="./lab6.php">Lab 6: Self-refering Forms </a></li>
				<li><a href="./lab7.php">Lab 7: Database Intro </a></li>
				<li><a href="./lab9.php">Lab 9: User Login </a></li>
				<li><a href="./lab10.php">Lab 10: User Registration </a></li>
				<li><a href="./lab11.php">Lab 11: Bonus Math Lab </a></li>
				<li><a href="./termtest3.php">Test 3: Term Test 3 </a></li>
				<!-- <li><a href="./termtest2.php">Test 2: Term Test 2 </a></li> -->
			</ul>
		</div>
		<div id="content">
		<!-- start of main page content. --> 