<!DOCTYPE html><html>
<head>
<title>PHP Pagination</title>
</head><body><?php
// Establish Connection to the Database
include 'includes/db_connect.php';
include 'includes/functions.php';
$per_page=2;
if (isset($_GET[“page”])) {

$page = $_GET[“page”];

}

else {

$page=1;

}

// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

//Selecting the data from table but with limit
$query = "SELECT * FROM link LIMIT ".$start_from.", ".$per_page."";
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

$timeAgoObject = new convertToAgo; // Create an object for the time conversion functions

// Query your database here and get timestamp

$ts = $created;

$convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time

$when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time 


?>
           
<table>
  <tbody>
    <tr>
      <td width="120px">   
      <img src="<?php echo $avatar; ?>" width = "100" ><br />
      <a href="posted_by.php?user=<?php echo $name; ?>"><?php echo $name;?></a><br />
   		<?php echo $when; ?>
      
   </td>
      <td width="650px"><h2><a href="<?php echo $link ?>"><?php echo $title; ?></a></h2>
      <?php echo nl2br($description.'<br />');?>
      posted to - <a href="chain.php?chain=<?php echo $chain ?>"><?php echo $chain; ?></a><br />
      <br />
      <br />
    </td>
    <td align="right">
    
    
    <?php 
	include 'user_menu.php';
		
	?>
    </td>
    </tr>
  </tbody>
</table>
      
       <img src="images/line.jpg" width="100%">
           
           
            
		<?php } 
		
		?>

<div>
<?php

//Now select all from table
$query = "select * from link";
$result = mysqli_query($conn, $query);

// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
?><center><a href="test.php?page=1">First Page</a>
<?php 
for ($i=1; $i<=$total_pages; $i++) {

?><a href="test.php?page=<?php echo $i; ?>"><?php echo $i; ?></a><?php 
};
// Going to last page
?><a href="test.php?page=<?php echo $total_pages;?>">Last Page</a></center>


</div>

</body>
</html>