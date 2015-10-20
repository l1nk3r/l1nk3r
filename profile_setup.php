<?php
		include 'includes/functions.php';
		include 'includes/db_connect.php';
		start_up();
      	$err_msg="";
		$username = $_POST['username'];
        $avatar = $_POST['avatar'];
		$user_id = $_SESSION['id'];
		$success = "false";	
		$_SESSION['username'] = $username;
        if (isset($_POST) && !empty($_POST)) 
        {	
        if (empty($username)) 
        {
                $err_msg = $err_msg."Please enter a valid username <br \>";    
        };
        
		if (empty($avatar)) 
        {
                $err_msg = $err_msg."URL for avatar needs to be inserted <br \>";         
        };
		
		if (empty($err_msg)) 
		{
			$sql = "UPDATE users SET username = '$username', avatar= '$avatar', profpic = 1 WHERE user_id = '$user_id'"; 
                    mysqli_query($conn, $sql);
                    header('Location:index.php');
				}
        };
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Set Up Profile</title>
        <link href="style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    
    	<?php include 'style/header.php'; ?>
        <center>
        <h2>Profile Setup <?php echo $user_id; ?></h2>
        </center>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    	<?php  echo '<h3>'.$err_msg.'</h3>'; ?>
                    <table width="300" align="center" border="0">
                        <tbody>
              			<tr>
                            <td>Username :
                            </td>
                            <td><input type="text" name="username" placeholder = "Enter a valid username">
                            </td>
                        </tr>
                         <tr>
                            <td>Avatar :
                            </td>
                            <td><input type="text" name="avatar" placeholder = "URL for avatar">
                            </td>
                        </tr>                      
                        </tbody>
                    </table>
                    <br />
                      <center>
                        <input type="submit" name="button" value="Update" alt="Submit Form" /> 
                     </center>
                </form>	

         </div>
        </div>
