<?php  

require 'connexion.php';

if(!empty($_POST)){
    $id= checkInput($_POST['id']);
    $nom_article= checkInput($_POST['nom_article']);
    $quantite= checkInput($_POST['quantite']);
    $prix= checkInput($_POST['prix']);
    $date_commande= checkInput($_POST['date_commande']);
    
    $db=database::connect();

    $statement=$db->prepare('INSERT INTO commande (nom_article, quantite, prix, date_commande) VALUES (?, ?, ?, ?)');
    $statement->execute([$nom_article, $quantite, $prix, $date_commande]);

    database::disconnect();

}
header("Location: index1.php");


function checkInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


?>