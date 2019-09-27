
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="main.css">
	<title>Colors</title>
</head>
<body>
	<h1>Colors</h1>
	<?php
		require_once 'data.php';
		foreach($colors as $color){
			echo '<div class="colors" style="background-color:' . $color .';">' . $color . '</div>';
		}
	?>

	<h1>50 shades of grey</h1>
	<?php 
		for ( $x = 0; $x < 50; $x++ ) {
			echo '<div style="display:inline-block;height:100px;width:100px;background-color:hsl(0,0%,'. $x * 2 .'%)"></div>';
		}
	?>

	<h1>360 Colors</h1>
	<?php 
		for ( $x = 0; $x < 360; $x++ ) {
			echo '<div style="display:inline-block;height:10px;width:10px;background-color:hsl('. $x .',100%, 50%)"></div>';
		}
	?>
	<h1>360 Colors advanced</h1>
	<div style="display:flex;flex-wrap:wrap">
	<?php 
		for ( $x = 0; $x < 360; $x++ ) {
			for($y = 0; $y < 100; $y++){
				echo '<div style="height:5px;width:1%;background-color:hsl('. $x .',100%, '. $y .'%)"></div>';
			}
		}
	?>
	</div>
</body>
</html>