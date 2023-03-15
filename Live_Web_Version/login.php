<?php
session_start();

if(isset($_POST["submit"])){  
    //If submit button is hit and user and password fields are not empty
    if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
        $user=$_POST['user'];  
        $pass=$_POST['pass'];  

        //Connecting to the database locally in this version
        $con=mysqli_connect('climbingtasmania.com.mysql','climbingtasmania_comlist','123456', "climbingtasmania_comlist") or die(mysql_error());  
        mysqli_select_db($con, 'climbingtasmania_comlist') or die("cannot select DB");   

        //Making an sql query to select the user
        $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."' AND password='".$pass."'");  
        $numrows=mysqli_num_rows($query);

        if($numrows!=0)  
        {  
            //iterate over the rows returned
            while($row=mysqli_fetch_assoc($query)) {  
                $dbusername=$row['username'];  
                $dbpassword=$row['password'];  
            }  
            //if the users columns are found and match what the user inputted
            //the user is can then be directed too the login screen.
            if($user == $dbusername && $pass == $dbpassword) {  
                $_SESSION['sess_user']=$user;  

                /* Redirect browser */  
                header("Location: https://climbingtasmania.com/member.php");
                exit();
            }  
        } 
        //Error messages
        else {  
            echo "Invalid username or password!";  
        }  
    } 
    else {  
        echo "All fields are required!";  
    }  
}  
?>

<!-- HTML login form code -->
<!doctype html>  
<html>

<head>  
    <title>Login</title>  
    <link rel="stylesheet" href="https://climbingtasmania.com/login.css">
</head>

<body>
    <div class="row" id="login-row">
        <h1 id="login-header">JW List Application</h1>
        <h1>Login</h1>
        <h1 id="login-sub-header">Login, create an account or continue as guest</h1>  
        <p><a href="register.php">Register</a> | <a href="login.php">Login</a> | <a href="guest.php">Continue as guest</a></p>  
        <h3>Login Form</h3>

        <form action="" method="POST">  
        Username: <input type="text" name="user"><br />  
        Password: <input type="password" name="pass"><br />   
        <input id="login-btn" type="submit" value="Login" name="submit" />  
        </form>
    </div>
    <div class="row" id="login-row-vid">
        <h1>Video Demo Of How Site Works</h1>
        <video id="video" controls>
              <source src="https://climbingtasmania.com/list_app_demo.mp4" type="video/mp4">
              <source src="mov_bbb.ogg" type="video/ogg">
              Your browser does not support HTML video.
        </video>
    </div>
</body>  
</html> 