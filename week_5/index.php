<?php
$json = '{
	"1234" : {
		"firstname": "John",
		"lastname": "Doe",
		"image": "http://jimparisishow.com/wp-content/uploads/2015/11/howiemandel-570x570.jpg"
	},
	"5678" : {
		"firstname": "Jef",
		"lastname": "Vermeire",
		"image": "http://giphygifs.s3.amazonaws.com/media/krI1lBPsluByg/200.gif"
	},
	"9100" : {
		"firstname": "Richard",
		"lastname": "Batsbak",
		"image": "https://ollienollie.files.wordpress.com/2009/10/untitled-181.jpg"
	},
	"7568" : {
		"firstname": "Johan",
		"lastname": "Drerie",
		"image": "https://pbs.twimg.com/profile_images/1099856449918943232/hKv3Fddh.jpg"
	}
}';
$users = json_decode($json);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Oefening</title>
	<link rel="stylesheet" href="main.css">
</head>
<body>
<div class="container">
	<?php
	foreach($users as $value){
		include 'user_view.php';
	}
	?>
</div>
</body>
</html>