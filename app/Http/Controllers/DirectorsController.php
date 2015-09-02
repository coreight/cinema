<?php

namespace App\Http\Controllers;

use App\Model\Directors;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
        return view('Directors/create');
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
        Session::flash('success', "Le réalisateur {$director->firstname} {$director->lastname} a bien été supprimé");
        return Redirect::route('directors.index');
    }

}