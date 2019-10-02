<?php
$name = '';
$richting = '';
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$richting = $_POST['richting'];
	setcookie("name", $name);
	setcookie("richting", $richting);
}else if(isset($_COOKIE['name'])){
	$name = $_COOKIE['name'];
	$richting = $_COOKIE['richting'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Hallo</title>
</head>
<body>

<h1>Welkom</h1>
	<p><?php echo $name?></p>
	<?php
		$send = "";
		if ($richting === 'NMD'){
			$send = 'new media development';
		}else if ($richting === 'CMO'){
			$send = 'cross media ontwerp';
		}else if ($richting === 'GMB'){
			$send = 'grafi media beleid';
		}
	?>
	<p>student <strong><?php echo $send ?></strong></p>
	
</body>
</html>