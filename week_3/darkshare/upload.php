<?php
function setHeader(){
    header('Location: index.php');
}
include_once 'config.php';
$file = $_FILES['my_file'];
$target_file = UPLOAD_PATH . '/' . basename($file['name']);
if(isset($_POST['submit'])){
    $extension = pathinfo($target_file)['extension'];
    if(in_array($extension, SAFE_EXTENSIONS)){
        if(move_uploaded_file($file['tmp_name'], UPLOAD_PATH . '/' . $file['name'])){
            setHeader();
        }
    }else{
        $message = 'wrong file extension!';
    }
}
//TODO: upload file. indien ok redirect to index.php. Indien niet geef een goede melding aan de gebruiker.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DarkShare</title>
    <link rel="stylesheet" href="/week_3/css/main.css">
</head>
<body>

<h1>DarkShare</h1>

<section>
<?php echo $message; ?>
</section>

</body>
</html>
