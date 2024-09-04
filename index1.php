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
        <div class="container site">
            <h1 class="text-logo">
                <span class="bi-shop"></span> Burger Code <span class="bi-shop"></span>
            </h1>
            <?php 
                require 'connexion.php';
                echo '<nav>
                      <ul class="nav nav-pills" role="tablist">';
    
                $db = Database::connect();
                $statement = $db->query('SELECT * FROM categories');
                $categories = $statement->fetchAll();
    
                foreach($categories as $category) {
                    if ($category['id'] == '1') {
                        echo '<li class="nav-item">
                                <a class="nav-link active" id="tab-' . $category['id'] . '-tab" data-bs-toggle="pill" href="#tab-' . $category['id'] . '">' . $category['name'] . '</a>
                              </li>';
                    } else {
                        echo '<li class="nav-item">
                                <a class="nav-link" id="tab-' . $category['id'] . '-tab" data-bs-toggle="pill" href="#tab-' . $category['id'] . '">' . $category['name'] . '</a>
                              </li>';
                    }
                }
                echo '</ul></nav>';

                echo '<div class="tab-content">';
    
                foreach($categories as $category) {
                    if ($category['id'] == '1') {
                        echo '<div class="tab-pane fade show active" id="tab-' .$category['id']. '" role="tabpanel">';
                    } else {
                        echo '<div class="tab-pane fade" id="tab-' . $category['id'] . '" role="tabpanel">';
                    }
    
                    echo '<div class="row">';
    
                    $statement = $db->prepare('SELECT * FROM items WHERE items.category=?');
                    $statement->execute(array($category['id']));
                    while ($item = $statement->fetch()) {
                        echo '<div class="col-md-6 col-lg-4">';
                        echo '<div class="img-thumbnail">';
                        echo '<img src="' . $item['image'] . '" alt="...">';
                        echo '<div class="price">' . $item['price'] . ' €</div>';
                        echo '<div class="caption">';
                        echo '<h4>' . $item['name'] . '</h4>';
                        echo '<p>' . $item['description'] . '</p>';
                        echo '<form method="post" action="ajouter_commande.php">';
                        echo '<input type="hidden" name="nom_article" value="' . $item['name'] . '">';
                        echo '<input type="hidden" name="prix" value="' . $item['price'] . '">';
                        echo '<input  type="hidden" name="quantite" value="1" min="1">';
                        echo '<button type="submit" class="btn btn-order"><span class="bi-cart-fill"></span> Commander</button>';
                        echo '</form>';
                        
                        echo '</div></div></div>';
                    }
                    
                    echo '</div></div>';
                }
                Database::disconnect();
            ?>
        </div>
    </body>
</html>
