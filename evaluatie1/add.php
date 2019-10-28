<?php
$extensions = ['jpg', 'png', 'gif', 'jpeg'];
$content = file_get_contents('data/articles.json');
$articles = json_decode($content);
$new_filename;
$errors = [];
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
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
        $new_filename = 'default.jpg';
    } else {
        $errors[] = 'wrong extension';
    }
    $new_key = uniqid();
    $new_article = new stdClass();
    $new_article->$new_key = (object) array(
        'title'=>$title,
        'photo'=>$new_filename
    );
    $put = (object) array_merge((array)$articles, (array)$new_article);
    if(sizeof($errors) === 0){
        file_put_contents('data/articles.json', json_encode($put));
        file_put_contents('content/' . $new_key . '.html', $content);
        header('Location: index.php');
    }
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
    <h1>Bericht toevoegen</h1>   
    <?php
        foreach($errors as $error){
            include 'views/error.php';
        }
    ?>
    <form method="post" action="add.php" enctype="multipart/form-data">
        <label>
            Titel<br>
            <input type="text" name="title" required>
        </label>
        <label>
            Foto<br>
            <input type="file" name="photo" value="Kies...">
        </label>
        <label>
            Inhoud<br>
            <textarea name="content" rows="15"></textarea>
        </label>
        <button type="submit" name="submit">Toevoegen</button>
        <a href="index.php" class="btn">Keer terug</a>

    </form>

</section>
</body>
</html>
