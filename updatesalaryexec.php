<html>
<head>
<title>Add Customer</title>
</head>
<body>

<?php

session_start();

require_once('C:\Apache24\htdocs\mysqli_connect.php');
$driver = trim($_POST['driverid']);
$salary = trim($_POST['salary']);
$sql = "update driver set salary = '$salary' where driverid = '$driver'";     
$retval = mysqli_query($dbc, $sql); 
if(! $retval ) {
  die('Could not update data: ' . mysql_error());
}
echo "Updated data successfully\n";    
header("Location: mainpage.php"); 
   
?>

</body>
</html>