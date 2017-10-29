<html>
<head>
<title>Add Customer</title>
</head>
<body>

<?php

session_start();
require_once('C:\Apache24\htdocs\mysqli_connect.php');

$feature = $_SESSION['feature'];
$num = $_SESSION['num'];

$sql = "select * from vehicle where feature = '$feature' and maxcap >= '$num'";

if($result = mysqli_query($dbc, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>vehicleid</th>";
                echo "<th>name</th>";
                echo "<th>maxcap</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['numplate'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['maxcap'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

?>

<form action="updatevehicleexec.php" method="post">
      
    <fieldset>
        
        <label for="vehicleid">vehicleid:</label>
        <input type="text" id="vehicle" name="vehicle">
        
    <button type="submit">Submit</button>
</form>
</body>
</html>