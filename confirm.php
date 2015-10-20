<? $broke = $_GET['link'];
include 'includes/db_connect.php'; 
$sql = "UPDATE link SET broken = '1' WHERE id = '$broke'";
mysqli_query($conn, $sql);
header('Location:index.php');?>
