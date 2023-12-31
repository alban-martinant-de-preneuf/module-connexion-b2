<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link rel="stylesheet" href="/module-connexion-b2/public/css/reset.css">
    <link rel="stylesheet" href="/module-connexion-b2/public/css/burger.css">
    <link rel="stylesheet" href="/module-connexion-b2/public/css/style.css">
    <link rel="stylesheet" href="/module-connexion-b2/public/css/responsive.css">
    <script src="/module-connexion-b2/public/js/script.js" defer></script>
    <script src="/module-connexion-b2/public/js/admin.js" defer></script>
    <script src="https://kit.fontawesome.com/247a482759.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <section>
            <h2>Page d'administration</h2>
            <p id="message"></p>
            <table id="users_table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>login</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </section>
    </main>
</body>

</html>