<!DOCTYPE html>
<html>
<head>
	<title>Restoring the Monsters</title>
	<style>
		body{
			background-color: #FFFFFF;
			margin: 0px;
			width: 100%;
			text-align: center;
		}
		header{
			background: linear-gradient(to bottom right, #263238, #37474F, #37474F, #455A64);
			color: #FFFFFF;
			font-size: 4em;
			text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000, 2px 2px 4px #000000;
			font-family: "Palatino Linotype";
			text-align: center;
			padding: 10px 0px 10px 0px;
			box-shadow: 0px 10px 15px rgba(0,0,0,.5);
		}
		#form{
			text-align: left;
			width: 60%;
			margin: 0 auto;
			font-family: 'Alegreya Sans SC';
			font-size: 30px;
		}
		#form input[type=password]{
    		padding: 6px 10px;
    		width: 100%;
    		margin: 4px 2px;
    		display: inline-block;
    		border: 1px solid #ccc;
    		border-radius: 4px;
    		box-sizing: border-box;
    		font-family: 'Alegreya Sans SC';
			font-size: 20px;
		}
		#form input[type=button], input[type=submit], input[type=reset] {
    		background-color: #37474F;
			display: inline-block;
			color: white;
			text-decoration: none;
			text-align:center;
			padding: 8px;
			height: auto;
			width: 128px;
			font-family: "Palatino Linotype";
			font-size: 30px;
			text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000, 2px 2px 4px #000000;
			box-shadow: 10px 10px 30px rgba(0,0,0,.5);
			border-radius: 15px 15px 15px 15px;
		}
		#form a{
			background-color: #37474F;
			display: inline-block;
			color: white;
			text-decoration: none;
			padding: 8px;
			height: auto;
			font-family: "Palatino Linotype";
			font-size: 30px;
			text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000, 2px 2px 4px #000000;
			box-shadow: 10px 10px 30px rgba(0,0,0,.5);
			border-radius: 15px 15px 15px 15px;
		}
	</style>
</head>
<body>
	<header>
		Restore the DataBase
	</header>
	<br>
	<div id="form">
	<form method="post">
		Input the password to restore the DB:
		<input type=password name=pass>
		<input type=submit value="Restore">
		<a href="index.php">Go back</a>
	</form>
	
<?php
	$pass = filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING);
	if (isset($_POST["pass"])) {
 		if ($pass == "gabo1234") {
 			require_once "conexion.php";
			$sql = file_get_contents("restore.sql");
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			header("Location: index.php");
 		}
 		else{
 			echo "<br>WRONG PASSWORD";
 		}
 	} 
?>
</div>
</body>
</html>
