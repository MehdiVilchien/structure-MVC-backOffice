<?php
require_once '../vendor/autoload.php';
session_start();

//! -------------------- ROUTAGE -------------------- //

$router = new AltoRouter();
if (array_key_exists('BASE_URI', $_SERVER)) {
    $router->setBasePath($_SERVER['BASE_URI']);
    } 
else {
    $_SERVER['BASE_URI'] = '/';
    }

//* -------------------- HOME -------------------- // 

// Route pour l'afichage de la Home page
$router->map(
    'GET',
    '/',
    [
        'method' => 'home',
        'controller' => 'MainController'
    ],
    'main-home'
);

//* -------------------- TEACHERS -------------------- // 

// Route pour la liste des teachers
$router->map(
    'GET',
    '/teachers',
    [
        'method' => 'listAction',
        'controller' => 'TeacherController'
    ],
    'teachers-list'
);
// Route pour le formulaire d'ajout des teachers
$router->map(
    'GET',
    '/teachers/add',
    [
        'method' => 'addAction',
        'controller' => 'TeacherController'
    ],
    'teachers-add'
);
// Route pour la creation des teachers
$router->map(
    'POST',
    '/teachers/add',
    [
        'method' => 'createAction',
        'controller' => 'TeacherController'
    ],
    'teachers-create'
);
// Route pour le formulaire d'édition des teachers
$router->map(
    'GET',
    '/teachers/[i:id]',
    [
        'method' => 'editAction',
        'controller' => 'TeacherController'
    ],
    'teachers-edit'
);
// Route pour la mise à jour des teachers
$router->map(
    'POST',
    '/teachers/[i:id]',
    [
        'method' => 'updateAction',
        'controller' => 'TeacherController'
    ],
    'teachers-update'
);

// Route de suppression d'un teacher
$router->map(
    'GET',
    '/teachers/[i:id]/delete',
    [
        'method' => 'deleteAction',
        'controller' => 'TeacherController'
    ],
    'teachers-delete'
);

//* -------------------- STUDENTS -------------------- // 

// Route pour la liste des students
$router->map(
    'GET',
    '/students',
    [
        'method' => 'listAction',
        'controller' => 'StudentController'
    ],
    'students-list'
);
// Route pour le formulaire d'ajout des students
$router->map(
    'GET',
    '/students/add',
    [
        'method' => 'addAction',
        'controller' => 'StudentController'
    ],
    'students-add'
);
// Route pour la creation des students
$router->map(
    'POST',
    '/students/add',
    [
        'method' => 'createAction',
        'controller' => 'StudentController'
    ],
    'students-create'
);
// Route pour le formulaire d'édition des students
$router->map(
    'GET',
    '/students/[i:id]',
    [
        'method' => 'editAction',
        'controller' => 'StudentController'
    ],
    'students-edit'
);
// Route pour la mise à jour des students
$router->map(
    'POST',
    '/students/[i:id]',
    [
        'method' => 'updateAction',
        'controller' => 'StudentController'
    ],
    'students-update'
);

// Route de suppression d'un student
$router->map(
    'GET',
    '/students/[i:id]/delete',
    [
        'method' => 'deleteAction',
        'controller' => 'StudentController'
    ],
    'students-delete'
);

//* -------------------- USER -------------------- // 

// Route pour la liste des users
$router->map(
    'GET',
    '/appusers',
    [
        'method' => 'listAction',
        'controller' => 'AppUserController'
    ],
    'appusers-list'
);
// Route pour le formulaire d'ajout des users
$router->map(
    'GET',
    '/appusers/add',
    [
        'method' => 'addAction',
        'controller' => 'AppUserController'
    ],
    'appusers-add'
);
// Route pour la creation des users
$router->map(
    'POST',
    '/appusers/add',
    [
        'method' => 'createAction',
        'controller' => 'AppUserController'
    ],
    'appusers-create'
);
// Route pour le formulaire d'édition des users
$router->map(
    'GET',
    '/appusers/[i:id]',
    [
        'method' => 'editAction',
        'controller' => 'AppUserController'
    ],
    'appusers-edit'
);
// Route pour la mise à jour des users
$router->map(
    'POST',
    '/appusers/[i:id]',
    [
        'method' => 'updateAction',
        'controller' => 'AppUserController'
    ],
    'appusers-update'
);

// Route de suppression d'un user
$router->map(
    'GET',
    '/appusers/[i:id]/delete',
    [
        'method' => 'deleteAction',
        'controller' => 'AppUserController'
    ],
    'appusers-delete'
);

//* -------------------- LOGIN -------------------- //

// Route qui affiche le formulaire de connexion
$router->map(
    'GET',
    '/signin',
    [
        'method' => 'signInFormAction',
        'controller' => 'AppUserController'
    ],
    'appusers-signinForm'
);

// Route qui traite les données du formulaire de connexion
$router->map(
    'POST',
    '/signin',
    [
        'method' => 'connectAction',
        'controller' => 'AppUserController'
    ],
    'appusers-connect'
);

// Route qui déconnecte l'utilisateur
$router->map(
    'GET',
    '/signout',
    [
        'method' => 'logOutAction',
        'controller' => 'AppUserController'
    ],
    'appusers-signOut'
);

//! -------------------- DISPATCH -------------------- //

$match = $router->match();
$dispatcher = new Dispatcher($match, 'ErrorController::err404');
$dispatcher->setControllersNamespace('App\Controllers');
$dispatcher->setControllersArguments($match['name'], $router);
$dispatcher->dispatch();