The List Web App README file.

The List Web App was created for educational purposes by John Weiss.
The List Web App is public and free for anyone to use.
Link to Web App: https://climbingtasmania.com/login.php

DESCRIPTION of the List Web App:
The website allows users to create a list.

FEATURES for everyone:
Users can delete items from there list.
Users can delete there whole list.
Users can download there list as a text file.

FEATURES for registered members:
Users can view there previous list that they made.
Users can download the previous list that they made.
Users can save there list so it appears next time they log in.
Users can delete items from there list.
Users can delete there whole list.
Users can download there list as a text file.



This part of README file will tell users how they can download and use the list web app on there on computer.
To use this application and download it on your local device/computer do the following instructions

HOW TO DOWNLOAD AND USE LOCALLY:

1. Download all PhP, HTML, CSS, JS and SQL files from the Local Database Version. Link: https://github.com/justDlight/list_web_app/tree/master/Local_Database_Version
2. Users must have PhP installed on devices as well as a cross-platform web server solution stack package.
   I recommend web server packages such as Xampp or WampServer as they provide all the PhP and SQL plugins you will need.
   For these instructions I will follow along with the Xampp description.
   To see how to download and install Xampp follow this link: https://phpandmysql.com/extras/installing-xampp/#:~:text=To%20install%20XAMPP%20on%20your,the%20instructions%20to%20install%20XAMPP.
3. Once Xampp is installed on your device and your device has been rebooted if necessary open your Xampp Control Panel.
4. Start the Apache Module service.
5. Start the MySQL Module service.
6. Check you PhP version is updated to us MySQLi commands. PhP version 8 or above will all work.
   Not sure what version your Xampp is using visit this link to check will only work on new Xampp versions: http://localhost/dashboard/phpinfo.php
7. Move all downloadable files into your Xampp/htdocs folder. Files can be placed anywhere inside the htdocs folder.
8. Check that you can acesses the files online via local host something like this: http://localhost/All_Things_Lists/Local_Database_Version/login.php
9. Acsess your phpMyAdmin page next and see if that is running. Link: http://localhost/phpmyadmin/index.php
   Picture of phpMyAdmin page
![php_my_admin](https://user-images.githubusercontent.com/81500373/225188610-340c3f65-a720-4ec7-8405-c9b90a876174.png)
10. Create a new database called "list_database"
11. Select the newly created empty list_database from the left side of the panel on the phpMyAdmin page.
12. Select Import near the top right of the screen.
13. Select Choose File and browse for the list_database.sql file.
14. Character set of file should be utf-8.
15. Leave all other settings ass default and scroll to the bottom and hit import.
16. Green SQL queries should pop up you can ignore them if you like.
17. Red SQL queries means an error has occured.
18. IF all went well you should be able to visit the login.php file on your browser now and log in with the username test-user and password 1



DEMO VIDEOS OF THE WEBSITE

https://user-images.githubusercontent.com/81500373/225183388-984b651b-cdb8-4371-bff0-ffbe8debcf82.mp4

