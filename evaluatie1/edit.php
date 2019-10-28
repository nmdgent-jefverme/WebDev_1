<?php
$content = file_get_contents('data/articles.json');
$articles = json_decode($content);
$id = $_GET['id'];
$article = $articles->$id;
$extensions = ['jpg', 'png', 'gif', 'jpeg'];
$errors = [];
$new_filename;
if(isset($_POST['submit'])){
	if ($_FILES['photo']['size'] > 0) {
        $new_filename = basename($_FILES["photo"]["name"]);
        $file_ext=strtolower(end(explode('.',$_FILES['photo']['name'])));
        $file_tmp = $_FILES['photo']['tmp_name'];
        if(!in_array($file_ext, $extensions)){
            $errors[] = 'wrong extension';
        }else {
            move_uploaded_file($file_tmp, "images/".$new_filename);
        }
    } else if($_FILES['photo']['error'] === 4){
        $new_filename = $article->photo;
    } else {
        $errors[] = 'wrong extension';
    }
	$title = $_POST['title'];
	$article->title = $title;
	$article->photo = $new_filename;
	$data = preg_replace('/[ ]{2,}|[\t]/', ' ', trim($_POST['input']));
	file_put_contents('content/' . $id . '.html', $data);
	file_put_contents('data/articles.json', json_encode($articles));
	header('Location: detail.php?id=' . $id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webdev I Evaluatie 1</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<section>
		<h1>Artikel aanpassen</h1>
		<form action="edit.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
			<label>
				Titel<br>
				<input type="text" name="title" required value="<?php echo $article->title ?>">
			</label>
			<label>
			Foto<br>
				<img src="images/<?php echo $article->photo ?>" alt="" style="width: 30%;"><br>
            	<input type="file" name="photo" value="Kies...">
        	</label>
			<textarea name="input" id="" rows="10" style="width: 100%; margin-bottom: 10px;"><?php echo str_replace("\r\n\t", "", file_get_contents('content/' . $id . '.html')); ?></textarea>
			<input type="submit" name="submit" value="opslaan">
		</form>
</section>
</body>
</html>