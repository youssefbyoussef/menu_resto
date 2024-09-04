<!DOCTYPE html>
<html>
    <head>
        <title>Burger Code</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
        <h1 class="text-logo"><span class="bi-shop"></span> Burger Code <span class="bi-shop"></span></h1>
        <div class="container admin">
            <div class="row">
                <h1 >Liste de commandes </h1>
                <a href="index2.php" class="btn btn-success btn-lg"><span class="bi bi-arrow-90deg-left"></span> retour</a></h1>
                
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                     
                      <th>nom</th>
                      <th>prix  </th>
                      <th>quantite</th>
                      <th>date de la commande</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                  <?php 

                  require 'connexion.php';

                  $cnt=database::connect();

                  $res=$cnt->query('SELECT * FROM commande');
                  
                  while($item=$res->fetch()){ /*La méthode fetch() est utilisée pour extraire, une par une, les lignes de résultat d'une requête SQL.*/
                  
                    echo '<tr>';
                    echo '<td>'. $item['nom_article']. '</td>';
                    echo '<td>'. $item['prix'].'€'. '</td>';
                    echo' <td>'. $item['quantite']. '</td>';
                    echo' <td>'. $item['date_commande']. '</td>';
                    echo '</tr>';


                  }
                  database::disconnect();
                   ?>
                  </tbody>
                  
                </table>
            </div>
        </div>
    </body>
</html>
