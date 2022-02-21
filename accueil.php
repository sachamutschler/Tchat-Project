<?php
session_start();
$servername = "";
$username = "";

try
	{
		$db = new PDO("mysql:host=$servername;dbname=",$username,'');
		$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd = new PDO("mysql:host=$servername;dbname=",$username,'');
		$db ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e)
	{
		echo "Erreur de la connexion : " .$e->getMessage();
		die();
	}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil session</title>
    <link href="styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


</head>
<body>

    <h1>Mon tchat</h1>
    <p>Bonjour <?php echo $_SESSION['name'] ?> vous ne pouvez pas encore administrer vos information ci dessous mais vous pouvez cependant communiquer via ce tchat : </p>
    
    <?php 
        //$reponse = $db->query('SELECT name FROM users');
        
        /*while ($donnees = $reponse->fetch())
        {
            echo'<li>'.$donnees['name'] . '</li>';
        }
        echo' </ul>
        </div>';

        $reponse->closeCursor();*/
        include_once ('minichat.php');
        include_once ('mini_post.php');
    ?>
    <?php /*
    <p> /!\ La partie ci dessous n'est pas encore fonctionnelle. /!\ </p>

    <form action="" method="post">
        <div class="form-example">
            <label for="email">Entrez une nouvelle adresse mail :  </label>
            <input type="email" name="submit_email" id="email" class="form-control">
            <button type="submit" name="submit_email" class="btn btn-primary">Modifier</button>
        </div><br>
        <div class="form-example">
            <label for="email">Entrez une nouvelle adresse postale :  </label>
            <input type="text" name="adresse" id="adresse" class="form-control">
            <button type="submit" name="submit_adresse" class="btn btn-primary">Modifier</button>
        </div><br>
        <div class="form-example">
            <label for="email">Entrez un nouveau numéro de téléphone :  </label>
            <input type="tel" name="telephone" id="telephone" class="form-control">
            <button type="submit" name="submit_telephone" class="btn btn-primary">Modifier</button>
        </div><br>
    </form>
    <form action="" method="POST" class="btn btn-primary btn-lg>
    <input type="hidden" name="destroySession" value="1">
    <input type="submit" value="DESTROY SESSION" />
    </form>

    */?>

    <?php
        if (isset($_POST['submit_email'])) {
            var_dump($_POST['submit_email']);
            $query = $db->prepare('UPDATE form SET email="'.$_POST['submit_email'].' "WHERE telephone="'.$_SESSION['telephone'].'"');
            $query->bindParam(1, $email);
            $query->execute();
        }
        $destroySessionFlag = filter_input(INPUT_POST, "destroySession");
        if ($destroySessionFlag == 1) {
        session_destroy();
        }
    ?>

</body>
</html>
