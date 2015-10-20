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
<?php 
include 'includes/functions.php';
include 'includes/db_connect.php';
start_up();
echo '<div id="header">';
include 'style/header.php';
login_fields();
echo '</div>';

 if ($_SESSION['loggedIn'] != "true") 
		{  
		echo '<center><h1>Welcome to l1nk3r</h1></center>';
		}
		else
		{
			echo '<div id="main">';?>
           	<div id="main">
           <h1>Report Broken Link</h1>
          <?php $broke = $_GET['id'];
		  $query = mysqli_query($conn, "SELECT * FROM link WHERE id = '$broke'");
			$row = mysqli_fetch_array($query);
			$title = $row['title'];
			$link = $row['link'];
			
		 		?>Link name - <?php echo $title;?> <br />
                URL - <a href="<?php echo $link; ?>"><?php echo $link; ?></a><br /><br />
                Click on link above to check again.
                <br />
                <br />
                Click <a href="confirm.php?link=<?php echo $broke; ?>">here </a>to confirm broken link 
		  <?php } ?>
		  
		  