<?php
include_once 'consts.php';
$file_name = isset($_COOKIE['filename']) ? '/'.$_COOKIE['filename'] : '/users.csv';
if(isset($_POST['input'])){
	$input = $_POST['input'];
	$tmp = [];
	foreach ($input as $value) {
		array_push($tmp, implode($_POST['seperator'], $value));
	}
	file_put_contents(UPLOAD_PATH . $file_name, implode("\n", $tmp));
}
if(is_dir(UPLOAD_PATH)){
	$files = array_diff(scandir(UPLOAD_PATH), array('..', '.'));
}else{
    echo 'geen succes';
}
if(isset($_GET['file'])){
	$file_name = '/' . $_GET['file'];
	setcookie('filename', $file_name);
}
$users = file_get_contents(UPLOAD_PATH . $file_name);
$user_array = explode(PHP_EOL, $users);
$header = explode(',', $user_array[0]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="main.css">
	<title>Online CSV editer</title>
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data" class="upload">
    <input type="file" name="my_file" class="input"> 
    <input type="submit" name="submit" value="submit" class="btn">
</form>
<ul>
	<?php foreach($files as $file) {?>
		<li><a href="?file=<?php echo $file; ?>"><?php echo $file; ?></a></li>
	<?php } ?>
</ul>
<form action="index.php" method="post">
	<input type="text" name="seperator" value="kies een seperator">
	<input type="submit" value="Opslaan">
	<table>
		<tr>
		<?php
		foreach($header as $key => $ell){
		?>
			<th><?php echo $ell; ?></th>
			<input type="hidden" value="<?php echo $ell; ?>" name="input[0][<?php echo $key; ?>]">
		<?php
		}
		?>
		</tr>
		<?php
		for ($i=1; $i < sizeof($user_array); $i++) { 
			$user = explode(',', $user_array[$i]);
			?>
			<tr>
			<?php
			for ($y=0; $y < sizeof($user); $y++) { 
			?>
				<td><input type="text" value="<?php echo $user[$y]; ?>" name="input[<?php echo $i; ?>][<?php echo $y; ?>]"></td>
			<?php
			}
			?>
			</tr>
			<?php
		}
		?>
	</table>
</form>	
</body>
</html>