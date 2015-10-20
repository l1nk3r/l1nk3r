<!doctype html>

<html>
<head>
<meta charset="UTF-8">
<title>To Do List</title>
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
include 'includes/db_connect.php';
echo '</div>';

 if ($_SESSION['loggedIn'] != "true") 
		{  
		header ('Location:index.php');
		}
		else
		{
			echo '<div id="main">';
			?>
           	<div id="main">
           
           <?php 
           $query = "SELECT * FROM bugs";
        $list = mysqli_query($conn, $query);
        while($links = mysqli_fetch_array($list)){
		$bug_id = $links['id'];
		$username = $links['username'];
		$happened = $links['happened'];
		$doing = $links['doing'];
		$device = $links['device'];
$query2 = "SELECT * from users where username = '$username'";
$link_user = mysqli_query($conn, $query2);
$link_name = mysqli_fetch_array($link_user);
$name = $link_name['username'];
$avatar = $link_name['avatar'];
?>

<table>
  <tbody>
    <tr>
      <td width="120px">   
       
	 <img src="<?php echo $avatar; ?>" width = "100" ><br />
      <?php echo $name; ?><br />
	  
	   
   	  </td>
      <td width="650px">
      <b>description - </b><?php echo nl2br($happened.'<br />');?>
      <b>user was - </b><?php echo $doing; ?><br />
      <b>device - </b><?php echo $device; ?><br />
    </td>
    </tr>
  </tbody>
</table>
      <?php echo '<a href="delete_bug.php?id='.$bug_id.'">Delete</a><br />';?>
       <img src="images/line.jpg" width="100%">
           
           
            
		<?php } 
		}
		?>
</div>
</body>
</html>