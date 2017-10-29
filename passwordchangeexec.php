<html>
<head>
<title>Add Customer</title>
</head>
<body>

<?php

session_start();

require_once('C:\Apache24\htdocs\mysqli_connect.php');
$pass1 = trim($_POST['newpass']);
$pass2 = trim($_POST['newpass1']);
$old = trim($_POST['oldpass']);
$user = $_SESSION['username'];

$sql = "select password from employee where username = '$user'";
$res= mysqli_query($dbc,$sql);

if (mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_array($res);
    echo $row['password'];
    if ($row['password'] == $old AND $pass1 == $pass2){
        $sql = "update employee set password = '$pass1' where username = '$user'";     
        $retval = mysqli_query($dbc, $sql); 
        if(! $retval ) {
          die('Could not update data: ' . mysql_error());
        }
        echo "Updated data successfully\n";    
        header("Location: mainpage.php"); 
    }
    else{
        printf("Error: %s\n", mysqli_error($dbc));
        header("Location: passwordchange.php");
    }
}
else{
    printf("Error: %s\n", mysqli_error($dbc));
    header("Location: passwordchange.php");
}
   
?>

</body>
</html>