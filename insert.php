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
		Create new monster
	</header>
	<br>
	<div id="form">
		<form method="post" action="insertquery.php" enctype="multipart/form-data">
			<table id="tabla1" >
				<tr><td class = "label" >Name</td><td colspan="3" class = "input"> <input required type=text name="name"></td></tr>
				<tr><td class = "label">CR</td><td class = "input"> 
					<select required name="cr">
						<option value = "0">0</option>
						<option value = "1/8">1/8</option>
						<option value = "1/4">1/4</option>
						<option value = "1/2">1/2</option>
						<?php
						for ($i=1; $i < 31 ; $i++) { 
						  	echo "<option value = $i>$i</option>";
						  }  
						?>
					</select>
				</td><td class = "label">Size</td><td class = "input"> 
					<select required name="size">
						<option value="Tiny">Tiny</option>
						<option value="Small">Small</option>
						<option value="Medium">Medium</option>
						<option value="Large">Large</option>
						<option value="Huge">Huge</option>
						<option value="Gargantuan">Gargantuan</option>
					</select>
				</td></tr>
				<tr><td class = "label">Alignment</td><td class = "input">
					<select required name="alignment">
						<option value="Lawful Good">Lawful Good</option>
						<option value="Neutral Good">Neutral Good</option>
						<option value="Chaotic Good">Chaotic Good</option>
						<option value="Lawful Neutral">Lawful Neutral</option>
						<option value="Neutral">Neutral</option>
						<option value="Chaotic Neutral">Chaotic Neutral</option>
						<option value="Lawful Evil">Lawful Evil</option>
						<option value="Neutral Evil">Neutral Evil</option>
						<option value="Chaotic Evil">Chaotic Evil</option>
						<option value="Unaligned">Unaligned</option>
					</select> 
				</td><td class = "label">Type</td><td class = "input">
					<select required name="type">
						<option value="Aberration">Aberration</option>
						<option value="Beast">Beast</option>
						<option value="Celestial">Celestial</option>
						<option value="Construct">Construct</option>
						<option value="Dragon">Dragon</option>
						<option value="Elemental">Elemental</option>
						<option value="Fey">Fey</option>
						<option value="Fiend">Fiend</option>
						<option value="Giant">Giant</option>
						<option value="Humanoid">Humanoid</option>
						<option value="Monstrosity">Monstrosity</option>
						<option value="Ooze">Ooze</option>
						<option value="Plant">Plant</option>
						<option value="Undead">Undead</option>						
					</select>
				</td></tr>
			</table>
			<table id="tabla2">
				<tr><td class = "label">AC</td><td class = "input"> <input required type=number name="ac" min=0 max=30></td><td class = "label">HP</td><td class = "input"> <input required type=number name="hp" min=1 max=500></td><td class = "label">Speed</td><td class = "input"> <input required type=number name="speed" min=0 max=240 step=10></td></tr>
				<tr><td>STR</td><td>DEX</td><td>CON</td><td>INT</td><td>WIS</td><td>CHA</td></tr>
				<tr><td><input required type=number name="str" min=1 max=30></td><td><input required type=number name="dex" min=1 max=30></td><td><input required type=number name="con" min=1 max=30></td><td><input required type=number name="int" min=1 max=30></td><td><input required type=number name="wis" min=1 max=30></td><td><input required type=number name="cha" min=1 max=30></td></tr>
			</table>
			<span id="filebutton">Upload Image<input type="file" name="fileToUpload" id="fileToUpload"></span> <input type="submit" value="Create">
		</form>
	</div>
</body>
</html>