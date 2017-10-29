<!DOCTYPE html>
<head>
<meta charset="UTF-8" />
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
<title>Login and Registration Form with HTML5 and CSS3</title>
<link rel="stylesheet" type="text/css" href="css/style6.css" />
</head>
    <body>
        <?php

            session_start();
            
            require_once('C:\Apache24\htdocs\mysqli_connect.php'); 
            
            $user = $_SESSION['username'];

            $query = "SELECT superid from employee where username='$user'";

            $res= mysqli_query($dbc,$query);
           
            $row = mysqli_fetch_array($res);
            
            if($row['superid'] == NULL)
            {                
                header("Location: managedriver.php"); /* Redirect browser */
                exit();
            }

            else
            {
                header("Location: mainpage.php");
                exit();
            }
            
        
        ?>
    </body>
</html>