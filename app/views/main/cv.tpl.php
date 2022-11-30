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
            <h1>Mehdi Vilchien</h1>
            <h2>Developpeur Web</h2>
            <h3 class="dispo">Disponibilite Mars 2023</h3>
            <div class="picture_profil">
                <img src="assets/img/profil.jpeg" alt="Photo d'identité">
            </div>
        </header>
        <main>
            <section class="section_left">
                <div class="line"></div>
                <div class="experience">
                    <h3>Expériences</h3>
                    <article>
                        <time>2015-2022</time>
                        <h4>Chef d'entreprise boulangerie, pâtisserie</h4>
                        <p>Perfectionnement de compétences métier, gestion du personnel, relation client, comptabilité et diverses tâches administrative lié à l'entrepreneuriat.</p>
                    </article>
                    <article>  
                        <time>2014-2015</time>
                        <h4>Chef Boulanger</h4>
                        <p>Recrutement, formation et gestion d'une équipe, supervision et contrôle qualité d'une production.</p>
                    </article>
                    <article>  
                        <time>2012-2014</time>
                        <h4>Employé libre service, livraison</h4>
                        <p>Relation et satisfaction client, mise en avant de produits.</p>
                    </article>
                    <article>
                        <time>2006 - 2012</time>
                        <h4>Apprentissage</h4>
                        <p>Écoute, mise en application, initiation à l'emploi.</p>
                    </article>
                </div>
                <div class="line"></div>
                <div class="about_me">
                    <h3>A propos de moi</h3>
                        <ul>
                            <li><a href="https://www.addevent.com/event/kd15269355" target="_blank">Né le 01/01/1989</a><img src="assets/img/cake.svg" alt="icone cake"></li>
                            <li><span class="link">Permis B véhiculé</span><img src="assets/img/car.svg" alt="icone voiture"></li>
                            <li><a href="./projet/index.html">Projet<img src="assets/img/arrow-left.svg" alt="icone fleche"></a><img src="assets/img/brand-github.svg" alt="icone github"></li>
                            <li><a href="https://twitter.com/MVilchien" target="_blank">Twitter<img src="assets/img/arrow-left.svg" alt="icone fleche"></a><img src="assets/img/brand-twitter.svg" alt="icone twitter"></li>
                            <li><a href="https://www.linkedin.com/in/mehdi-vilchien-b71490255/" target="_blank">Linkedin<img src="assets/img/arrow-left.svg" alt="icone fleche"></a><img src="assets/img/brand-linkedin.svg" alt="icone linkedin"></li>
                        </ul>
                </div>
                <div class="line"></div>
                <div class="contact">
                    <h3>Contact</h3>
                    <ul>
                        <li><a href="https://goo.gl/maps/XRrhPfHCVEwhTEPH9" target="_blank">49740 La Romagne</a><img src="assets/img/map-pin.svg" alt="icone map"></li>
                        <li><a href="tel:(+33)(0611673768)" target="_blank">06 11 67 37 68</a><img src="assets/img/mobile.svg" alt="icone mobile"></li>
                        <li><a href="mailto:m.vilchien@gmail.com" target="_blank">m.vilchien@gmail.com</a><img src="assets/img/mail.svg" alt="icon mail"></li>
                    </ul>
                </div>
            </section>
            <div class="line"></div>
            <section class="section_right">
                <div class="line"></div>
                <div class="formation">
                    <h3>Formation WEB</h3>
                    <article>
                        <time>août 2022- fév 2023</time>
                        <h4>Développeur Web et Web Mobile</h4>
                        <p class="line-school"><a class="school" href="https://oclock.io/formations/developpeur-web"><img src="assets/img/arrow-right.svg" alt="icone fleche">O'Clock</a> (798h)</p>
                        <ul>
                            <li>Socle (476h): HTML, CSS, PHP, JS, POO et MySQL</li>
                            <li>Spécialisation (168h): Symfony</li>
                            <li>Apothéose (154h): Projet de groupe</li>
                        </ul>
                    </article>
                    <div class="line"></div>
                    <h3>Autres Formations</h3>
                    <article>
                        <time>2010 - 2012</time>
                        <h4>BP Boulanger</h4>
                        <time>2009 - 2010</time>
                        <h4>CAP Boulanger</h4>
                        <time>2008 - 2009</time>
                        <h4>Mention Dessert à l'assiette</h4>
                        <time>2006 - 2008</time>
                        <h4>BEP Pâtisserie</h4>
                    </article>
                </div>
                <div class="line"></div>
                <div class="competences">
                    <h3>Compétences</h3>
                    <h4>Niveau débutant</h4>
                    <ul>
                        <li>
                            <img src="assets/img/brand-html5.svg" alt="icone html"><span class="link html">HTML</span>
                            <img src="assets/img/brand-css3.svg" alt="icone css"><span class="link css">CSS</span>
                        </li>
                        <li>
                            <img src="assets/img/brand-javascript.svg" alt="icone javascript"><span class="link js">JavaScript</span>
                            <img src="assets/img/brand-php.svg" alt="icon php"><span class="link php">PHP</span>
                        </li>
                        <li>
                            <img src="assets/img/brand-bootstrap.svg" alt="icone bootstrap"><span class="link bootstrap">Bootstrap</span>
                            <img src="assets/img/brand-symfony.svg" alt="icone react"><span class="link symfony">Symfony</span>
                        </li>
                        <li>
                            <img src="assets/img/database.svg" alt="icone database"><span class="link sql">MySQL</span>
                            <img src="assets/img/recycle.svg" alt="icone recycle"><span class="link mvc">MVC</span>
                        </li>
                    </ul>
                </div>
                <div class="line"></div>
                <div class="soft_skills">
                    <h3>Soft skills</h3>
                    <ul>
                        <li>L’esprit d’équipe</li>
                        <li>La flexibilité</li>
                        <li>La gestion du stress</li>
                        <li>La motivation</li>
                    </ul>
                </div>
            </section>
        </main>
        <footer>
            <div class="line"></div>
            <h3>Centre d'intérêt</h3>
                <ul class="hobby">
                    <li><img src="assets/img/chess.svg" alt="icone échec">Jeux de société</li>
                    <li><img src="assets/img/hammer.svg" alt="icone marteau">Bricolage</li>
                    <li><img src="assets/img/chef-hat.svg" alt="icone toque">Cuisine</li>
                </ul>
        </footer>
    </div>
    <div class="pencil"></div>
</div>
