<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use App\Model\Movies;
use App\Model\Actors;
use App\Model\Directors;
use App\Model\Comments;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests\MoviesQuickRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent;


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
        $actors = new Actors();
        $directors = new Directors();

        $datas = [
            'categories' => $categories->categories(),
            'actors' => $actors->actors(),
            'directors' => $directors->directors()
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

        // Traitement des champs de la relations Actors_Movies
        $actors = $request->actors;
        if (isset($actors)) {
            foreach ($actors as $actor) {
                DB::table('actors_movies')
                    ->insert([
                        ['movies_id' => $movie->id, 'actors_id' => $actor]
                    ]);
            }
        }

        // Traitement des champs de la relations Directors_Movies
        $directors = $request->directors;
        if (isset($directors)) {
            foreach ($directors as $director) {
                DB::table('directors_movies')
                    ->insert([
                        ['movies_id' => $movie->id, 'directors_id' => $director]
                    ]);
            }
        }
        Session::flash('success', "Le film $movie->title a été enregistré");

        return Redirect::route('movies.index');

    }

    public function quickStore(MoviesQuickRequest $request)
    {
        $movie = new Movies();
        $movie->title = $request->title;
        $movie->categories_id = $request->categories_id;
        $movie->synopsis = $request->synopsis;

        $movie->save();

        Session::flash('success', "Le film $movie->title a été enregistré");

        return Redirect::route('dashboard');

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
     * Méthode de renvoi vers les différents méthodes selon l'actoin choisie par l'utilisateur
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function action(Request $request) {

        if ($request->action == "Supprimer") {

            return $this->delete($request->id);

        } else if ($request->action == "Visible") {

            return $this->visible($request->id);

        } else {

            return $this->invisible($request->id);
        }
    }

    /**
     * Suppression d'un ou plusieurs films
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        // Cas où il y a plusieurs films à supprimer
        if(is_array($id)) {

            foreach($id as $idMovie) {
                DB::table('movies')->where('id', $idMovie)->delete();
            }
            Session::flash('success', "Suppression effectuée");

        // Cas d'un seul film à supprimer
        } else {

            $movie = Movies::find($id);
            $movie->delete();
            Session::flash('success', "Le film {$movie->title} a bien été supprimé");
        }

//     Pour la suppression, il n'y a pas de vue dédiée.
//     On redirige donc vers la page d'accueil.
        return Redirect::route('movies.index');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function forceDelete($id)
    {
        // Cas où il y a plusieurs films à supprimer
        if(is_array($id)) {

            foreach($id as $idMovie) {
                DB::table('movies')->where('id', $idMovie)->forceDelete();
            }
            Session::flash('success', "Suppression définitive effectuée");

            // Cas d'un seul film à supprimer
        } else {
            $movie = Movies::withTrashed()->find($id);

            Movies::withTrashed()
                ->where('id', $id)
                ->forceDelete();

            Session::flash('success', "Le film {$movie->title} a bien été supprimé définitivement");
        }

//     Pour la suppression, il n'y a pas de vue dédiée.
//     On redirige donc vers la page d'accueil.
        return Redirect::route('movies.trash');
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function trash(Request $request) {


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
            'movies' => Movies::onlyTrashed()->get()
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
     * @param $id
     * @return mixed
     */
    public function restore($id)
    {
        Movies::withTrashed()
            ->where('id', $id)
            ->restore();
        $movie = Movies::find($id);

        Session::flash('success', "Le film $movie->title a été restauré");
        return Redirect::route('movies.trash');

    }

    /**
     * @param $id
     */
    public function visible($id)
    {
        foreach($id as $idMovie) {
           DB::table('movies')->where('id', $idMovie)->update(['visible' => 1]);
        }
        Session::flash('success', "Les films ont été noté comme visibles");
        return Redirect::route('movies.index');

    }

    /**
     * @param $id
     */
    public function invisible($id)
    {
        foreach($id as $idMovie) {
            DB::table('movies')->where('id', $idMovie)->update(['visible' => 0]);
           }
        Session::flash('success', "Les films ont été noté comme invisibles");
        return Redirect::route('movies.index');

    }


    public function comment(Request $request, $id)
    {
        Comments::create([
           'content' => $request->input('content'),
            'movies_id' => $id,
            'created_at' => new \DateTime('now'),
            'user_id' => 28
        ]);
        Session::flash('success', "Le commentaire a été ajouté");
        return Redirect::route('movies.read', ['id' => $id]);

    }

    /**
     * @param string $lang
     * @param int $visibility
     * @param int $length
     * @return \Illuminate\View\View
     */
    public function search($lang = "fr", $visibility = 1, $length = 2)
    {
        return view('Movies/search', ['lang' => $lang, 'visibility' => $visibility, 'length' => $length]);
    }
}