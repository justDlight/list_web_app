<!-- Shorter version of member.php for guest users has no database connection 
     For comments follow along with member.php
-->

<!doctype html>  
<html>
<head>  
    <title>Welcome</title>
    <link rel="stylesheet" href="member.css?v=<?php echo time(); ?>"><!-- Get instant response when refreshing css cache -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="myapp.js"></script>
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
                    <!-- Welcoming the user based on the session -->
                    <h1 id="welcome_txt">Welcome, <a href="register.php">Back to register</a></h1>
                    <br/>  
                    <h3>The List Application</h3>
                    <br/>
                    <h3>You are not logged in you wont be able to see your previous list or save your list!<h3>
                    <br/>
                    <img id="notebook_gif" src="https://lightintime.com/img/book.gif">
                    <br/>
                    <a href="#row3" id="jump_list_down">Jump to make list</a>
                    <br/>
                    <br/>
                </div>
            </div><!--END OF ROW -->
        <div class="row" id="row3"><!-- START OF ROW -->
            <div class="col">
                <h1 id="new_list_header">Making a new list!</h1>
                <h2 id="new_list_sub_header">If you would like to add an item to your list please click "New Item" button below.</h2>
                <textarea placeholder="Your list will be displayed here" id="text_area">List will display here</textarea>
                <br/>
                <button role="button" id="new_itm_btn" onclick="addToPredifinedList()">New Item</button>
                <button id="show_list_btn" onclick="update()">Update/Show List</button>
                <br/>
                <img src="https://lightintime.com/img/download_img.png" id="download_img">
                <br/>
                <input type="button" id="btn" onclick="download()" value="Download"/> 
            </div>
        </div><!--END OF ROW -->
        <div class="row" id="row5"><!-- START OF ROW -->
            <div class="col" style="text-align:center;">
            <h1>Delete your list!</h1>
                <img src="https://lightintime.com/img/delete_img.png" id="delete_img">
                <h2 id="delete_sub_header">Delete an Item or delete your list.</h2>
                <button id="delete_btn" onclick="deleteItem()">Delete Item</button>
                <button id="delete_all_btn" onclick="deleteWholeList()">Delete List</button>
            </div>
        </div><!--END OF ROW -->

</body>  
</html>  

