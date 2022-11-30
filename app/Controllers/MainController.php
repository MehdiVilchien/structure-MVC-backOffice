<?php

namespace App\Controllers;

class MainController extends CoreController
{
    /**
     * Méthode s'occupant de la page d'accueil
     *
     * @return void
     */
    public function home()
    {
        $this->show('main/home');
    }

    /**
     * Méthode s'occupant de la page cv
     *
     * @return void
     */
    public function cv()
    {
        $this->show('main/cv');
    }

     /**
     * Méthode s'occupant de la page projet
     *
     * @return void
     */
    public function projet()
    {
        $this->show('main/projet');
    }
}
