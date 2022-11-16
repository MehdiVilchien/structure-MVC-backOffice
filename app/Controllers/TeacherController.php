<?php

namespace App\Controllers;

use App\Models\Teacher;

class TeacherController extends CoreController
{
    /**
     * Méthode s'occupant de la liste des students
     *
     * @return void
     */
    public function listAction()
    {
        $teachers = Teacher::findAll();
     
        $this->show('teachers/list', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Méthode permettant d'afficher le formulaire de création d'un student
     *
     * @return void
     */
    public function addAction()
    {
        $this->show('teachers/add');
    }

    /**
     * Méthode appelée par le formulaire de création d'un teacher
     */
    public function createAction()
    {
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $job = filter_input(INPUT_POST, 'job');
        $status = filter_input(INPUT_POST, 'status');

        $newTeacher = new Teacher();

        $newTeacher->setFirstname($firstname);
        $newTeacher->setLastname($lastname);
        $newTeacher->setJob($job);
        $newTeacher->setStatus($status);
        
        $newTeacher->save();

        $this->redirect('teachers-list');
    }

    /**
     * Affiche la page d'édition d'un teacher
     *
     * @param int $id
     * @return void
     */
    public function editAction($id)
    {
        $teachers = Teacher::find($id);
        
        $this->show('teachers/edit', [
            'teachers' => $teachers
        ]);
    }


    /**
     * Méthode qui permet de traiter les infos envoyées par le formulaire d'édition
     *
     * @param int $id
     * @return void
     */
    public function updateAction($id) {

        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $job = filter_input(INPUT_POST, 'job');
        $status = filter_input(INPUT_POST, 'status');

        if(empty($firstname) || empty($lastname) || empty($job) || empty($status)) {
            $this->addError('Tous les champs doivent etre remplis !');
        }

        if($status !== '0' && $status !== '1') {
            $this->addError("Le statut n'est pas correct");
        }

        if($this->hasErrors()) {
            $this->redirect('teachers-add');
        }

        $teachersToEdit = Teacher::find($id);
        
        // On modifie le teacher à éditer
        $teachersToEdit->setFirstname($firstname);
        $teachersToEdit->setLastname($lastname);
        $teachersToEdit->setJob($job);
        $teachersToEdit->setStatus($status);

        $teachersToEdit->save();

        $this->redirect('teachers-list');

    }

    /**
     * Méthode de suppression d'un teacher
     *
     * @param int $id
     * @return void
     */
    public function deleteAction($id)
    {
        $teachersToDelete = Teacher::find($id);

        if($teachersToDelete->delete()) {
    
            $this->redirect('teachers-list');
        }
    } 
}                                           
