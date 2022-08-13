<?php
//required variables to connect with the local database
$servername = "localhost";
$username = "myUser";
$password = "[Xna)ZK6Nnuahj_C";
$db = "IOT";

//server name, user name , password , database
$conn = mysqli_connect($servername, $username, $password,$db);

 //next block for send the respone to the DB

 	//Forwards
 	if (isset($_POST['forward'])) { 
	$sql = "INSERT INTO remote(`forward`, `left`, `stop`, `right`, `backward`)
	VALUES  ('F', '', '', '', '')";

	if ($conn->query($sql) === TRUE) {
        include('F.php');
	} else {
  	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}

	//Backwards
	if (isset($_POST['backward'])) {
     $sql = "INSERT INTO remote(`forward`, `left`, `stop`, `right`, `backward`)
	VALUES ('', '', '', '', 'B');";
	
	if ($conn->query($sql) === TRUE) {
        $connect = mysqli_connect($servername, $username, $password,$db);
        $sql_ui_control = 'SELECT * FROM `remote`';
//to get the result
         $result = mysqli_query($connect, $sql_ui_control);
 // fetch the results
       $direction_commands = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo $direction_commands[count($direction_commands)-1]['backward'];
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	}

	//Right
	if (isset($_POST['right'])) {
        $sql = "INSERT INTO remote(`forward`, `left`, `stop`, `right`, `backward`)
	VALUES ('', '', '', 'R', '');";
	
	if ($conn->query($sql) === TRUE) {
        $connect = mysqli_connect($servername, $username, $password,$db);
        $sql_ui_control = 'SELECT * FROM `remote`';
//to get the result
         $result = mysqli_query($connect, $sql_ui_control);
 // fetch the results
       $direction_commands = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo $direction_commands[count($direction_commands)-1]['right'];
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}	
	$conn->close();
	}

	//Left
	if (isset($_POST['left'])) {
        $sql = "INSERT INTO remote(`forward`, `left`, `stop`, `right`, `backward`)
	VALUES ('', 'L', '', '', '');";
	
	if ($conn->query($sql) === TRUE) {
        $connect = mysqli_connect($servername, $username, $password,$db);
        $sql_ui_control = 'SELECT * FROM `remote`';
//to get the result
         $result = mysqli_query($connect, $sql_ui_control);
 // fetch the results
       $direction_commands = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo $direction_commands[count($direction_commands)-1]['left'];
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
		}

    //STOP
	if (isset($_POST['stop'])) {
        $sql = "INSERT INTO remote(`forward`, `left`, `stop`, `right`, `backward`)
	VALUES ('', '', 'S', '', '');";
	
	if ($conn->query($sql) === TRUE) {
        $connect = mysqli_connect($servername, $username, $password,$db);
        $sql_ui_control = 'SELECT * FROM `remote`';
//to get the result
         $result = mysqli_query($connect, $sql_ui_control);
 // fetch the results
       $direction_commands = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo $direction_commands[count($direction_commands)-1]['stop'];
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
	}
	
  
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>control panel</title>
	<main></main>

<link rel="stylesheet" href="style.css"> <!--to link css -->

</head>

<body>
	<div class="container">
		<form action="" method="post">
			<input type="hidden" name="action" value="submit" />

			<h1>

				<input id="forward" type="submit" name="forward" value="forward" <button  class="other_btn"
					type="button" id="forward" input type="submit">
				</button>
			</h1>

			<h2>

				<input id="left" type="submit" name="left" value="left" <button  class="other_btn"
					type="button" id="left" input type="submit">
				</button>


				<input id="stop" type="submit" name="stop" value="stop" <button  class="stopbtn" type="button"
					id="stop" input type="submit">
				</button>


				<input id="right" type="submit" name="right" value="right" <button  class="other_btn"
					type="button" id="right" input type="submit">
				</button>

			</h2>

			<h3>
				<input id="backward" type="submit" name="backward" value="backward" <button 
					class="other_btn" type="button" id="backward" input type="submit">
				</button>

			</h3>

		</form>

	</div>

</body>

</html>