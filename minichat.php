
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
    
    <form action="" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input readonly="readonly" type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['name'] ?>" /> <br/>
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" name="envoyer" value="Envoyer" />
	</p>
    </form>
<div class="tchat">
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
 
// Récupération des 20 derniers messages
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 20');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
</div>

    </body>
</html>
