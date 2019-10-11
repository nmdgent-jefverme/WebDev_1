<?php
if(isset($_GET['view'])){
    $view = isset($_GET['view']) ? $_GET['view'] : 'list';
    setcookie('view', $view);
    
} else {
    $view = $_COOKIE['view'];  
}
include_once 'config.php';
include_once 'functions.php';
$search = false;
if(is_dir(UPLOAD_PATH)){
    if(isset($_GET['search_value'])){
        $search = $_GET['search_value'];
    }
    $files = array_diff(scandir(UPLOAD_PATH), array('..', '.'));
}else{
    echo 'geen succes';
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DarkShare</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<h1>DarkShare</h1>

<section>
    <form action="upload.php" method="post" enctype="multipart/form-data"> <!-- TODO: ga op zoek naar de correcte attributen voor het opladen van bestanden via een form -->
        <input type="file" name="my_file" class="input"> 
        <input type="submit" name="submit" value="submit" class="btn">
    </form>
</section>
<section class="">
    <h2>Shared files</h2>
    
    <div class="filter">
        <form action="index.php" method="get">
            <input type="text" name="search_value">
            <input type="submit" value="Search" class="btn">
        </form>
        <div class="view_switch">
            <a href="?view=list">list</a>
            <a href="?view=grid">grid</a>
        </div>
    </div>
    <div class="file-list <?php echo $view; ?>">
        <!-- TODO: Maak onderstaande lijst dynamisch -->
        <?php
            foreach($files as $file){
                //echo $file;
                $info = pathinfo($file);
                //var_dump($info);
                $filesize = human_filesize(filesize('./' . UPLOAD_PATH . '/' . $file));
                if(!$search || strpos($file, $search) !== false){
        ?>
        <div class="file">
            <?php
            if(in_array($info['extension'], IMG_EXTENSIONS)){
            ?>
            <div class="icon icon-image">
                <img src="uploads/<?php echo $file ?>">
            </div>
            <?php
            }else{
            ?>
            <div class="icon icon-<?php echo $info['extension'] ?>">
                <span>txt</span>
            </div>
            <?php
            }
            ?>
            
            <div class="file_info">   
                <strong><?php echo $file ?></strong><br>
                <?php echo $filesize ?>                                
            </div>
            <div class="buttons">
                <a href="uploads/<?php echo $file; ?>" class="btn" download="">Download</a>
        <?php if(in_array($info['extension'], TXT_EXTENSIONS)) {?><a href="edit.php?file=<?php echo $file; ?>" class="btn">Edit</a><?php } ?>
            </div>
        </div> 

    <?php }} ?>
    </div>
    <div class="paging">
        <a href="?page=1" class="current">1</a>
        <a href="?page=2">2</a>
        <a href="?page=3">3</a>
        <a href="?page=4">4</a>
        <a href="?page=5">5</a>
    </div>
</section>

</body>
</html>