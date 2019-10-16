<?php
function setHeader(){
    header('Location: index.php');
}
include_once 'consts.php';
$file = $_FILES['my_file'];
$target_file = UPLOAD_PATH . '/' . basename($file['name']);
setcookie('filename', '/' . basename($file['name']));

if(isset($_POST['submit'])){
    $extension = pathinfo($target_file)['extension'];
    if(in_array($extension, SAFE_EXTENSIONS)){
        if(move_uploaded_file($file['tmp_name'], UPLOAD_PATH . '/' . $file['name'])){
            setHeader();
        }
    }else{
		$message = 'wrong file extension';
    }
}

?>