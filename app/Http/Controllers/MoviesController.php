<?php

namespace App\Http\Controllers;


/**
 * Class ActorsController
 * @package App\Http\Controllers
 */
class MoviesController extends Controller
{


    /* ##################### METHODES ##################### */


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Movies/index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Movies/create');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function read($id)
    {
        return view('Movies/read', ['id' => $id]);

    }

    /**
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        return view('Movies/update', ['id' => $id]);

    }

    /**
     * Pour la suppression, il n'y a pas de vue dédiée.
     * On redirige donc vers la page d'accueil.
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        return redirect('/movies', ['id' => $id]);

    }
}