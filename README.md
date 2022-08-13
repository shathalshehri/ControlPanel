# Control Panel
## 1. Create local SQL Server database (I used MAMP)
[Here is the link to download MAMP](https://www.mamp.info/en/windows/)
## 2. Create a table 
(remote.sql file)
```sql

CREATE TABLE `remote` (
  `forward` varchar(7) NOT NULL,
  `left` varchar(4) NOT NULL,
  `stop` varchar(4) NOT NULL,
  `right` varchar(5) NOT NULL,
  `backward` varchar(8) NOT NULL
) ;
```

## 3. Design an interface for the control panel using HTML/CSS to control the robot movements (Forward, Backward, Left, Right,Stop).
(index.php file)
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
(style.css file)
```css
body {
    margin: 0;
    padding: 0;
      background-image: url("https://cdn.wallpapersafari.com/55/23/0maXBZ.jpg");
    background-size: cover;
    position: relative;
    overflow: hidden;
    width: 100%;
    height: 500px;
    animation: animate 10s infinite linear;
    background-position: cover;
  }
p {
    color: rgb(91, 158, 218);
}
h1{
    color:rgb(91, 158, 218);
}

h4,p{
    color: rgb(91, 158, 218);
}
/* To add animation for the background*/
  @keyframes animate {

    0% {
        background-position: 0px 100px;
    }

    100% {
        background-position: 0px 0px;
    }
}
h4,p{
    color: rgb(91, 158, 218);
}
  main{

    color: rgb(93, 120, 209);
    font-size: 33px;  
    width: 100%;
    max-width: 1920px;
    min-width: 480px;
    height: 200px;
    margin-left: -8px;
    text-align: center;
    clear: both;
    display: inline-block;
    overflow: hidden;
    white-space: nowrap;
    padding: 100px 0 0;

}

.other_btn{
    padding: 7px 50px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    position:inherit;
    border-radius: 8px;
    color: rgb(0, 0, 0);


}


.stopbtn{
    background-color: rgb(2, 2, 2);
    padding: 7px 50px;
    text-align: center;
    font-size: 16px;
    margin: 4px 12px;
    cursor: pointer;
    position:inherit;
    border-radius: 8px;
    color: rgb(233, 233, 235);

    
}

.container{
    width: 100%;
    max-width: 1920px;
    min-width: 480px;
    height: 200px;
    margin-left: -8px;
    overflow: hidden;
    text-align: center;
}
```
### Conecting the control panel page with a database

```php
//required variables to connect with the local database
$servername = "localhost";
$username = "myUser";
$password = "[Xna)ZK6Nnuahj_C";
$db = "IOT";

//server name, user name , password , database
$conn = mysqli_connect($servername, $username, $password,$db);


```
### Write the values to the database so when you click Forward it will insert to the database the letter (F) and it will read the letter that have been inserted to the database and when you click Left it will insert and read to/from the databse (L) and so on... 
(index.php file)
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
## The robot control panel interface <img width="1263" alt="Screen Shot 1444-01-16 at 12 15 30 AM" src="https://user-images.githubusercontent.com/108195428/184510923-be298f38-5eef-46ca-95aa-e29fd4802b02.png">

