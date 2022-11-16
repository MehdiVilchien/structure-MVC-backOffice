<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

/**
 * Students hérite de CoreModel
 */
class Student extends CoreModel
{
    private $firstname;
    private $lastname;
    private $status;
    private $teacherId;

    //! -------------------- METHODES -------------------- //
    
    /**
     * Méthode permettant de récupérer un enregistrement de la table Students en fonction d'un id donné
     *
     * @param int $studentId ID de students
     * @return Student
     */
    public static function find($studentId)
    {
        $pdo = Database::getPDO();

        $sql = '
            SELECT *
            FROM `student`
            WHERE id = ' . $studentId;

        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchObject(self::class);

        return $result;
    }

    /**
     * Méthode permettant de récupérer tous les enregistrements de la table student
     *
     * @return Students[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `student`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $results;
    }

    /**
     * Méthode permettant d'ajouter un enregistrement dans la table student
     *
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `student` 
            (
            `firstname`, 
            `lastname`, 
            `status`,
            `teacher_id`
            )
        VALUES (
            :firstname, 
            :lastname, 
            :status,
            :teacher_id
            )
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':firstname', $this->firstname);
        $query->bindValue(':lastname', $this->lastname);
        $query->bindValue(':status', $this->status);
        $query->bindValue(':teacher_id', $this->teacherId);

        $insertedRows = $query->execute();

        if ($insertedRows > 0) {
            $this->id = $pdo->lastInsertId();
            return true;
        }
        return false;
    }

    /**
     * Méthode sauvegardant les modifications d'un student dans la BDD
     *
     * @return void
     */
    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "
            UPDATE `student`
            SET
                firstname = :firstname,
                lastname = :lastname,
                status = :status,
                teacher_id = :teacher_id,
                updated_at = NOW()
            WHERE id = :id
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':firstname', $this->firstname);
        $pdoStatement->bindValue(':lastname', $this->lastname);
        $pdoStatement->bindValue(':status', $this->status);
        $pdoStatement->bindValue(':teacher_id', $this->teacherId);

        $success = $pdoStatement->execute();

        return $success;
    }

    /**
     * Méthode supprimant l'objet courant de la BDD
     *
     * @return void
     */
    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "DELETE FROM `student`
        WHERE `id` = :id";

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $pdoStatement->execute();
    }

    //! -------------------- GETTERS AND SETTERS -------------------- //

   

    /**
     * Get the value of firstname
     */ 
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */ 
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of teacher_id
     */ 
    public function getTeacherId()
    {
        return $this->teacherId;
    }

    /**
     * Set the value of teacher_id
     *
     * @return  self
     */ 
    public function setTeacherId($teacherId)
    {
        $this->teacherId = $teacherId;

        return $this;
    }
}
