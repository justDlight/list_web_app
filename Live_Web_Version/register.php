<!-- HTML register form code -->
<!doctype html>  
<html>  
<head>  
    <title>Register</title>  
    <link rel="stylesheet" href="https://climbingtasmania.com/login.css">  
</head>  
<body>  
<div class="row" id="login-row">   
    <h1 id="login-header">REGISTER TO SAVE YOUR LIST</h1>
    <p><a href="register.php">Register</a> | <a href="https://climbingtasmania.com/login.php">Login</a></p>  
    <h2 id="login-sub-header">Registration Form</h2>

    <form id="rego-form" action="" method="POST">  
        <legend>  
        <fieldset>           
        Username: <input type="text" name="user"><br />  
        Password: <input type="password" name="pass"><br />   
        <input id="login-btn" type="submit" value="Register" name="submit" />           
        </fieldset>  
        </legend>  
    </form>
</div>

<!-- PhP code to register user into the list database table. -->
<?php  
if(isset($_POST["submit"])){  //If submit button is hit and user and password fields are not empty
    if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
        $user=$_POST['user'];  //Storing users password and username
        $pass=$_POST['pass'];  

        //Connecting to the database locally in this version
        $con=mysqli_connect('climbingtasmania.com.mysql','climbingtasmania_comlist','123456', "climbingtasmania_comlist") or die(mysql_error());  
        mysqli_select_db($con, 'climbingtasmania_comlist') or die("cannot select DB");  
  
        //Making an sql query to select the user
        $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."'");  
        $numrows=mysqli_num_rows($query);
          
        if($numrows==0) {  
            //inserting users values into the database
            $sql="INSERT INTO login(username,password,users_list) VALUES('$user','$pass','list')";
            
            //Creating failure & success messages for user
            $result=mysqli_query($con,$sql);  
            if($result) {  
                echo "<div style='text-align:center'>Account Successfully Created</div>";  
            } 
            else {  
                echo "<div style='text-align:center'>Failure!</div>";  
            }   
        } 
        else {  
            echo "<div style='text-align:center'>That username already exists! Please try again with another.</div>";  
        }   
    } 
    else {  
        echo "<div style='text-align:center'>All fields are required!</div>";  
    }  
}  
?> 
</body>  
</html>   