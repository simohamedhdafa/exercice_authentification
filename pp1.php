<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>page 1</title>
</head>
<body>

<?php
    if(isset($_SESSION['user']) && $_SESSION['status']==="connecte"){
        echo "bonjour ".$_SESSION['user'];
        echo "<br/>le contenu cache est 2022";
        
    }else{
        echo "Attentiooooooooooooooooooooon vous etes pas connectes !";
    }
?>
    <p>
        Aller à <a href="pp2.php">page 2</a> | Pour <a href="deconnect.php">se deconnecter</a>.
    </p>

</body>
</html>

