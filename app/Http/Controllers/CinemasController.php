<?php

namespace App\Http\Controllers;

use App\Model\Cinemas;
use App\Model\Movies;

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
        $movies = new Movies();
        $datas = [
            'cinemas' => Cinemas::all(),
            'movies' => $movies->movies(),
        ];

        return view('Cinemas/index', $datas);       }

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