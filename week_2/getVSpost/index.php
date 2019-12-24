<?php
if(isset($_COOKIE['name'])){
	header('Location:hallo.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>getVSpost</title>
</head>
<body>
<form action="hallo.php" method="post">
	Name: <input type="text" name="name" id="">
	<select name="richting">
  		<option value="NMD">NMD</option>
  		<option value="CMO">CMO</option>
  		<option value="GMB">GMB</option>
	</select>
	<input type="submit" value="verzenden">
</form>
	
</body>
</html>
<?php } ?>


<?php
$name = '';
if (isset($_GET["name"])) {
	$name = $_GET["name"];
	setcookie("name", $_GET["name"], time() + 86400);
} else {
	$name = $_COOKIE["name"];
}
?>