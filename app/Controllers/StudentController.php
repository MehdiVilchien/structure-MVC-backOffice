<?php

namespace App\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Controllers\CoreController;

class StudentController extends CoreController
{
    /**
     * Méthode s'occupant de la liste des students
     *
     * @return void
     */
    public function listAction()
    {
        $students = Student::findAll();
     
        $this->show('students/list', [
            'students' => $students
        ]);
    }

     /**
     * Méthode permettant d'afficher le formulaire de création d'un student
     *
     * @return void
     */
    public function addAction()
    {
        $students = Student::findAll();
        $teachers = Teacher::findAll();
    
        $this->show('students/add', [
            'students' => $students,
            'teachers' => $teachers
        ]);
    }

    /**
     * Méthode appelée par le formulaire de création d'un student
     */
    public function createAction()
    {
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT);
        $teacherId = filter_input(INPUT_POST, 'teacher', FILTER_VALIDATE_INT);

        $newStudent = new Student();

        $newStudent->setFirstname($firstname);
        $newStudent->setLastname($lastname);
        $newStudent->setStatus($status);
        $newStudent->setTeacherId($teacherId);
      
        $newStudent->save();

        $this->redirect('students-list');
    }

       /**
     * Page affichant le formulaire d'édition d'un student
     *
     * @return void
     */
    public function editAction($id)
    {
        $students = Student::findAll();
        $teachers = Teacher::findAll();
     
        $student = Student::find($id);

        $this->show('students/edit', [
            'students' => $students,
            'student' => $student,
            'teachers' => $teachers
        ]);
    }

    public function updateAction($id)
    {
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $status = filter_input(INPUT_POST, 'status', FILTER_VALIDATE_INT);
        $teacherId = filter_input(INPUT_POST, 'teacher', FILTER_VALIDATE_INT);

        $student = Student::find($id);

        $student->setFirstname($firstname);
        $student->setLastname($lastname);
        $student->setStatus($status);
        $student->setTeacherId($teacherId);

        $success = $student->save();

        if($success) {
            $this->redirect('students-list');
        }
    }

     /**
     * Méthode de suppression d'un student
     *
     * @param int $id
     * @return void
     */
    public function deleteAction($id)
    {
        $studentToDelete = Student::find($id);

        if($studentToDelete->delete()) {
    
            $this->redirect('students-list');
        }
    } 
}
