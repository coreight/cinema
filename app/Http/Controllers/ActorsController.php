<?php

namespace App\Http\Controllers;

use App\Model\Actors;
use App\Model\Movies;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ActorsRequest;
use Illuminate\Support\Facades\DB;


/**
 * Class ActorsController
 * @package App\Http\Controllers
 */
class ActorsController extends Controller
{


    /* ##################### METHODES ##################### */


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $datas = [
            'actors' => Actors::all()
        ];

        return view('Actors/index', $datas);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // On récupère la liste des films
        $movies = new Movies();
        $datas = [
            'movies' => Movies::all()
        ];

        return view('Actors/create', $datas);
    }

    /**
     * ActorsRequest est une classe de validation de formulaire
     * Elle est liée à la requête, c'est une classe FormRequest.
     * Laravel valide le fomulaire et fait une redirection vers create() en cas d'erreurs
     * Sinon il entre dans l'action store()
     * @param ActorsRequest $request
     */
    public function store(ActorsRequest $request)
    {
        // Traitement des champs de l'objet Acteur
        $actor = new Actors();
        $actor->firstname = $request->firstname;
        $actor->lastname = $request->lastname;
        $actor->dob = $request->dob;
        $actor->nationality = $request->nationality;
        $actor->roles = $request->roles;
        $actor->recompenses = $request->recompenses;
        $actor->biography = $request->biography;

        /* Traitement de l'upload d'image */
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Récupère le nom original du fichier
            $destinationPath = public_path() . '/uploads/actors'; // Indique où stocker le fichier
            $file->move($destinationPath, $filename); // Déplace le fichier
        }
        $actor->image = asset("uploads/actors/". $filename);
        $actor->save();

        // Traitement des champs de la relations Actors_Movies
        $movies = $request->movies;
        foreach ($movies as $movie) {
            DB::table('actors_movies')
                ->insert([
                    [ 'actors_id' => $actor->id, 'movies_id' => $movie]
                ]);
        }


        // Redirection avec affichage d'un message flash en cas de succès
        Session::flash('success', "L'acteur $actor->firstname $actor->lastname a été enregistré");
        return Redirect::route('actors.index');

    }

    /**
     * @return \Illuminate\View\View
     */
    public function read($id)
    {
        $datas = [
            'actors' => Actors::find($id)
        ];

        return view('Actors/read', $datas);

    }

    /**
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        return view('Actors/update', ['id' => $id]);

    }

    /**
     * Pour la suppression, il n'y a pas de vue dédiée.
     * On redirige donc vers la page d'accueil.
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        $actor = Actors::find($id);
        $actor->delete();
        Session::flash('success', "L'acteur {$actor->firstname} {$actor->lastname} a bien été supprimé");
        return Redirect::route('actors.index');
    }
}