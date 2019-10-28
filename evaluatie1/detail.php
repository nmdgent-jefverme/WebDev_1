<?php
$content = file_get_contents('data/articles.json');
$articles = json_decode($content);
$keys = [];
$id = $_GET['id'];
foreach($articles as $key=>$value){
    $keys[] = $key;
}
if(!in_array($id, $keys)){
    header('Location: index.php');
    exit;
}
$article = $articles->$id;
if(is_dir('content')){
    $content = array_diff(scandir('content'), array('..', '.'));
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
    <h1><?php echo $article->title ?></h1>
    <img src="images/<?php echo $article->photo ?>">
    <div class="content">
        <?php
            foreach($content as $file){
                $info = pathinfo($file);
                if($info['filename'] === $id){
                    echo file_get_contents('content/' . $id . '.html');
                }
            }
        ?>
        <a href="edit.php?id=<?php echo $id ?>">Bewerk</a>
    </div>    
    <a href="index.php" class="btn">Keer terug</a>
</section>
</body>
</html>
