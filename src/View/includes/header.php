<header>

    <?php if (isset($_SESSION['user'])) : ?>

        <div class="hamburger-menu">
            <input id="menu__toggle" type="checkbox" />
            <label class="menu__btn" for="menu__toggle">
                <span></span>
            </label>

            <ul class="menu__box">
                <li><a class="menu__item" href="/module-connexion-b2/profil">Profil</a></li>

                <?php $user = unserialize($_SESSION['user']);
                if ($user->getLogin() === 'admiN1337$') : ?>
                    <li><a class="menu__item" href="/module-connexion-b2/admin">Panel admin</a></li>
                <?php endif; ?>

                <li><a class="menu__item" href="/module-connexion-b2/logout">Déconnexion</a></li>
            </ul>
        </div>

    <?php endif; ?>
    <h1>
        <a href="/module-connexion-b2">Module de connexion</a>
    </h1>

</header>