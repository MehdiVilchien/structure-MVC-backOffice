<?php

if(isset($_SESSION['connectedUser'])) : 
// On récupère l'objet représentant la personne connectée
$currentUser = $_SESSION['connectedUser'];
?>
    <p class="display-4">
        Bienvenue <?= $currentUser->getName() ?>
    </p>
<?php else: ?>
    <div class="container my-4">
        <p class="display-5">
            Bienvenue dans le backOffice <strong>de votre école</strong>...
        </p>
    </div>
<?php endif; ?>
