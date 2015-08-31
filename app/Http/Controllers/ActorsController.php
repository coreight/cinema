<?php

namespace App\Http\Controllers;


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
            'acteurs' => [
                ["lastname" => "Brando", "firstname" => "Marlon", "age" => 70],
                ["lastname" => "De Niro", "firstname" => "Robert", "age" => 60],
                ["lastname" => "Pacino", "firstname" => "Al", "age" => 55]
            ],
            'title' => "Liste des acteurs",
            'firstnames' => ["Marlon", "Robert", "Al", "John", "Bruce", "Samuel"],
            'ages' => [70, 60, 55, 45, 45, 42],
            'villes' =>
                ['newYork' =>  ["Marlon", "Robert", "Al"],
                'vegas' => ["John", "Bruce", "Samuel"]]

        ];



        return view('Actors/index', $datas);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Actors/create');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function read($id)
    {
        return view('Actors/read', ['id' => $id]);

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
        return redirect('/actors', ['id' => $id]);

    }
}