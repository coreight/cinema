<?php

namespace App\Http\Controllers;


/**
 * Class CinemasController
 * @package App\Http\Controllers
 */
class CinemasController extends Controller
{


    /* ##################### METHODES ##################### */


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Cinemas/index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Cinemas/create');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function read($id)
    {
        return view('Cinemas/read', ['id' => $id]);

    }

    /**
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        return view('Cinemas/update', ['id' => $id]);

    }

    /**
     * Pour la suppression, il n'y a pas de vue dédiée.
     * On redirige donc vers l'index.
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        return redirect('/cinemas', ['id' => $id]);

    }

    public function search()
    {
        return view('Cinemas/search');
    }
}