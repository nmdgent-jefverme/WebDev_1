<?php
session_start();
if(isset($_SESSION['logout'])) session_abort();
if(!isset($_SESSION['login'])){
	header('Location: login.php');
}
$content = './content';
if(is_dir($content)){
    $files = array_diff(scandir($content), array('..', '.'));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Micro CMS</title>
</head>
<body>


<nav>
<ul></ul>
<?php
foreach ($files as $file) {
	$info = pathinfo($file);
?>
	<li><a href="?page=<?php echo $info['filename'] ?>"><?php echo substr($info['filename'], 3); ?></a></li>
<?php
}
?>
</ul>
</nav>

<form action="index.php" method="post">
	<input type="submit" value="log out" name="logout">
</form>
</body>
</html>