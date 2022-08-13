# Control Panel
1. Create local SQL Server database (I used MAMP)

2. Create a table 

```sql

CREATE TABLE `remote` (
  `forward` varchar(7) NOT NULL,
  `left` varchar(4) NOT NULL,
  `stop` varchar(4) NOT NULL,
  `right` varchar(5) NOT NULL,
  `backward` varchar(8) NOT NULL
) ;
```

3. Design an interface for a control panel page using HTML/CSS to control the robot movements (Forward, Backward, Left, Right,Stop).
```html 
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
```
1.Conecting the control panel page with a database

```php
//required variables to connect with the local database
$servername = "localhost";
$username = "myUser";
$password = "[Xna)ZK6Nnuahj_C";
$db = "IOT";

//server name, user name , password , database
$conn = mysqli_connect($servername, $username, $password,$db);


```
2.write the values to the database so when you click Forward it will insert to the database the letter (F) and it will read the letter that have been inserted to the database and when you click Left it will insert and read to/from the databse (L) and so on... 
```php
//Forward
 	if (isset($_POST['forward'])) { 
	$sql = "INSERT INTO remote(`forward`, `left`, `stop`, `right`, `backward`)
	VALUES  ('F', '', '', '', '')";

	if ($conn->query($sql) === TRUE) {
        include('F.php');
	} else {
  	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}

	//Backward
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
.......
``` 
