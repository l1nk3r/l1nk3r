<?php
		session_start();
        ob_start();
		include_once "includes/db_connect.php";
      	$err_msg="";
		$email = $_POST['email'];
        $password = $_POST['password'];
		$password2 = $_POST['password2'];
		$success = "false";	
        if (isset($_POST) && !empty($_POST)) 
        {	
        if (empty($email)) 
        {
                $err_msg = $err_msg."Please enter a valid email <br \>";    
        };
        
		if (empty($password)) 
        {
                $err_msg = $err_msg."You need to enter a password <br \>";         
        };
		
		if (empty($password2)) 
        {
                $err_msg = $err_msg."You need to enter a second password <br \>";         
        };
		 
        if ($password == $password2)
		{	
				$err_msg = $err_msg."Your second password must not be the same as the first <br \>";
		}
		
		$check="SELECT * FROM users WHERE email = '$_POST[email]'";
			$rs = mysqli_query($conn, $check);
			$data = mysqli_fetch_array($rs, MYSQLI_NUM);
			if($data[0] > 1) {
   			 $err_msg = $err_msg."Email is already registered <br \>";}
			 
		if (empty($err_msg)) 
        {	
			 $ip = $_SERVER['REMOTE_ADDR'];
             $sql = "INSERT INTO users
                    (email, password, password2, ipaddress)
                    VALUES (
                    '".mysqli_real_escape_string($conn,$email)."', 
					'".mysqli_real_escape_string($conn, (sha1($password)))."',
					'".mysqli_real_escape_string($conn, (sha1($password2)))."',
					'".mysqli_real_escape_string($conn,$ip)."')";
                    mysqli_query($conn, $sql);
                    header('Location:profile_setup.php');
		}
        };
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>REGISTER</title>
        <link href="style/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <?php if($_SESSION['loggedIn'] == "true") 
	{ header('Location:index.php');
	}
	else
	{?>
    	<?php include 'style/header.php'; ?>
        <center>
        <h2>Register</h2>
        </center>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    	<?php  echo '<h3>'.$err_msg.'</h3>'; ?>
                    <table width="300" align="center" border="0">
                        <tbody>
              			<tr>
                            <td>Email :
                            </td>
                            <td><input type="email" name="email" placeholder = "Enter a valid email address" value ="<?php echo $email?>">
                            </td>
                        </tr>
                         <tr>
                            <td>Password :
                            </td>
                            <td><input type="password" name="password" placeholder = "Enter a password">
                            </td>
                        </tr>   
                         <tr>
                            <td>Second Password :
                            </td>
                            <td><input type="password" name="password2" placeholder = "Enter another password">
                            </td>
                        </tr>                            
                        </tbody>
                    </table>
                    <br />
                      <center>
                        <input type="submit" name="button" value="Register" alt="Submit Form" /> 
                     </center>
                </form>	

         </div>
        </div>
<?php } ?>