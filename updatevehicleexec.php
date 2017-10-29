<html>
<head>
<title>Add Customer</title>
</head>
<body>

<?php
session_start();
require_once('C:\Apache24\htdocs\mysqli_connect.php');
$vehicle = trim($_POST['vehicle']);
$cust = $_SESSION['cust'];
$sql = "update customer set vehicle = '$vehicle' where custid = '$cust'";     
$retval = mysqli_query($dbc, $sql); 
if(! $retval ) {
die('Could not update data: ' . mysql_error());
}

$user = $_SESSION['username'];

$sql = "select location from employee where username = '$user'";
$res= mysqli_query($dbc, $sql);

if (mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_array($res);
    $location = $row['location'];
}

$_SESSION['source'] = $location;

$sql = "update customer set source = '$location' where custid = '$cust'";     
$retval = mysqli_query($dbc, $sql); 
if(! $retval ) {
die('Could not update data: ' . mysql_error());
}

echo "Updated data successfully\n";

header("Location: mainpage.php");     
?>  

</body>
</html>