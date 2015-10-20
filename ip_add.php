<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>l1nk3r - Home</title>
<link href="style/main.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Playbill' rel='stylesheet' type='text/css'>
</head>
<body>
<?php 
include 'includes/functions.php';
start_up();
echo '<div id="header">';
include 'style/header.php';
echo '</div>';

 if ($_SESSION['loggedIn'] != "true") 
		{  
		header('Location:index.php');
		}
		else
		{
			echo '<center><h1>Add New IP Addressr</h1></center>';
			
		} ?>
</div>
</body>
</html>