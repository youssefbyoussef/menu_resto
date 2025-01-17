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
                <h1><strong>Liste des items   </strong><a href="insert.php" class="btn btn-success btn-lg"><span class="bi-plus"></span> Ajouter</a></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Description</th>
                      <th>Prix </th>
                      <th>Catégorie</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 

                  require 'connexion.php';

                  $cnt=database::connect();

                  $res=$cnt->query('SELECT items.id, items.name, items.description, items.price, categories.name AS category 
                                    FROM items 
                                    LEFT JOIN categories 
                                    ON items.category = categories.id 
                                    ORDER BY items.id DESC');
                  
                  while($item=$res->fetch()){ /*La méthode fetch() est utilisée pour extraire, une par une, les lignes de résultat d'une requête SQL.*/
                  
                    echo '<tr>';
                    echo '<td>'. $item['name']. '</td>';
                    echo '<td>'. $item['description']. '</td>';
                    echo '<td>'. $item['price'].'€'. '</td>';
                    echo' <td>'. $item['category']. '</td>';

                    echo '<td width=480>';
                    echo '<a class="btn btn-secondary" href="view.php?id='. $item['id'].'"><span class="bi-eye"></span> Voir</a>';
                    echo " ";
                    echo '<a class="btn btn-primary" href="update.php?id='. $item['id'].'"><span class="bi-pencil"></span> Modifier</a>';
                    echo " ";
                    echo '<a class="btn btn-danger" href="delete.php?id='. $item['id'].'"><span class="bi-x"></span> Supprimer</a>';
                    echo "";
                    echo '<a class="btn btn-warning" href="view2.php?id='. $item['id'].'"><span class="bi bi-list-ol"></span> commandes</a>';
                    echo "";
                    echo' </td>';
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
