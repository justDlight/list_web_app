<!-- Starrting the session -->
<?php   
session_start();  
if(!isset($_SESSION["sess_user"])){  
    header("location:index.php");  
} else {  
?>
  
<!doctype html>  
<html>

<head>  
    <title>List</title>
    <link rel="stylesheet" href="member.css?v=<?php echo time(); ?>"><!-- Get instant response when refreshing css cache -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="myapp.js"></script><!-- My javascript code file included-->
    <!-- CDN Content distribution network for bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CDN Content distribution network for bootstrap css -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <!--Creating a bootstrap grid for styling -->
    <div class="container-fluid">
        <div class="row" id="header">
            <div class="row" id="row1"><!-- START OF ROW -->
                <div class="col" id="col1" style="text-align:center;">
                    <!-- HTML title section -->  
                    <!-- Welcoming the user based on the session -->
                    <h1 id="welcome_txt">Welcome, <span><?=$_SESSION['sess_user'];?></span>! <a href="logout.php">Logout</a></h1>
                    <br/>  
                    <h3>The List Application</h3>
                    <br/>
                    <!-- GIF of notebook -->
                    <img id="notebook_gif" src="https://lightintime.com/img/book.gif">
                    <br/>
                    <a href="#row3" id="jump_list_down">Jump to make list</a>
                    <br/>
                    <br/>
                </div>
            </div><!--END OF ROW -->
            <div class="row" id="row2"><!-- START OF ROW -->
            <!-- Previous list HTML Section with PhP to show previous users list retrived from database -->
                <div class="col" style="text-align:center;">             
                    <h1 id="prev_list_header">This was your previous saved list!</h1>
                    <br>
                    <!-- List img png -->
                    <img src="https://lightintime.com/img/list_img.png" id="list_img">
                    <h5 id="prev_list_txt">Previous List:</h5>
                    <h5 id="prev_list_php">
                        <br/> 
                        <?php
                            //storing the current logged in users username
                            $user1 = $_SESSION['sess_user'];

                            //Connecting to the databse
                            $con = mysqli_connect('localhost', 'root', '') or die(mysql_error());
                            mysqli_select_db($con, 'list_database') or die("cannot select DB");

                            // Retrieve the users_list value for the logged in user
                            $sql1 = "SELECT users_list FROM login WHERE username = '$user1'";
                            $result = mysqli_query($con, $sql1);
                            $row = mysqli_fetch_assoc($result);
                            $usersList = $row['users_list'];

                            // Convert the comma-separated values into an array
                            $items = explode(',', $usersList);

                            // Echoing out each item on a new line
                            foreach ($items as $item) {
                                echo $item . "<br>";
                            }
                        ?>
                    </h5>
                    <button id="prev_list_dwn" onclick="downloadUsersList()">Download</button>
                    <!-- Add a download button -->
                    <br/>
                </div>
            </div>
        </div><!--END OF ROW -->
        
        <div class="row" id="row3"><!-- START OF ROW -->
        <!-- Making a new list HTML code calls several javascript functions that can be found in myapp.js -->
            <div class="col">
                <h1 id="new_list_header">Making a new list!</h1>
                <h2 id="new_list_sub_header">If you would like to add an item to your list please click "New Item" button below.</h2>
                <h5 id="listHere">Your list will display here once you click update/show list button</h5>
                <textarea placeholder="Your list will be displayed here" id="text_area">List will display here</textarea>
                <br/>
                <!-- Calls addToPredifinedList JavaScript function to add a new item to the users list -->
                <button role="button" id="new_itm_btn" onclick="addToPredifinedList()">New Item</button>
                <!-- Calls update JavaScript function to update the list if the user deleted an item -->
                <button id="show_list_btn" onclick="update()">Update/Show List</button>
                <br/>
                <img src="https://lightintime.com/img/download_img.png" id="download_img">
                <br/>
                <!-- Calls download JavaScript function to download the list -->
                <input type="button" id="btn" onclick="download()" value="Download"/> 
            </div>
        </div><!--END OF ROW -->
        <div class="row" id="row5"><!-- START OF ROW -->
            <div class="col" style="text-align:center;">
            <h1>Delete your list!</h1>
                <img src="https://lightintime.com/img/delete_img.png" id="delete_img">
                <h2 id="delete_sub_header">Delete an Item or delete your list.</h2>
                <!-- Calls deleteItem JavaScript function to delet an item in the list -->
                <button id="delete_btn" onclick="deleteItem()">Delete Item</button>
                <!-- Calls deleteWholeList JavaScript function to delete the whole list -->
                <button id="delete_all_btn" onclick="deleteWholeList()">Delete List</button>
            </div>
        </div><!--END OF ROW -->
        <div class="row" id="row6"><!-- START OF ROW -->
        <!-- Save your list HTML code that can trigger a php event if the submit button is pressed aka the save button -->
            <div class="col" style="text-align:center;">
            <h1>Save your list!</h1>
            <img src="https://lightintime.com/img/save_img.png" id="save_img">
                <h3>Save your list for easy downloading next time.</h3>
                <h3 id="save_list_sub_header">Saved list will appear on the top of the website next time.</h3>
                <!-- Form if save button is hit will trigger the PhP code below -->
                <form action="" method="POST">       
                    <input id="save_list_btn" type="submit" value="Save List" name="submit" />           
                </form>
            </div>
        </div><!--END OF ROW -->
    </div><!--End of container or bootstrap grid -->

    <!-- JavaScript function with php to download the previous saved user list -->
    <script>
        function downloadUsersList() {
            // Convert the PHP array to a string
            var usersListString = '<?php echo json_encode($usersList); ?>';
    
            // Create a Blob object with the string contents
            var file = new Blob([usersListString], {type: 'text/plain'});
            
            // Use FileSaver.js to save the file
            saveAs(file, 'users-list.txt');
        }
    </script>

    <?php
    $phpMealArray = "<script>document.writeln(mealArray);</script>";//This turns the java mealArray variable into a php variable 
    $user1 = $_SESSION['sess_user'];//variable to hold the logged in users name

    //Grabbing the cookie created in the myapp.js file
    //The cookie is the meal array in the form of a string
    if (isset($_COOKIE['selected_item'])) {
            $passing_value = $_COOKIE['selected_item'];
        } 
        else {
            $passing_value = ''; // or any default value that you prefer
        }



    //Storing current logged in user
    $user1 = $_SESSION['sess_user'];

    //Connecting to the local database
    $con = mysqli_connect('localhost', 'root', '') or die(mysql_error());
    mysqli_select_db($con, 'list_database') or die("cannot select DB");

    //If the submit button is hit to save the users list in the database
    if(isset($_POST["submit"])){
        echo $user1 . " Thanks for saving your list. ";

        //Connecting to database
        $con=mysqli_connect('localhost','root','') or die(mysql_error());  
        mysqli_select_db($con, 'list_database') or die("cannot select DB");

        //SQL query to update the column with the newly created list
        $sql = "UPDATE login SET users_list='".$passing_value."' WHERE username='".$user1."'";

        //Success and error messages
        if (mysqli_query($con, $sql)) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . mysqli_error($con);
          }

    }
    ?>

</body>  
</html>  
<?php  
}
?>  