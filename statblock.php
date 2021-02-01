<!DOCTYPE html>
<html>
<head>
	<title>Monster Manual: Statblock</title>
	<link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
	<style type="text/css">
		body{
			background-color: #FFFFFF;
			margin: 0px;
			padding: 0px;
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
		header img{
			width: 64px;
			padding-bottom: 10px;
			vertical-align: middle;
		}
		#error{
			background: linear-gradient(to bottom right, #D32F2F, #C62828, #C62828, #B71C1C);
			color: #FFFFFF;
			font-size: 4em;
			text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000, 2px 2px 4px #000000;
			font-family: "Palatino Linotype";
			text-align: center;
			padding: 10px 0px 10px 0px;
			box-shadow: 0px 10px 15px rgba(0,0,0,.5);
		}
		#tabla{
			margin: 2.5% auto;
			padding: 0px;
			width: 60%;
			font-family: 'Alegreya Sans SC';
			font-size: 22px;
			text-align: center;
			margin-left: 50%;
            transform: translateX(-50%);
		}
		#block{
			float: left;
			width: 80%;
		}
		#actions{
			width: 20%;
			margin: auto;
			text-align: center;
			float: left;
			padding: 0px;
		}
		#actions a{
			width: 110px;
			height: 48px;
			font-size: 30px;
			line-height: 48px;
		}
		#actions #del{
			background: linear-gradient(to bottom right, #D32F2F, #C62828, #C62828, #B71C1C);
		}
		#back{
			clear: both;
			margin: 2.5%;
		}
		#tabla table{
    		border-collapse: collapse;
    		box-shadow: 5px  5px 25px rgba(0,0,0,.5);
		}
		#tabla th, td {
    		text-align: left;
    		padding: 10px;
		}

		#tabla img{
			width: 260px;
			height: 260px;
			padding-bottom: 10px;
			vertical-align: middle;
		}
		#tabla th {
    		background-color: #37474F;
    		color: white;
    		text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000, 2px 2px 4px #000000;
		}
		a{
			background-color: #37474F;
			display: inline-block;
			color: white;
			text-decoration: none;
			padding: 8px;
			height: 64px;
			line-height: 64px;
			font-family: "Palatino Linotype";
			font-size: 1.5em;
			text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000, 2px 2px 4px #000000;
			box-shadow: 10px 10px 30px rgba(0,0,0,.5);
			border-radius: 15px 15px 15px 15px;
  			vertical-align: middle;
		}
		a:hover{
			background-color: #263238;
		}
	</style>
</head>
<body>
	<?php 
	$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	require_once "conexion.php";
	$stmt = $conn->prepare("SELECT * FROM monsters WHERE id = :id");
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	$monster = $stmt->fetch();
	if ($monster) {
			$img_path = "static/placeholder.png";
			if (file_exists("static/".$monster["id"].".png")) {
				$img_path = "static/".$monster["id"].".png";
			}
		echo '<header>
				<img src="'.$img_path.'"> '.$monster["name"].'
			</header>';
		echo '<div id="tabla">
				<div id="block">
				<table>
				<tr><th colspan="6">'.$monster["name"].'</th> <th rowspan="11"><img src="'.$img_path.'"></th></tr>
				<tr><td colspan="6">'.$monster["size"].' '.strtolower($monster["type"]).', '.strtolower($monster["alignment"]).'</td><tr>
				<tr><td colspan="6">Armor Class: '.$monster["ac"].'</td><tr>
				<tr><td colspan="6">Hit Points: '.$monster["hp"].'</td><tr>
				<tr><td colspan="6">Speed: '.$monster["speed"].' ft</td><tr>
				<tr><th>STR</th><th>DEX</th><th>CON</th><th>INT</th><th>WIS</th><th>CHA</th></tr>
				<tr><td>'.$monster["str"].'</td><td>'.$monster["dex"].'</td><td>'.$monster["con"].'</td><td>'.$monster["int"].'</td><td>'.$monster["wis"].'</td><td>'.$monster["cha"].'</td></tr>
			</table> </div>';
		echo "<div id='actions'><a href=edit.php?id=$id>Edit</a><br><br><br><br><br><br><br><br><a id='del' href=delete.php?id=$id>Delete</a></div></div>";
	}
	else{
		echo '<div id="error">
				Wrong entry! The monster does not exist
			</div><br>';
	}
	?>
	<div id="back"><br><a href="index.php">Go back</a></div>
</body>
</html>