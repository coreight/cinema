<?php

namespace App\Http\Controllers;

use App\Model\Movies;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


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
        $datas = [
          'movies' => Movies::find($id)
        ];
        return view('Movies/read', $datas);

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
        $movie = Movies::find($id);
        $movie->delete();
        Session::flash('success', "Le film {$movie->title} a bien été supprimé");
        return Redirect::route('movies.index');

    }

    public function search($lang = "fr", $visibility = 1, $length = 2)
    {
        return view('Movies/search', ['lang' => $lang, 'visibility' => $visibility, 'length' => $length]);
    }
}