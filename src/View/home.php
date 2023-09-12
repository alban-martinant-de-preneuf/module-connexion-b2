<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module de connexion</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="public/js/script.js" defer></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <section>
            <?php if (!isset($_SESSION['user'])) : ?>
                <div class="home">
                    <h2>Vous n'êtes pas connecté</h2>
                    <div class="buttons">
                        <button id="log_in">
                            <a href="login.php">Se connecter</a>
                        </button>
                        <button id="sign_in">
                            <a href="register.php">S'inscrire</a>
                        </button>
                    </div>
                </div>
            <?php else : ?>
                <div class="home">
                    <h2>Vous êtes connecté</h2>
                    <button>
                        <a href="logout.php">Se déconnecter</a>
                    </button>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>

</html>