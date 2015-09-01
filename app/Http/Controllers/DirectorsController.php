<?php

namespace App\Http\Controllers;

use App\Model\Directors;

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
        echo $id;
        return view('Directors/read', ['id' => $id]);

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
        return redirect('/directors', ['id' => $id]);

    }

}