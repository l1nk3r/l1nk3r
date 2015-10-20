<?php
		session_start();
        ob_start();
		include_once "includes/db_connect.php";
      	$err_msg="";
		$title = $_POST['title'];
        $link = $_POST['link'];
		$description = $_POST['description'];
		$chain = $_POST['chain'];
		$username = $_SESSION['username'];
		$rating= $_POST['rating'];
		$date = date('l jS F Y');
		$success = "false";	
        if (isset($_POST) && !empty($_POST)) 
        {
			
		if (empty($rating)) 
        {
                $err_msg = $err_msg."Rating must not be empty <br \>";         
        };
				
        if (empty($title)) 
        {
                $err_msg = $err_msg."Please enter a title <br \>";    
        };
        
		if (empty($link)) 
        {
                $err_msg = $err_msg."You need to enter a link <br \>";         
        };
		
		if (empty($description)) 
        {
                $err_msg = $err_msg."Please enter a small description <br \>";         
        };
		
		if (empty($chain))
		{
			$err_msg = $err_msg."Enter a chain to add link to <br \>"; 
		}
		
		$check="SELECT * FROM link WHERE chain = '$_POST[chain]'";
			$rs = mysqli_query($conn, $check);
			$data = mysqli_fetch_array($rs, MYSQLI_NUM);
			if($data[0] < 1) {
   			 header('Location:create_chain.php?chain='.$chain.'');}
			 
			 else {
		
		if (empty($err_msg)) 
        {
						 $sql = "INSERT INTO link
                    (title, link, description, username, date, chain, rating)
                    VALUES (
                    '".mysqli_real_escape_string($conn,$title)."', 
					'".mysqli_real_escape_string($conn, $link)."',
					'".mysqli_real_escape_string($conn, $description)."',
					'".mysqli_real_escape_string($conn,$username)."',
					'".mysqli_real_escape_string($conn,$date)."', 
					'".mysqli_real_escape_string($conn,$chain)."',
					'".mysqli_real_escape_string($conn,$rating)."')";
                    mysqli_query($conn, $sql);
                    header('Location:index.php'); 
				}
			 }
        };
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Add Link</title>
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
        <h2>Add Multi-Link</h2>
        Got a series of links you want to share.<br />
        If the chain doesn't exist you'll be taken to another page to create a new chain.</center>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    	<?php  echo '<h3>'.$err_msg.'</h3>'; ?>
                    <table width="300" align="center" border="0">
                        <tbody>
              			<tr>
                            <td>Title :
                            </td>
                            <td><input type="text" name="title" placeholder = "Enter a valid title" value ="<?php echo $title; ?>">
                            </td>
                        </tr>
                         <tr>
                            <td>Link :
                            </td>
                            <td><input type="text" name="link" placeholder = "Enter a url" value ="<?php echo $link; ?>">
                            </td>
                        </tr>
                          <tr>
                            <td>Description :
                            </td>
                            <td><input type="text" name="description" placeholder = "Enter a short description" value ="<?php echo $description; ?>">
                            </td>
                        </tr> 
                         <tr>
                            <td>Chain :
                            </td>
                            <td><input type="text" name="chain" placeholder = "Enter a chain" value ="<?php echo $chain; ?>">
                            </td>
                        </tr> 
                        <td>Rating : 
                            </td>
                            <td><select name="rating">
                            <option value="1">General - For everyone</option>
                            <option value="2">NSFW - Not Safe For Work</option>
                            </select>         
                        </tbody>
                    </table>
                    <br />
                      <center>
                        <input type="submit" name="button" value="Add Link" alt="Submit Form" /> 
                     </center>
                </form>	

         </div>
        </div>
<?php } ?>