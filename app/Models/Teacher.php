<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Teacher extends CoreModel
{

    private $firstname;
    private $lastname;
    private $job;
    private $status;
   
    //! -------------------- METHODES -------------------- //
    
    /**
     * Méthode permettant de récupérer un enregistrement de la table Teacher en fonction d'un id donné
     *
     * @param int $teacherId ID de teacher
     * @return Teacher
     */
    public static function find($teacherId)
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `teacher` WHERE `id` =' . $teacherId;

        $pdoStatement = $pdo->query($sql);

        $teacher = $pdoStatement->fetchObject(self::class);

        return $teacher;
    }

    /**
     * Méthode permettant de récupérer tous les enregistrements de la table teacher
     *
     * @return Teacher[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `teacher`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }

    /**
     * Méthode permettant d'ajouter un enregistrement dans la table teacher
     *
     * @return bool
     */
    public function insert()
    {
        $pdo = Database::getPDO();

        $sql = "INSERT INTO `teacher` (`firstname`, `lastname`, `job`, `status` )
        VALUES (:firstname, :lastname, :job, :status)
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':firstname', $this->firstname);
        $query->bindValue(':lastname', $this->lastname);
        $query->bindValue(':job', $this->job);
        $query->bindValue(':status', $this->status);

        $insertedRows = $query->execute();

        if ($insertedRows) {
            $this->id = $pdo->lastInsertId();
            return true;
        }
        return false;
    }

    /**
     * Méthode permettant de mettre à jour un enregistrement dans la table teacher
     *
     * @return bool
     */
    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "
            UPDATE `teacher`
            SET
                firstname = :firstname,
                lastname = :lastname,
                job = :job,
                status = :status,
                updated_at = NOW()
            WHERE id = :id
        ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $query->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $query->bindValue(':job', $this->job, PDO::PARAM_STR);
        $query->bindValue(':status', $this->status, PDO::PARAM_INT);
        $query->bindValue(':id', $this->id, PDO::PARAM_INT);

        $updatedRows = $query->execute();
        return ($updatedRows);
    }

    /**
     * Méthode supprimant l'objet courant de la BDD
     *
     * @return void
     */
    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "DELETE FROM `teacher`
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
     * Get the value of job
     */ 
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set the value of job
     *
     * @return  self
     */ 
    public function setJob($job)
    {
        $this->job = $job;

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
}
