<?php 

$servername = "horuswy28.mysql.db";
$username = "horuswy28";

session_start();
$id_session = session_id();
$erreur = null;

if (isset($_POST['submit'])) {

if (!empty($_POST)) {

    if (isset($_POST["name"], $_POST["password"])
    && !empty($_POST["name"]) && !empty($_POST["password"])
    ){
        $name = strip_tags($_POST["name"]);
        $password = strip_tags($_POST["password"]);
        
    }
    else {
        $erreur = "Indentifiants incorrect";	
        }
    }

    try
	{
		$db = new PDO("mysql:host=$servername;dbname=horuswy28",$username,'Sacha28199');
		$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "vous êtes bien connecté à la base de donnée <br>";
	}

	catch(PDOException $e)
	{
		echo "Erreur de la connexion : " .$e->getMessage();
		die();
	}
    
    $select_login = $db->prepare("SELECT * FROM users WHERE name='$name' AND password='$password' ");
                        $select_login->execute();

                        

                        if($select_login->rowCount() > 0 ) {
                            $_SESSION['name'] = $name;
                            $id_session = session_id();
                            $_COOKIE['PHPSESSID'] = $id;
                            header("Location: accueil.php");
                        }
                        else{
                            $erreur = "Indentifiants incorrect";
                        }
}


?>

<?php if ($erreur): ?>
<div class="alert alert-danger">
    <?= $erreur ?>
</div>
<?php endif;?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</head>
<body>
    <form action="" method="post">
        <div class="form-group">
            <input class="form-control" type="text" name="name" placeholder="ID">
        </div>

        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Connexion</button>
    </form>    
</body>
</html>
