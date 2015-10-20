<?php
		session_start();
        ob_start();
		include_once "includes/db_connect.php";
      	$err_msg="";
		$task = $_POST['task'];
		$description = $_POST['description'];
		$section = $_POST['section'];
		$importance = $_POST['importance'];
		$date = date('l jS \of F Y');
		$success = "false";	
        if (isset($_POST) && !empty($_POST)) 
        {
			
		if (empty($task)) 
        {
                $err_msg = $err_msg."Task must not be empty <br \>";         
        };
				
        if (empty($description)) 
        {
                $err_msg = $err_msg."Description should not be empty <br \>";    
        };
        
		if (empty($section)) 
        {
                $err_msg = $err_msg."Section <br \>";         
        };
		
		if (empty($importance)) 
        {
                $err_msg = $err_msg."Set importance level <br \>";         
        };
		
		
		
		if (empty($err_msg)) 
        {
						 $sql = "INSERT INTO todo
                    (task, description, section, importance, date)
                    VALUES (
                    '".mysqli_real_escape_string($conn,$task)."', 
					'".mysqli_real_escape_string($conn, $description)."',
					'".mysqli_real_escape_string($conn, $section)."',
					'".mysqli_real_escape_string($conn,$importance)."',
					'".mysqli_real_escape_string($conn,$date)."')";
                    mysqli_query($conn, $sql);
                    header('Location:index.php'); 
				}
			 
        };
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add to To Do List</title>
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
        
        <center>
        <h2>Add To Do</h2>
      </center>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    	<?php  echo '<h3>'.$err_msg.'</h3>'; ?>
                    <center>
                            Task :<br /><br />
                            <input type="text" name="task"><br /><br />
                         	Description :<br /><br />
                             <textarea name="description"></textarea><br /><br />
                            Section :<br /><br />
                            <input type="text" name="section"><br /><br />
                            Importance :<br /><br />
                          
                            <select name="importance">
                            <option value="1">Low</option>
                            <option value="2">Medium</option>
                            <option value="3">High</option>
                            <option value="4">Very High</option>
                            </select> 
                    <br /><br />
                      <center>
                        <input type="submit" name="button" value="Add To Do" alt="Submit Form" /> 
                     </center>
                </form>	

         </div>
        </div>
<?php } ?>