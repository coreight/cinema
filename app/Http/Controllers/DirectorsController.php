<?php

namespace App\Http\Controllers;


/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class DirectorsController extends Controller
{



    /* ##################### METHODES ##################### */


    public function index()
    {
        return view('Actors/index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('Actors/create');
    }

    /**
     * @return mixed
     */
    public function read($id)
    {
        echo $id;
        return view('Actors/read', ['id' => $id]);

    }

    /**
     * @return mixed
     */
    public function update($id)
    {
        return view('Actors/update', ['id' => $id]);

    }

    /**
     * Pour la suppression, il n'y a pas de vue dédiée.
     * On redirige donc vers la page d'accueil.
     * @return mixed
     */
    public function delete($id)
    {
        return redirect('/directors', ['id' => $id]);

    }

}