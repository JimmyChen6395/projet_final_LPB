<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titre ?></title>
    <link rel="stylesheet" href="/src/common/header.php">
    <script src="https://kit.fontawesome.com/83f4286022.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>
<body>

    <style>
        .navbar{
            border: solid 1px red;
        }
    </style>


    <header>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="#">
                 <img src="/src/img/E.gif" width="112" height="28">
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-dark" href="../../src/pages/login.php">
                            <strong>Se connecter</strong>
                        </a>
                        <a class="button is-dark" href="../../src/pages/register.php">
                            <strong>S'enregistrer</strong>
                        </a>
                        <a class="button is-light">
                            Panier
                        </a>
            </div>
        </nav>
    </header>
</body>
</html>