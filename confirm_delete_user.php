<?php
        session_start();
		ob_start();
		if ($_SESSION['usedel'] != $_SESSION['username']){
			header('Location:index.php');}
		include_once "includes/db_connect.php";
		$id = $_GET['id'];
		$sql = "DELETE FROM link WHERE id='$id'";

		if (mysqli_query($conn, $sql)) 
		{?>
        
        <title>DELETED</title>
<link href="style/main.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Playbill' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="main">
<?php 
include 'includes/functions.php';
start_up();
echo '<div id="header">';
include 'style/header.php';
login_fields();
echo '</div>';?>
<center><h2>Deleted</h2></center>
        <center>Link successfully Deleted.</center><br />
        <center><a href="index.php" class="menu_button">Home</a></center><br />
        <br />
		<?php }?>