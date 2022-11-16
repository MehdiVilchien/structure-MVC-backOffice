<?php

namespace App\Controllers;

abstract class CoreController
{

    public $router;

    public function __construct($routeName, $router)
    {

        $this->router = $router;

        // Centralisation des routes qui doivent etre protégées et les roles autorisés sur ces routes
        $acl = [
            // route de teachers
            'teachers-list' => ['admin', 'user'],
            'teachers-add' => ['admin'],
            'teachers-create' => ['admin'],
            'teachers-edit' => ['admin'],
            'teachers-update' => ['admin'],
            'teachers-delete' => ['admin'],
            // route de students
            'students-list' => ['admin', 'user'],
            'students-add' => ['admin'],
            'students-create' => ['admin'],
            'students-edit' => ['admin'],
            'students-update' => ['admin'],
            'students-delete' => ['admin'],
            // route de users
            'appusers-list' => ['admin'],
            'appusers-add' => ['admin'],
            'appusers-create' => ['admin'],
            'appusers-edit' => ['admin'],
            'appusers-update' => ['admin'],
            'appusers-delete' => ['admin'],
            
        ];

        if(isset($acl[$routeName])) {

            $roles = $acl[$routeName];
            $this->checkAuthorization($roles);

        }
    }

    /**
     * Méthode permettant d'afficher du code HTML en se basant sur les views
     *
     * @param string $viewName Nom du fichier de vue
     * @param array $viewData Tableau des données à transmettre aux vues
     * @return void
     */
    protected function show(string $viewName, $viewData = [])
    {
    
        $router = $this->router;
        $viewData['currentPage'] = $viewName;
        $viewData['assetsBaseUri'] = $_SERVER['BASE_URI'] . 'assets/';
        $viewData['baseUri'] = $_SERVER['BASE_URI'];
    
        extract($viewData);
       
        //d(get_defined_vars());
        //d($_SESSION);
        
        require_once __DIR__ . '/../views/layout/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/layout/footer.tpl.php';
    }

    /**
     * Méthode permettant de rediriger vers n'importe quelle page de notre application
     *
     * @param string $routeName
     * @return void
     */
    protected function redirect($routeName)
    {
        $url = $this->router->generate($routeName);
        header('Location: ' . $url);
        exit;
    }

    /**
     * Méthode qui vérifie que l'utilisateur actuellement connecté possède un des roles donnés en paramètre
     *
     * @param array $roles Contient la liste des roles autorisés
     * @return void
     */
    public function checkAuthorization($roles)
    {
        if(isset($_SESSION['connectedUser'])) {

            $currentUser = $_SESSION['connectedUser'];
            $userRole = $currentUser->getRole();

            if(in_array($userRole,$roles)) {
                return true;
            } else {
                http_response_code(403);
                $this->show('error/err403');
                exit;
            }  
        }
        else {
            $this->addError("Vous devez vous connecter pour accéder à cette page !");
            $this->redirect('appusers-signinForm');
        }
    }

    /**
     * Ajoute un message d'erreur dans la liste des erreurs en session
     *
     * @param string $message Message d'erreur à ajouter.
     * @return void
     */
    public function addError($message)
    {
        $_SESSION['errorMessages'][] = $message;
    }

    /**
     * Indique si on a des erreurs dans la session
     *
     * @return boolean
     */
    public function hasErrors()
    {
        return (!empty($_SESSION['errorMessages']));
    }
}
