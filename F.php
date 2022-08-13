
<?php

//Define the required variables for the local database
$servername = "localhost";
$username = "myUser";
$password = "[Xna)ZK6Nnuahj_C";
$db = "IOT";

$connect = mysqli_connect($servername, $username, $password,$db);

 $sql_ui_control = 'SELECT * FROM `remote`';

 //to get the result
 $result = mysqli_query($connect, $sql_ui_control);

 // fetch the results
 $direction_commands = mysqli_fetch_all($result, MYSQLI_ASSOC);

//for print the last value from db
      echo $direction_commands[count($direction_commands)-1]['forward'];
    
    

 // close connection with db
 mysqli_close($connect);
?>