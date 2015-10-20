<?php
require('includes/db_connect.php');
$err_msg="";
$email = $_POST['email'];
$password = sha1($_POST['password']); 
$ip = $_SERVER['REMOTE_ADDR'];
 
if (isset($_POST) && !empty($_POST)) 
        {
if (empty($email)) 
        {
                $err_msg = $err_msg."Please enter a valid email<br \>";    
        };
         if (empty($password))
         {
             $err_msg = $err_msg."Please enter a password <br \>"; 
         }; 
        if (empty($err_msg)) 
        {
$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query) or die(mysql_error());
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
if ($count == 1)
		{
			//if ($ip != $row['ipaddress']) {
				//header('Location:ip_index.php');
			//}
			//else
			{ 
			
			
			
		$_SESSION['loggedIn'] = "true";
		$_SESSION['username'] = $row['username'];
		$_SESSION['level'] = $row['level'];
		$_SESSION['id'] = $row['user_id'];
		$_SESSION['email']=$row['email'];
		header('Location:index.php');
		exit();
		}
		}
		}
		}
?>	
		
        
        <div id="login_small">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">                   
                    <center>Email :    <input type="email" name="email" placeholder = "Enter your email"><br /><br />
                    Password : <input type="password" name="password" placeholder = "Enter a password"><br /><br />
                           	   <input type="submit" value="Login" />
                     <?php echo "<h3>".$err_msg."</h3>"; ?>
                     </center>
   		</form>
        </div>
        
