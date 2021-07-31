<?php
require_once 'inclureClasses.php';

$pdo = new PDO('mysql: host=localhost; dbname=espace_membres', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ou après 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC])

$manager = new UtilisateursManager($pdo);

if (isset($_POST['enregistrer'])) {
    $utilisateur = new Utilisateurs([
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'tel' => $_POST['tel'],
        'email' => $_POST['email']
    ]);
    if ($utilisateur->isUserValid()) {
        $manager->inserer($utilisateur);
        echo 'Utilisateur enregistré';
    } else {
        $erreurs = $utilisateur->getErreurs();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Inscription</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link" aria-current="page">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a href="inscription.php" class="nav-link">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a href="administration.php" class="nav-link">Administration</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
    <div class="container">
        <h1>Inscription utilisateur</h1>
        <div class="row">
            <div class="col-md-6">
                <form action="inscription.php" method="post" col-md-6>
                    <div class="mb-3">
                        <?php if (isset($erreurs) && in_array(Utilisateurs::NOM_INVALIDE, $erreurs))
                            echo 'Le nom est invalide <br>';
                        ?>
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>

                    <?php if (isset($erreurs) && in_array(Utilisateurs::PRENOM_INVALIDE, $erreurs))
                        echo 'Le prénom est invalide <br>';
                    ?>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom">
                    </div>

                    <div class="mb-3">
                        <label for="tel" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="tel" name="tel">
                    </div>

                    <?php if (isset($erreurs) && in_array(Utilisateurs::EMAIL_INVALIDE, $erreurs)) {
                        echo 'L\'email est invalide <br>';
                    }
                    ?>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <button type="submit" class="btn btn-primary" name="enregistrer">Enregistrer</button>
                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>