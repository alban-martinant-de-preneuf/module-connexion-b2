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

                <li><a class="menu__item log_out" href="">Déconnexion</a></li>
            </ul>
        </div>

    <?php endif; ?>
    <div id="title">
        <h1>
            <a href="/module-connexion-b2">Module de connexion</a>
        </h1>
        <a href="https://github.com/alban-martinant-de-preneuf/module-connexion-b2" target="_blank">
            <i class="fa-brands fa-github logo-github"></i>
        </a>
    </div>
</header>