<!DOCTYPE html>
<html>
<head>
	<title>Monster Manual: Insert</title>
	<link href='https://fonts.googleapis.com/css?family=Alegreya Sans SC' rel='stylesheet'>
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
			text-align: right;
			width: 60%;
			margin: 0 auto;
			font-family: 'Alegreya Sans SC';
			font-size: 30px;
		}
		#form input[type=text], select, input[type=number] {
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
		#form input[type=number]{
			text-align:center;
		}
		#form table{
			width: 100%;

		}
		#form #tabla2{
			text-align: center;
		}
		#form  #tabla1 .label{
			width: 10%;
		}
		#form #tabla1 .input{
			width: 30%;
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
		#form input[type=file]{
    		width:263px;
    		height:100px;
    		font-size: 42px;
    		padding: 8px;
		}
		#form #filebutton{
			background-color: #37474F;
			display: inline-block;
			color: white;
			text-decoration: none;
			text-align:center;
			padding: 8px;
			height: auto;
			width: 256px;
			font-family: "Palatino Linotype";
			font-size: 30px;
			text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000, 2px 2px 4px #000000;
			box-shadow: 10px 10px 30px rgba(0,0,0,.5);
			border-radius: 15px 15px 15px 15px;
		}
		#form #fileToUpload{
			opacity: 0;
			margin-left:-240px;
			margin-top:-15px;
			position: absolute;
			overflow:hidden;
		}

		
	</style>
</head>
<body>
	<header>
		Update a monster
	</header>
	<br>
	<?php
	$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
	if(!$id){
		die();
	}
	require_once "conexion.php";
	$stmt = $conn->prepare("SELECT * FROM monsters WHERE id = :id");
	$stmt->bindParam(':id', $id);
	$stmt->execute();
	$crs = array(0,"1/8","1/4","1/2");
	for ($i=0; $i < 31; $i++) { 
		$crs[$i+4] = $i;
	}
	$sizes = array("Tiny","Small","Medium","Large","Huge","Gargantuan");
	$alignments = array("Lawful Good","Neutral Good","Chaotic Good","Lawful Neutral","Neutral","Chaotic Neutral","Lawful Evil","Neutral Evil","Chaotic Evil","Unaligned");
	$types = array("Aberration","Beast","Celestial","Construct","Dragon","Elemental","Fey","Fiend","Giant","Humanoid","Monstrosity","Ooze","Plant","Undead");
	$monster = $stmt->fetch();
	if ($monster){
		echo '<div id="form">
				<form method="post" action="editquery.php" enctype="multipart/form-data">
					<input type=hidden name="id" value="'.$id.'">
					<table id="tabla1" >
						<tr><td class = "label" >Name</td><td colspan="3" class = "input"> <input required type=text name="name" value="'.$monster["name"].'"></td></tr>
						<tr><td class = "label">CR</td><td class = "input"> 
							<select required name="cr">';
							foreach ($crs as $cr){
								if ($cr == $monster["cr"]) {
									echo "<option value = $cr selected>$cr</option>";
									continue;
								}
								echo "<option value = $cr>$cr</option>";
							}
						echo '</select>
						</td><td class = "label">Size</td><td class = "input"> 
							<select required name="size">';
							foreach ($sizes as $size){
								if ($size == $monster["size"]) {
									echo "<option value = $size selected>$size</option>";
									continue;
								}
								echo "<option value = $size>$size</option>";
							}
						echo '</select>
						</td></tr>
						<tr><td class = "label">Alignment</td><td class = "input">
							<select required name="alignment">';
							foreach ($alignments as $alignment){
								if ($alignment == $monster["alignment"]) {
									echo "<option value = '$alignment' selected>$alignment </option>";
									continue;
								}
								echo "<option value = $alignment >$alignment </option>";
							}
						echo '</select> 
						</td><td class = "label">Type</td><td class = "input">
							<select required name="type">';
							foreach ($types as $type){
								if ($type == $monster["type"]) {
									echo "<option value = $type  selected>$type</option>";
									continue;
								}
								echo "<option value = $type >$type </option>";
							}					
						echo '</select>
						</td></tr>
					</table>
					<table id="tabla2">
						<tr><td class = "label">AC</td><td class = "input"> <input required value='.$monster["ac"].' type=number name="ac" min=0 max=30></td><td class = "label">HP</td><td class = "input"> <input required value='.$monster["hp"].' type=number name="hp" min=1 max=500></td><td class = "label">Speed</td><td class = "input"> <input required value='.$monster["speed"].' type=number name="speed" min=0 max=240 step=10></td></tr>
						<tr><td>STR</td><td>DEX</td><td>CON</td><td>INT</td><td>WIS</td><td>CHA</td></tr>
						<tr><td><input required  value='.$monster["str"].' type=number name="str" min=1 max=30></td><td><input required  value='.$monster["dex"].' type=number name="dex" min=1 max=30></td><td><input required type=number  value='.$monster["con"].'  name="con" min=1 max=30></td><td><input required type=number value='.$monster["int"].'  name="int" min=1 max=30></td><td><input required type=number  value='.$monster["wis"].' name="wis" min=1 max=30></td><td><input required type=number  value='.$monster["cha"].' name="cha" min=1 max=30></td></tr>
					</table>
					<span id="filebutton">Upload Image<input type="file" name="fileToUpload" id="fileToUpload"></span> <input type="submit" value="Edit">
				</form>
			</div>';
	}
	else{
		echo '<div id="error">
				Wrong entry! The monster does not exist
			</div>';
	}
	?>
	
</body>
</html>