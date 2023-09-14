<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page profil</title>
    <link rel="stylesheet" href="/module-connexion-b2/public/css/reset.css">
    <link rel="stylesheet" href="/module-connexion-b2/public/css/style.css">
    <script src="/module-connexion-b2/public/js/script.js" defer></script>
    <script src="/module-connexion-b2/public/js/profil.js" defer></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <section>
            <?php
            if (isset($_SESSION['user'])) {
                $user = unserialize($_SESSION['user']);
            } else {
                header('location: /module-connexion-b2/');
            }
            ?>
            <h1>Page profil</h1>

            <h2>Modifier mes informations</h2>
            <p id="update_message"></p>
            <table id="users_table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>login</th>
                        <th>firstname</th>
                        <th>lastname</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="" method="post" id="change_profil">
                        <tr>
                            <td><?= $user->getId() ?></td>
                            <td><input type="text" name="login" id="login" value="<?= $user->getLogin() ?>"></td>
                            <td><input type="text" name="firstname" id="firstname" value="<?= $user->getFirstname() ?>"></td>
                            <td><input type="text" name="lastname" id="lastname" value="<?= $user->getLastname() ?>"></td>
                        </tr>
                        <tr>
                            <td colspan="4"><button type="submit" id="edit_infos">Valider les changements</button></td>
                        </tr>
                    </form>
                </tbody>
            </table>

            <h2>Modifier mon mot de passe</h2>
            <p id="update_pwd_message"></p>
            <form action="" method="post" id="change_pwd">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" name="password" id="new_password" required>
                <label for="password2">Confirmer le nouveau mot de passe</label>
                <input type="password" name="password2" id="new_password2" required>
                <button type="submit">Valider les changements</button>
            </form>

        </section>
    </main>
</body>

</html>