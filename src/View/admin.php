<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link rel="stylesheet" href="/module-connexion-b2/public/css/reset.css">
    <link rel="stylesheet" href="/module-connexion-b2/public/css/style.css">
    <script src="/module-connexion-b2/public/js/script.js" defer></script>
    <script src="/module-connexion-b2/public/js/admin.js" defer></script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <section>
            <h1>Page d'administration</h1>
            <table id="users_table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>login</th>
                        <th>firstname</th>
                        <th>lastname</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

        </section>
    </main>
</body>

</html>