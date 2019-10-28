<?php
$content = file_get_contents('data/articles.json');
$articles = json_decode($content);
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
<div class="articles">
    <?php 
    foreach($articles as $key=>$article){
        // echo $key;
        // print_r($post); 
        include 'views/article.php';
    }
    ?>
    <a href="add.php" class="article-item article-item-add">
        <h3><span class="icon">+</span>Add</h3>
    </a>
</div>
</body>
</html>
