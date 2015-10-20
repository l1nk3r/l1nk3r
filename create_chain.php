<?php
session_start();
		ob_start();
		include 'includes/db_connect.php';
		$chain_name = $_GET['chain'];
		$desc = $_POST['desc'];
		$username = $_SESSION['username'];
		$title = $_GET['title'];
		$link = $_GET['link'];
		$description = $_GET['description'];
		$rating = $POST['rating'];
		$date = date("Y-m-d H:i:s"); 
		 if (isset($_POST) && !empty($_POST)) 
        {	
         
         if (empty($desc)) 
        {
                $err_msg = $err_msg."A brief description <br \>";         
        };
       
        if (empty($err_msg)) 
        { $chain_name = $_POST['cn'];
             $sql = "INSERT INTO chain
                    (chain_name, owner, description)
                    VALUES (
					'".mysqli_real_escape_string($conn, $chain_name)."',
					'".mysqli_real_escape_string($conn, $username)."',
                    '".mysqli_real_escape_string($conn, $desc)."')"; 
                    mysqli_query($conn, $sql);
					$chain = $_POST['chain'];
					$title = $_POST['title'];
					$link = $_POST['link'];
					$description = $_POST['description'];
					$rating = $POST['rating'];
					 $sql2 = "INSERT INTO link
                    (title, link, description, username, date, chain, rating)
                    VALUES (
                    '".mysqli_real_escape_string($conn,$title)."', 
					'".mysqli_real_escape_string($conn, $link)."',
					'".mysqli_real_escape_string($conn, $description)."',
					'".mysqli_real_escape_string($conn,$username)."',
					'".mysqli_real_escape_string($conn,$date)."', 
					'".mysqli_real_escape_string($conn,$chain_name)."',
					'".mysqli_real_escape_string($conn,$rating)."')";
                    mysqli_query($conn, $sql2);
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
        <h2><?php echo 'Create Chain'?></h2>
        <br />
        Please use the forms below to create your chain
        <br />
        <br />
       	
        <b>Description of the chain</b><br /><br />
        <textarea name="desc" placeholder = "What is your chain description"></textarea> <br /><br />
        <tr>
        					
                            <td>Chain Name :<br /><br />
                            </td>
                            <td><input type="text" name="cn" placeholder = "Enter a valid chain" value ="<?php echo $chain_name; ?>"><br /><br />
                            </td>
                        </tr>
                            <tr>
                            <td>Link Title :<br /><br />
                            </td>
                            <td><input type="text" name="title" placeholder = "Enter a valid title" value ="<?php echo $title; ?>">
                            </td>
                        </tr>
                         <tr><br /><br />
                            <td>Link :<br /><br />
                            </td>
                            <td><input type="text" name="link" placeholder = "Enter a url" value ="<?php echo $link; ?>">
                            </td><br /><br />
                        </tr>
                          <tr>
                            <td>Description :<br /><br />
                            </td>
                            <td><input type="text" name="description" placeholder = "Enter a short description" value ="<?php echo $description; ?>"><br /><br />
                            </td>
                        </tr>
                        <td>Rating :<br /><br /> 
                            </td>
                            <td><select name="rating">
                            <option value="1">General - For everyone</option>
                            <option value="2">NSFW - Not Safe For Work</option>
                            </select><br /><br />         
        <input type="submit" name="button" value="Add New Chain" alt="Submit Form" />
        </td>
        </center>
        </form></div>
       
        <?php   
		 };
	
		  ?>