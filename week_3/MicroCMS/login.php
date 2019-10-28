<?php
$pwd = 'Azerty123';
session_start();
if(isset($_POST['login'])){
	if($pwd === $_POST['pwd']){
		$_SESSION['login'] = true;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login in</title>
</head>
<body>
	<form action="login.php" method="post">
		<input type="text" name="username" id="">
		<input type="password" name="pwd" id="">
		<input type="submit" value="Login" name="login">
	</form>
</body>
</html>