<!-- HTML register form code -->
<!doctype html>  
<html>  
<head>  
    <title>Register</title>  
    <link rel="stylesheet" href="login.css">  
</head>  
<body>  
<div class="row" id="login-row">   
    <h1 id="login-header">REGISTER TO SAVE YOUR LIST</h1>
    <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>  
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
        $con=mysqli_connect('localhost','root','') or die(mysql_error());  
        mysqli_select_db($con, 'list_database') or die("cannot select DB"); 
  
        //Making an sql query to select the user
        $query=mysqli_query($con, "SELECT * FROM login WHERE username='".$user."'");  
        $numrows=mysqli_num_rows($query);
          
        if($numrows==0) {  
            //inserting users values into the database
            $sql="INSERT INTO login(username,password,users_list) VALUES('$user','$pass','list')";
            
            //Creating failure & sucess messages for user
            $result=mysqli_query($con,$sql);  
            if($result) {  
                echo "Account Successfully Created";  
            } 
            else {  
                echo "Failure!";  
            }   
        } 
        else {  
            echo "That username already exists! Please try again with another.";  
        }   
    } 
    else {  
        echo "All fields are required!";  
    }  
}  
?>  
</body>  
</html>   