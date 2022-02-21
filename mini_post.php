<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=;dbname=;charset=utf8mb4', '', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
if (isset($_POST['envoyer'])) {
    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?,?)');
    $req->execute(array($_POST['pseudo'],$_POST['message']));
    header("Location: accueil.php");
}



// Redirection du visiteur vers la page du minichat
include_once('minichat.php')
?>
