<html>
<head>
<title>Add Customer</title>
</head>
<body>

<?php
require_once('C:\Apache24\htdocs\mysqli_connect.php');
$route = trim($_POST['routeid']);
$fare = trim($_POST['fare']);
$sql = "update chart set fare = '$fare' where routeid = '$route'";     
$retval = mysqli_query($dbc, $sql); 
if(! $retval ) {
die('Could not update data: ' . mysql_error());
}
echo "Updated data successfully\n";
header("Location: mainpage.php");     
?>  

</body>
</html>