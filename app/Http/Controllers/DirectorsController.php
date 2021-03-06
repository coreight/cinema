<?php

namespace App\Http\Controllers;

use App\Model\Directors;
use App\Model\Movies;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DirectorsRequest;
use Illuminate\Support\Facades\DB;

/**
 * Class DirectorsController
 * @package App\Http\Controllers
 */
class DirectorsController extends Controller
{

    /* ##################### METHODES ##################### */


    public function index()
    {
        $datas = [
            'directors' => Directors::all()
        ];

        return view('Directors/index', $datas);
    }

    /**
     * @return mixed
     */
    public function create()
    {
        // On récupère la liste des films
        $movies = new Movies();
        $datas = [
            'movies' => Movies::all()
        ];

        return view('Directors/create', $datas);
    }

    /**
     * @param directorsRequest $request
     * @return mixed
     */
    public function store(DirectorsRequest $request)
    {
        $director = new Directors();
        $director->firstname = $request->firstname;
        $director->lastname = $request->lastname;
        $director->dob = $request->dob;
        $director->note = $request->note;
        $director->biography = $request->biography;

        /* Traitement de l'upload d'image */
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Récupère le nom original du fichier
            $destinationPath = public_path() . '/uploads/actors'; // Indique où stocker le fichier
            $file->move($destinationPath, $filename); // Déplace le fichier
        }
        $director->image = asset("uploads/actors/". $filename);

        $director->save();

        // Traitement des champs de la relations Directors_Movies
        $movies = $request->movies;
        foreach ($movies as $movie) {
            DB::table('directors_movies')
                ->insert([
                    [ 'directors_id' => $director->id, 'movies_id' => $movie]
                ]);
        }

        Session::flash('success', "Le réalisateur $director->firstname $director->lastname a été enregistré");

        return Redirect::route('directors.index');

    }

    /**
     * @return mixed
     */
    public function read($id)
    {
        $datas = [
            'directors' => Directors::find($id)
        ];

        return view('Directors/read', $datas);

    }

    /**
     * @return mixed
     */
    public function update($id)
    {
        return view('Directors/update', ['id' => $id]);

    }

    /**
     * Pour la suppression, il n'y a pas de vue dédiée.
     * On redirige donc vers la page d'accueil.
     * @return mixed
     */
    public function delete($id)
    {
        $director = Directors::find($id);
        $director->delete();
        Session::flash('success', "Le réalisateur $director->firstname $director->lastname a bien été supprimé");
        return Redirect::route('directors.index');
    }

}