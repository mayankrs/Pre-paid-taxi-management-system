<html>
<head>
<title>Add Customer</title>
</head>
<body>

<?php

session_start();

require_once('C:\Apache24\htdocs\mysqli_connect.php');
$driver = trim($_POST['driverid']);
$sql = "delete from driver where driverid = '".$_POST['driverid']."'";     
$retval = mysqli_query($dbc, $sql); 
if(! $retval ) {
  die('Could not delete data: ' . mysql_error());
}
echo "Deleted data successfully\n";    
header("Location: mainpage.php"); 
   
?>

</body>
</html>