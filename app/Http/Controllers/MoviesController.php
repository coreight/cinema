<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use App\Model\Movies;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\MoviesRequest;


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
        $movies = new Movies();

        // Utilisation de la méthode de recherche de la classe Movies
        $datas = [
            'movies' => $movies->dbSearch($bo, $visible)
        ];

        $datas['nbTotal'] = $movies->nbTotal();
        $datas['enAvant'] = $movies->enAvant();
        $datas['aVenir'] = $movies->aVenir();
        $datas['invisible'] = $movies->invisible();
        $datas['budgetTotal'] = $movies->budgetTotal();

        // Envoi du tableau à la vue
        return view('Movies/index', $datas);

    }


    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = new Categories();
        $datas = [
            'categories' => $categories->categories()
        ];

        return view('Movies/create', $datas);
    }

    /**
     * @param MoviesRequest $request
     * @return mixed
     */
    public function store(MoviesRequest $request)
    {
        $movie = new Movies();
        $movie->type = $request->type;
        $movie->title = $request->title;
        $movie->synopsis = $request->synopsis;
        $movie->description = $request->description;
        $movie->trailer = $request->trailer;
        $movie->categories_id = $request->categories_id;
        $movie->languages = $request->lang;
        $movie->distributeur = $request->distributeur;
        $movie->bo = $request->bo;
        $movie->annee = $request->annee;
        $movie->budget = $request->budget;
        $movie->duree = $request->duree;
        $movie->date_release = $request->date_release;
        $movie->note_presse = $request->note_presse;
        $movie->visible = $request->visible;
        $movie->cover = $request->cover;


        /* Traitement de l'upload d'image */
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Récupère le nom original du fichier
            $destinationPath = public_path() . '/uploads/movies'; // Indique où stocker le fichier
            $file->move($destinationPath, $filename); // Déplace le fichier
        }
        $movie->image = asset("uploads/movies/". $filename);

        $movie->save();

        Session::flash('success', "Le film $movie->title a été enregistré");

        return Redirect::route('movies.index');

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
        dump($id);


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