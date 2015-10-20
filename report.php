<?php
session_start();
		ob_start();
		include 'includes/db_connect.php';
		$lid = $_GET['id'];
		$how= $_POST['offensive'];
		$legal = $_POST['illegal'];
		$actions = $_POST['action'];
		$username = $_SESSION['username'];
		 if (isset($_POST) && !empty($_POST)) 
        {	
         if (empty($how)) 
        {
                $err_msg = $err_msg."Without a description we don't how you were offended<br \>";         
        };
         if (empty($legal)) 
        {
                $err_msg = $err_msg."The internet is a big place and laws differ, we need to know yours <br \>";         
        };
        if (empty($actions)) 
        {
                $err_msg = $err_msg."Let us know how you would like us to deal with it <br \>";  
        };
		
        if (empty($err_msg)) 
        {
			$lid = $_GET['id'];
             $sql = "INSERT INTO report
                    (link_id, username, how, illegal, action)
                    VALUES (
					'".mysqli_real_escape_string($conn, $lid)."',
					'".mysqli_real_escape_string($conn, $username)."',
					'".mysqli_real_escape_string($conn, $how)."',
                    '".mysqli_real_escape_string($conn, $legal)."', 
                    '".mysqli_real_escape_string($conn, $actions)."')"; 
                    mysqli_query($conn, $sql);
                    header('Location:index.php');
				}
        };
 ?>
            <html>
    <head>
        <meta charset="utf-8">
        <title>Report Bug</title>
        <link href="style/style.css" rel="stylesheet" type="text/css">
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
    	<?php include 'style/header.php';
		include "includes/menu.php" ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <center>
        <h2>Report A Link <?php echo $lid; ?></h2>
        <br />
        Please use the forms below to report a Link.
        <br />
        <br />
        <b>How is this link offensive?</b><br />
        <textarea name="offensive" placeholder = "What offended you?"></textarea><br /><br />
        <b>Is this illegal where you are from?</b><br /><br />
        <textarea name="illegal" placeholder = "Does it break the law?"></textarea> <br /><br />
        <b>What action would you like to see us take?</b> <br /><br />
        <textarea name="action" placeholder = "Your suggestion?"></textarea><br /><br />
        <input type="submit" name="button" value="Submit Bug" alt="Submit Form" />
        <?php   
		 };
	
		  ?>