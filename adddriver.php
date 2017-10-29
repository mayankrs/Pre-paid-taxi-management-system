<html>
<head>
<title>Add Customer</title>
</head>
<body>

<?php

session_start();
$fname = trim($_POST['fname']);
$lname = trim($_POST['lname']);
$phone = trim($_POST['mobile']);
$salary = trim($_POST['salary']);
$work = trim($_POST['workshift']);
$vehicle = trim($_POST['vehicleid']);
$driver = 0;

$data_missing = array();

if(empty($data_missing)){
    
    require_once('C:\Apache24\htdocs\mysqli_connect.php');

    $query = "INSERT INTO driver (driverid, fname, lname, phone, salary, shift, vehicleid)
    VALUES (?, ?, ?, ?, ?, ?, ?)";
        
    $stmt = mysqli_prepare($dbc, $query);
    
    mysqli_stmt_bind_param($stmt, "issiiss", $driver, $fname, $lname, $phone, $salary, $work, $vehicle);

    mysqli_stmt_execute($stmt);
    
    $affected_rows = mysqli_stmt_affected_rows($stmt);
    
    if($affected_rows == 1){
        
        header("Location: mainpage.php"); /* Redirect browser */
                
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($dbc);
        exit();
        
    } else {
        
        echo 'Error Occurred<br />';
        echo mysqli_error($dbc);
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($dbc);
        
    }
    
} else {
    
    echo 'You need to enter the following data<br />';
    
    foreach($data_missing as $missing){
        
        echo "$missing<br />";
        
    }
    
}
    
?>

</body>
</html>