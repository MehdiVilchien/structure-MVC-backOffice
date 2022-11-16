<?php

namespace App\Models;

abstract class CoreModel
{
    
    protected $id;
    protected $created_at;
    protected $updated_at;

    //! -------------------- METHODES -------------------- //

    /**
     * La méthode save permet d'avoir une méthode unique de sauvegarde de nos objets dans la BDD
     * @return void
     */
    public function save()
    {
        if(isset($this->id)){
           return  $this->update();
        }
        else {
            return $this->insert();
        }
    }

    // Ici on obligé tous les models à avoir les méthodes
    abstract public function insert();
    abstract public static function findAll();
    abstract public static function find($id);
    abstract public function update();
    abstract public function delete();

    //! -------------------- GETTERS AND SETTERS -------------------- //

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of created_at
     *
     * @return  string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     *
     * @return  string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }
}
