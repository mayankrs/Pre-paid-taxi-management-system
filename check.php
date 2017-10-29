<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
<meta charset="UTF-8" />
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
<title>Login and Registration Form with HTML5 and CSS3</title>
<link rel="stylesheet" type="text/css" href="css/style6.css" />
</head>
    <body>
        <?php

            session_start();

            $a1 = trim($_POST['uname']);
            $a2 = trim($_POST['pass']);
                       
            $data_missing = array();
            
            if(empty($data_missing)){
                
                require_once('C:\Apache24\htdocs\mysqli_connect.php'); 
                
                $query = "SELECT * from employee where username='$a1' and password='$a2'";

                $res= mysqli_query($dbc,$query);

                if (!$res) {
                    printf("Error: %s\n", mysqli_error($dbc));
                    
                    }
                
                $row = mysqli_fetch_array($res);
                
                if($row['username']==$a1 AND $row['password']==$a2)
                {
                    $_SESSION['username']=$row['username'];
                    
                    header("Location: mainpage.php"); /* Redirect browser */
                    exit();
                }

                else
                {
                    print("Wrong Username or Password");
                    header("Location: index.html");
                    exit();
                }
                
            }
        ?>
    </body>
</html>