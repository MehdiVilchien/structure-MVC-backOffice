<?php

if(isset($_SESSION['connectedUser'])) : 
// On récupère l'objet représentant la personne connectée
$currentUser = $_SESSION['connectedUser'];
?>
    <p class="display-4">
        Bienvenue <?= $currentUser->getName() ?>
    </p>
<?php endif; ?>    
<div class="full_container">
<div class="page">
        <header>
            <h1>Projet</h1>
            <h2></h2>
        </header>
        <div class="line"></div>
        <main class="project">
            <article>
                <h3>BackOffice</h3>
                <p class="link-project"><a href="https://github.com/MehdiVilchien/structure-MVC-backOffice" target="_blank"><img src="assets/img/arrow-right.svg" alt="fleche">Repo du projet</a></p>
                <h4>Détail du projet :</h4><p>Exemple de BackOffice pour une école en structure MVC en PHP Vanilla, base de données avec le profile des professeurs, étudiants et comptes utilisateurs du BackOffice, gestion des connections et permissions d'accès aux pages avec rôles (admin, user), Composer avec Altorouter, Alto-Dispacher, Kint</p>
                <h4 class="language">Techno utilisées : 
                    <img src="assets/img/brand-php.svg" alt="icone PHP">
                    <img src="assets/img/brand-bootstrap.svg" alt="icone bootstrap">
                    <img src="assets/img/recycle.svg" alt="icone MVC">
                    <img src="assets/img/database.svg" alt="icone database">
                </h4>
            </article>
            <div class="line"></div>
            <article>
                <h3>Soundboard</h3>
                <p class="link-project"><a href="https://mehdivilchien.github.io/projet/soundboard/" target="_blank"><img src="assets/img/arrow-right.svg" alt="fleche">lien du projet</a></p>
                <h4>Détail du projet :</h4><p>Lecture de sons aux clicks sur les touches correspondantes, ainsi que la pression sur les touches du clavier et du tactile sur mobiles/tablettes, effets visuel à la pression des boutons</p>
                <h4 class="language">Techno utilisées : 
                    <img src="assets/img/brand-html5.svg" alt="icone HTML">
                    <img src="assets/img/brand-css3.svg" alt="icone CSS">
                    <img src="assets/img/brand-javascript.svg" alt="icone JavaScript">
                </h4>
            </article>
            <div class="line"></div>
        </main>
    </div>
    <div class="pencil"></div>
</div>
