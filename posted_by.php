<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Posted By</title>
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
            <?php $u = $_GET['user'];?>
           <center><h1>Posted By <?php echo $u;?></h1></center>
           <?php 
		  
           $query = "SELECT * FROM link WHERE username = '$u'";
        $list = mysqli_query($conn, $query);
        while($links = mysqli_fetch_array($list)){
$link_id = $links['id'];
$title = $links['title'];
$link = $links['link'];
$description = $links['description'];
$created = $links['date'];
$username = $links['username'];
$chain = $links['chain'];
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
      <a href="posted_by.php?user=<?php echo $name; ?>"><?php echo $name;?></a><br />
      <?php echo $created; ?><br />
   </td>
      <td width="650px"><h2><a href="<?php echo $link ?>"><?php echo $title; ?></a></h2>
      <?php echo nl2br($description.'<br />');?>
      posted to - <a href="chain.php?chain=<?php echo $chain ?>"><?php echo $chain; ?></a><br />
      <br />
      <br />
    </td>
    <td align="right">
    
    
    <?php 
	$uname = $_SESSION['username'];
     if ($username == $uname) {
		echo '<a href="delete_post_user.php?id='.$link_id.'">Delete Post</a><br />';
		echo '<a href="edit_post_user.php?id='.$link_id.'">Edit Post</a><br />';
		} else { ?>
        <a href="save.php?id=<?php echo $link_id; ?>">Save Link</a><br />
    <a href="broken.php?id=<?php echo $link_id; ?>">Broken Link</a><br />
    Report Link<br />
    User Profile<br />
    Message User<br />
    Favorite Chain<br />
    <?php } 
	
	if ($_SESSION['level'] == "admin")
	{
	echo '<a href="delete_post.php?id='.$link_id.'" style="color:#dd0000">Delete Post</a><br />';
		echo '<a href="edit_post.php?id='.$link_id.'" style="color:#dd0000">Edit Post</a><br />'; } 
		
	?>
    </td>
    </tr>
  </tbody>
</table>
      
       <img src="images/line.jpg" width="100%">
           
           
            
		<?php } 
		}
		?>
</div>
</body>
</html>