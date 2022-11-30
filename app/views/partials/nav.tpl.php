<nav class="navbar">
    <span class="navbar-brand" href="">Mehdi Vilchien</span>
    <ul class="navbar-ul">
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('main-home') ?>">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('main-cv') ?>">Curriculum Vitae</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('main-projet') ?>">Projet</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('teachers-list') ?>">Profs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('students-list') ?>">Etudiants</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('appusers-list') ?>">Utilisateurs</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= $router->generate('appusers-signOut') ?>">Se déconnecter</a>
        </li>
    </ul>
</nav>