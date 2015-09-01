<?php

namespace App\Http\Controllers;

use App\Model\Movies;


/**
 * Class MoviesController
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
        $datas = [
            'movies' => Movies::all()
        ];



        return view('Movies/index', $datas);    }

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

    public function search($lang = "fr", $visibility = 1, $length = 2)
    {
        return view('Movies/search', ['lang' => $lang, 'visibility' => $visibility, 'length' => $length]);
    }
}