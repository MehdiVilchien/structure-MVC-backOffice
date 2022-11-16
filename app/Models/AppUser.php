<?php

namespace App\Models;


use PDO;
use App\Utils\Database;

class AppUser extends CoreModel {


    private $email;
    private $name;
    private $password;
    private $role;
    private $status;

    //! -------------------- METHODES -------------------- //
    
    public function insert()
    {
         $pdo = Database::getPDO();

         $sql = "INSERT INTO `app_user` 
         (`email`, `name`, `password`, `role`, `status`)
         VALUES (:email, :name, :password, :role, :status)
         ";
 
         $pdoStatement = $pdo->prepare($sql);
 
         $pdoStatement->bindValue(':email', $this->email);
         $pdoStatement->bindValue(':name', $this->name);
         $pdoStatement->bindValue(':password', $this->password);
         $pdoStatement->bindValue(':role', $this->role);
         $pdoStatement->bindValue(':status', $this->status);
 
         $success = $pdoStatement->execute();
 
         if ($success) {
             $this->id = $pdo->lastInsertId();
             return true;
         }
         return false;
    }

    /**
     * Méthode récupérant tous les utilisateurs
     *
     * @return AppUser[]
     */
    public static function findAll()
    {
       
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `app_user`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
        
        return $results;
    }

    public static function find($userId)
    {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `app_user` WHERE `id` =' . $userId;

        $pdoStatement = $pdo->query($sql);

        $user = $pdoStatement->fetchObject(self::class);

        return $user;
    }

    public static function findByEmail($email)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `app_user`
        WHERE `email` = :email";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':email', $email);

        $pdoStatement->execute(); 

        $user = $pdoStatement->fetchObject(self::class);

        return $user;
    }

    public function update()
    {
        $pdo = Database::getPDO();

        $sql = "
            UPDATE `app_user`
            SET
                email = :email,
                name = :name,
                role = :role,
                status = :status,
                updated_at = NOW()
            WHERE id = :id
        ";

        $pdoStatement = $pdo->prepare($sql);

        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $pdoStatement->bindValue(':email', $this->email);
        $pdoStatement->bindValue(':name', $this->name);
        $pdoStatement->bindValue(':role', $this->role);
        $pdoStatement->bindValue(':status', $this->status);

        $success = $pdoStatement->execute();

        return $success;
    }

    public function delete()
    {
        $pdo = Database::getPDO();

        $sql = "DELETE FROM `app_user`
        WHERE `id` = :id";

        $pdoStatement = $pdo->prepare($sql);
        $pdoStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $pdoStatement->execute();
    }

    //! -------------------- GETTERS AND SETTERS -------------------- //


    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

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