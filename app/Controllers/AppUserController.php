<?php

namespace App\Controllers;

use App\Models\AppUser;

class AppUserController extends CoreController {

     /**
     * Méthode qui affiche le formulaire de connexion
     *
     * @return void
     */
    public function signInFormAction()
    {
        if(isset($_SESSION['connectedUser'])) {

            $this->addError("Vous êtes déjà connecté");
            $this->redirect('main-home');

        } 
        else{
            $this->show('main/signin');
        }
    }

    /**
     * Méthode de traitement du formulaire de connexion
     *
     * @return void
     */
    public function connectAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        
        if(empty($email) || empty($password)) {
            echo "Les champs doivent etre remplis";
            exit;
        }

        $user = AppUser::findByEmail($email);

        if($user === false) {
            $this->addError("Utilisateur non trouvé");

            $this->redirect('appusers-signInFormAction');  
        }
        else {
            if(password_verify($password, $user->getPassword())) {

                $_SESSION['connectedUser'] = $user;
                $_SESSION['successMessages'][] = "Connexion réussie !";

                $this->redirect('main-home');
            } 
            else {
                $this->addError("Mot de passe incorrect");
                $this->redirect('appusers-signInFormAction');
            }
        }
    }


    public function logoutAction()
    {
        unset($_SESSION['connectedUser']);

        $_SESSION['successMessages'][] = "Déconnexion effective";

        $this->redirect('main-home');
    }

    /**
     * Affiche la liste des utilisateurs
     *
     * @return void
     */
    public function listAction()
    {
        $users = AppUser::findAll();
        
        $this->show('appusers/list', [
            'users' => $users
        ]);
    }

      /**
     * Méthode permettant d'afficher le formulaire de création d'un appuser
     *
     * @return void
     */
    public function addAction()
    {
        $this->show('appusers/add');
    }


    /**
     * Affiche la page d'édition d'un appuser
     *
     * @param int $id
     * @return void
     */
    public function editAction($id)
    {
        $users = AppUser::find($id);
        
        $this->show('appusers/edit', [
            'users' => $users
        ]);
    }


    /**
     * Méthode qui permet de traiter les infos envoyées par le formulaire d'édition
     *
     * @param int $id
     * @return void
     */
    public function updateAction($id) {

        $email = filter_input(INPUT_POST, 'email');
        $name = filter_input(INPUT_POST, 'name');
        $role = filter_input(INPUT_POST, 'role');
        $status = filter_input(INPUT_POST, 'status');

        if(empty($email) || empty($name) || empty($role) || empty($status)) {
            $this->addError('Tous les champs doivent etre remplis !');
        }

        if($status !== '0' && $status !== '1') {
            $this->addError("Le statut n'est pas correct");
        }

        if($this->hasErrors()) {
            $this->redirect('appusers-add');
        }

        $appUsersToEdit = AppUser::find($id);
        
        // On modifie le teacher à éditer
        $appUsersToEdit->setEmail($email);
        $appUsersToEdit->setName($name);
        $appUsersToEdit->setRole($role);
        $appUsersToEdit->setStatus($status);

        $appUsersToEdit->save();

        $this->redirect('appusers-list');

    }

    /**
     * Traitement des données du formulaire d'ajout
     *
     * @return void
     */
    public function createAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $name = filter_input(INPUT_POST, 'name');
        $password = filter_input(INPUT_POST, 'password');
        $role = filter_input(INPUT_POST, 'role');
        $status = filter_input(INPUT_POST, 'status');

        if($email === false) {
            $this->addError('Vous devez entrer un email correct');
        }

        if(empty($email) || empty($name) || empty($password) || empty($role) || empty($status)) {
            $this->addError('Tous les champs doivent etre remplis !');
        }

        if($role !== 'admin' && $role !== 'user') {
            $this->addError("Le role n'est pas correct !");
        }
        if($status !== '0' && $status !== '1') {
            $this->addError("Le statut n'est pas correct !");
        }

        if($this->hasErrors()) {
            $this->redirect('appusers-add');
        }

        $newUser = new AppUser();

        $newUser->setEmail($email);
        $newUser->setName($name);
        $newUser->setRole($role);
        $newUser->setStatus($status);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $newUser->setPassword($hashedPassword);
        
        if($newUser->save()) {

            $_SESSION['successMessages'][] = "Utilisateur créé";
            $this->redirect('appusers-list');
        }
    }

     /**
     * Méthode de suppression d'un appuser
     *
     * @param int $id
     * @return void
     */
    public function deleteAction($id)
    {
        $appuserToDelete = AppUser::find($id);

        if($appuserToDelete->delete()) {
            $_SESSION['successMessages'][] = "Supression réussie";
            $this->redirect('appusers-list');
        }
    } 
}