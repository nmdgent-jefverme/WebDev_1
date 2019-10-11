<?php 
$content = './content';
if(is_dir($content)){
    $files = array_diff(scandir($content), array('..', '.'));
}else{
    echo 'geen succes';
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
	echo file_get_contents($file);
?>
	<li><a href="?page=<?php echo $info['filename'] ?>"><?php echo substr($info['filename'], 3); ?></a></li>
<?php
}
?>
</ul>
</nav>

	
</body>
</html>