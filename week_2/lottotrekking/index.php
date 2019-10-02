<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Lotto Trekking</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

<?php
function get_new_number($array){
	do{
		$randomNumber = rand(1,6);
	}while(in_array($randomNumber, $array) !== false);
	return $randomNumber;
}

$numbers = isset($_SESSION['numbers'])? $_SESSION['numbers']: [];
if(count($numbers) < 6){
	array_push($numbers, get_new_number($numbers));
	$_SESSION['numbers'] = $numbers;
}

for($x = 0; $x < count($numbers); $x ++) {
	echo '<div class="lottoNr">'. $numbers[$x] .'</div>';
}


?>

	
</body>
</html>