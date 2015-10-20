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
require('includes/db_connect.php');
$ip = $_SERVER['REMOTE_ADDR'];
echo '<center><h1>Unassociated IP address</h1></center>';
echo '<center><h2><font color = "red">'.$ip.'
</h2> <font color="black">is not a registered IP address associated with this account. Would you like to ';?><a href="http://www.l1nk3r.com/ip_add.php">add</a> <?php echo 	'it to this account?<br /><br />

You are allowed 3 IP addresses for your account.';

?>	