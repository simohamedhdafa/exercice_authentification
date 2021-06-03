<?php 
    function verifier($f, $user, $pass){
        // ouvrir le csv en lecture
        $w = fopen($f, 'r');
        $utilisateurs = array();
        while(!feof($w)){
            $ligne = fgetcsv($w, 1024);
            $utilisateurs[$ligne[0]] = $ligne[1];
        }
        fclose($w);
        array_shift($utilisateurs);
        // creer un tableau associatif de tout le contenu csv
        // $utilisateur = array['user' => 'pass']
        
        if(in_array($user, array_keys($utilisateurs))){
            return $utilisateurs[$user] == $pass;
        }
        return false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="">user:</label>
        <input type="text" name="user" />
        <label for="">pass:</label>
        <input type="password" name="pass" />
        <input type="submit" name="submit" value="ok">
    </form>
</body>
</html>

<?php
    if(isset($_POST['submit'])){

        $user = stripslashes(htmlentities(trim($_POST['user'])));
        $pass = sha1($_POST['pass']);

        $f = 'utilisateurs.csv';
        $acces = verifier($f, $user, $pass);
        if($acces){
            session_start();
            $_SESSION['user'] = $user;
            $_SESSION['status'] = 'connecte';
            $_SESSION['start'] = date('h-i-s, j-m-y');
            header('Location: pp1.php');
        }else{
            header('Location: '.$_SERVER['PHP_SELF']);
        }
    }
    

?>