<?php

namespace App\Http\Controllers;

use App\Model\Movies;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


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
    public function index(Request $request)
    {

        // Récupèration des valeurs du formulaire
        $boAll = $request->input('boAll');
        $visible = $request->input('visibility');

        if ($boAll['0'] == "tous") {
            $bo = "";
        } else {
            $bo = $request->input('bo');
        }

        // Utilisation de la méthode de recherche de la classe Movies
        $datas = [
            'movies' => Movies::dbSearch($bo, $visible)
        ];

        $datas['nbTotal'] = Movies::nbTotal();
        $datas['enAvant'] = Movies::enAvant();
        $datas['aVenir'] = Movies::aVenir();
        $datas['invisible'] = Movies::invisible();
        $datas['budgetTotal'] = Movies::budgetTotal();

        // Envoi du tableau à la vue
        return view('Movies/index', $datas);

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
        $datas = [
          'movies' => Movies::find($id)
        ];
        return view('Movies/read', $datas);

    }

    /**
     * @return \Illuminate\View\View
     */
    public function update($id, $field, $value)
    {
        $movie = Movies::find($id);
        $movie->update([$field => $value]);
        Session::flash('success', "Le film {$movie->title} a bien été mis à jour");
        return Redirect::route('movies.index');
    }

    /**
     * Pour la suppression, il n'y a pas de vue dédiée.
     * On redirige donc vers la page d'accueil.
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        if(is_array($id)){

        } else {

            $movie = Movies::find($id);
            $movie->delete();
        }
        Session::flash('success', "Le film {$movie->title} a bien été supprimé");
        return Redirect::route('movies.index');

    }

    public function search($lang = "fr", $visibility = 1, $length = 2)
    {
        return view('Movies/search', ['lang' => $lang, 'visibility' => $visibility, 'length' => $length]);
    }
}