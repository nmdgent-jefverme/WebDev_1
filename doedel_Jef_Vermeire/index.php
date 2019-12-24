<?php
require_once 'app.php';
$hasCode = false;
$code = $_GET['doedel_code'];
if($code) {
    $dates = Doedel::datesById($code);
    if(sizeof($dates) === 0) $hasCode = false;
    else $hasCode = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doedel</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

</head>
<body>
<div class="container">
<div class="row">

      <div class="col s8">
       
    <?php if($hasCode) : ?>
        <?php include_once 'views/doedel_info.php' ?>
        <form action="add_vote.php" method="post">
            <div class="input-field">    
                <input type="text" id="name" class="validate" name="name">
                <label for="name">Naam</label>
            </div>
            <div class="input-field">    
                <input type="text" id="email" class="validate" name="email">
                <label for="email">E-mail</label>
            </div>
            <p>
                <?php
                    foreach ($dates as $date) {
                        $doedel_date = strtotime($date['doedel_date']);
                        include 'views/doedel_date.php';
                    }
                ?>
            </p>
            <p>
                <button type="submit" class="waves-effect indigo darken-1 btn-large">Verstuur <i class="material-icons right">send</i></button>
            </p>
            <input type="hidden" name="doedel_code" value="<?php echo $code ?>">
        </form>
    <?php else : ?>
        <h2>Heb je een doedel code ontvangen?</h2>
        <p>Vul hieronder de doedel code in en kies de dagen die voor jou passen...</p>
        <form action="index.php" method="get">
            <p><label>
                Code<br>
                <input type="text" name="doedel_code" required>
            </label></p>
            <p>
                <button type="submit" class="waves-effect waves-light btn-large">Ga naar de doedel</button>
            </p>
        </form>
    <?php endif; ?>
     </div>

    <div class="col s4">

        <h3></h3>
        <a href="create.php" class="btn-large indigo lighten-4">Zelf een doedel maken</a>      </div>

    </div>

</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
</body>
</html>