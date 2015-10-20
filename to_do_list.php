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
           $query = "SELECT * FROM todo ORDER BY importance DESC";
        $list = mysqli_query($conn, $query);
        while($links = mysqli_fetch_array($list)){
		$todo_id = $links['id'];
		$task = $links['task'];
		$description = $links['description'];
		$section = $links['section'];
		$date = $links['date'];
		$importance = $links['importance'];
?>

<table>
  <tbody>
    <tr>
      <td width="120px">   
      <?php 
	  if ($importance == "1") 
	  {
		echo '<img src="/images/low.jpg"';
	  }	
	  
	  if ($importance == "2") 
	  {
		echo '<img src="/images/medium.jpg"';
	  }	
	  
	   if ($importance == "3") 
	  {
		echo '<img src="/images/high.jpg"';
	  }	
	  
	   if ($importance == "4") 
	  {
		echo '<img src="/images/v_high.jpg"';
	  }	
	  
	   ?>
   	  </td>
      <td width="650px"><h2><?php echo $task; ?></h2>
      <b>description - </b><?php echo nl2br($description.'<br />');?>
      <b>section - </b><?php echo $section; ?><br />
      <b>date - </b><?php echo $date; ?><br />
      <br />
    </td>
    </tr>
  </tbody>
</table>
      <?php echo '<a href="delete_todo.php?id='.$todo_id.'">Delete</a><br />';?>
       <img src="images/line.jpg" width="100%">
           
           
            
		<?php } 
		}
		?>
</div>
</body>
</html>