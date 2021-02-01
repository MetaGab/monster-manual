<?php  

require_once "conexion.php";

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$cr = filter_input(INPUT_POST, 'cr', FILTER_SANITIZE_STRING);
$size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
$alignment = filter_input(INPUT_POST, 'alignment', FILTER_SANITIZE_STRING);
$type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
$ac = filter_input(INPUT_POST, 'ac', FILTER_VALIDATE_INT);
$hp = filter_input(INPUT_POST, 'hp', FILTER_VALIDATE_INT);
$speed = filter_input(INPUT_POST, 'speed', FILTER_VALIDATE_INT);
$str = filter_input(INPUT_POST, 'str', FILTER_VALIDATE_INT);
$dex = filter_input(INPUT_POST, 'dex', FILTER_VALIDATE_INT);
$con = filter_input(INPUT_POST, 'con', FILTER_VALIDATE_INT);
$int = filter_input(INPUT_POST, 'int', FILTER_VALIDATE_INT);
$wis = filter_input(INPUT_POST, 'wis', FILTER_VALIDATE_INT);
$cha = filter_input(INPUT_POST, 'cha', FILTER_VALIDATE_INT);

if(!$ac or !$hp or !$speed or !$str or !$dex or !$con or !$int or !$wis or !$cha){
	header("Location: insert.php");
}

$sql ="INSERT INTO monsters (`name`, cr, size, alignment, `type`, ac, hp, speed, str, dex, con, `int`, wis, cha) VALUES ('$name', '$cr', '$size', '$alignment', '$type', $ac, $hp, $speed, $str, $dex, $con, $int, $wis, $cha)";
$stmt = $conn->prepare($sql);
$stmt->execute();

$stmt = $conn->prepare("SELECT * FROM monsters ORDER BY ID DESC LIMIT 1");
$stmt->execute();
$monster = $stmt->fetch();

$target_dir = "static/";
$target_file = $target_dir . $monster["id"].".png";
if(file_exists($target_file)) unlink($target_file);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


header("Location: statblock.php?id=".$monster["id"]);
?>