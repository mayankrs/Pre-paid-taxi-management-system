<html>
<head>
<meta charset="UTF-8">
<title>Bill</title>
      <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="wrapper">
    <div class = "container">
<?php
session_start();
require_once('C:\Apache24\htdocs\mysqli_connect.php');
$cust = $_SESSION['cust'];

$source = $_SESSION['source'];
$destination = $_SESSION['destination'];

$sql = "select fare from chart where source = '$source' and destination = '$destination'";
$res= mysqli_query($dbc, $sql);

if (mysqli_num_rows($res) > 0){
    $row = mysqli_fetch_array($res);
    $fare = $row['fare'];
}

if ($_SESSION['feature'] == 'AC'){
    $fare = $fare * 1.2;
}

$sql = "select * from customer where custid = '$cust'";

if($result = mysqli_query($dbc, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>billid</th>";
                echo "<th>name</th>";
                echo "<th>source</th>";
                echo "<th>destination</th>";
                echo "<th>vehicle</th>";
                echo "<th>total fare</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            $a1 = $row['vehicle'];
            $sql1 = "select maxcap from vehicle where numplate = '$a1'";
            $res= mysqli_query($dbc, $sql1);
            
            if (mysqli_num_rows($res) > 0){
                $row1 = mysqli_fetch_array($res);
                $max = $row1['maxcap'];
            }
            if ($max > 4){
                $fare = $fare * 1.2;
            }
            echo "<tr>";
                echo "<td>" . $row['custid'] . "</td>";
                echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
                echo "<td>" . $row['source'] . "</td>";
                echo "<td>" . $row['destination'] . "</td>";
                echo "<td>" . $row['vehicle'] . "</td>";  
                echo "<td>" . $fare . "</td>";                
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
</div>
</div>
</body>
</html>