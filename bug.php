<?php
session_start();
		ob_start();
		include 'includes/db_connect.php';
		$bug = $_POST['bug_happened'];
		$doing = $_POST['doing_happened'];
		$device = $_POST['device'];
		$username = $_SESSION['username'];
		 if (isset($_POST) && !empty($_POST)) 
        {	
         if (empty($bug)) 
        {
                $err_msg = $err_msg."Without a description we don't know what happened<br \>";         
        };
         if (empty($doing)) 
        {
                $err_msg = $err_msg."We need to know how the bug happened <br \>";         
        };
        if (empty($device)) 
        {
                $err_msg = $err_msg."Please enter what you were using <br \>";  
        };
		
        if (empty($err_msg)) 
        {
             $sql = "INSERT INTO bugs
                    (username, happened, doing, device)
                    VALUES (
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $bug)."',
                    '".mysqli_real_escape_string($conn, $doing)."', 
                    '".mysqli_real_escape_string($conn, $device)."')"; 
                    mysqli_query($conn, $sql);
                    header('Location:index.php');
				}
        };
 ?>
            <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Bug</title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>
    <body>
    <?php if($_SESSION['loggedIn'] != "true") 
	{ header('Location:index.php');
	}
	else
	{?>
    
    <!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>l1nk3r - Home</title>
<link href="style/main.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Playbill' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="main">

    	<nav class="navbar navbar-default">
    	  <?php include 'style/header.php';
		include "includes/menu.php" ?>
  	  </nav>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <center>
    <h2>Report A Bug</h2>
        <br />
        Please use the forms below to report a Bug.
        <br />
        <br />
        <b>What happened?</b><br />
        <textarea name="bug_happened" placeholder = "Describe what happened"></textarea><br /><br />
        <b>What were you doing when it happened?</b><br />
        <textarea name="doing_happened" placeholder = "What you were doing?"></textarea> <br /><br />
        <b>What device are you using?</b> <br />
        <textarea name="device" placeholder = "What device?"></textarea><br /><br />
        <input type="submit" name="button" value="Submit Bug" alt="Submit Form" />
        <?php   
		 };
	
		  ?>
    <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
    