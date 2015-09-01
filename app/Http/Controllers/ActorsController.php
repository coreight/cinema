<?php

namespace App\Http\Controllers;

use App\Model\Actors;


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