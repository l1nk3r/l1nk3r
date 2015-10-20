<?php
session_start();
include 'includes/db_connect.php';

$id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE user_id='$id'";
$profile = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($profile);	
$profpic = $row['profpic'];
$username = $row['username'];
$avatar = $row['avatar'];
$err_msg = (isset($_GET['err_msg']) ? $_GET['err_msg'] : null);
if ($profpic == 0) {
	header('Location:profile_setup.php');
}
else {

if ($_SESSION['loggedIn'] != "true") 
		{ 
	header('Location:index.php');	
		} else {
			
			
			$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
			$row = mysqli_fetch_array($query);			
			$uname = $_POST['username'];
        	$mail = $_POST['email'];
			$pass = $_POST['password'];
			$pass2 = $_POST['password2'];
			$atar = $_POST['avatar'];
			$id = $row['user_id'];
			
			$username = $row['username'];
			$email = $_SESSION['email'];
			$password = $row['password'];
			$password2 = $row['password2'];
			$avatar = $row['avatar'];
			if (isset($_POST) && !empty($_POST)) 
        {
        
		if (empty($mail)) 
        {
                $err_msg = $err_msg."Email can't be empty <br \>";    
        };

		 if (empty($pass)) 
		 {
			 $pass = $row['password'];
		 } else {
			 $pass = sha1($_POST['password']);
		 }
		 
		  if (empty($pass2)) 
		 {
			 $pass2 = $row['password2'];
		 } else {
			 $pass2 = sha1($_POST['password2']);
		 }
		 
		 if ($pass == $pass2)
		{	
				$err_msg = $err_msg."Your second password must not be the same as the first <br \>";
		}
		
			 
        if (empty($err_msg)) 
        { 
             $sqlup = "UPDATE users SET avatar= '$atar', password = '$pass', password2 = '$pass2', email = '$mail' WHERE user_id = '$id'"; 
                   mysqli_query($conn, $sqlup);
                    header('Location:index.php');
					
					
		}
		}
			?>

<table>
    <tbody>
  
    <tr>
  
  <td width="240px"><br />
    <img src="<?php echo $avatar; ?>" width="200px" border="1"><br /></td>
    <td>
  
  <h1>Your Profile</h1>
  <h5><?php echo $err_msg; ?></h5>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?id=".$id;?>">
  
  <table width="650" border="0">
    <tbody>
        <td>Profile Picture : </td>
        <td><input type="text" name="avatar" value ="<?php echo $avatar; ?>"></td>
      </tr>
      <tr>
        <td>Your Email :</td>
        <td><input type="text" name="email" value ="<?php echo $email; ?>"></td>
      </tr>
      <tr>
        <td>Your Password : (Leave blank to keep the same)</td>
        <td><input type="password" name="password" ></td>
      </tr>
      <tr>
        <td>Your 2nd Password : (Leave blank to keep the same)</td>
        <td><input type="password" name="password2" ></td>
      </tr>
    </tbody>
  </table>
  <input type="submit" value="Submit" />
    </td>
  
    </tr>
  
    </tbody>
  
</table>
</div>
</div>

<?php } }?>
