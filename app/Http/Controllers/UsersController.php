<?php

namespace App\Http\Controllers;


/**
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{


    /* ##################### METHODES ##################### */


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Users/index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Users/create');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function read($id)
    {
        return view('Users/read', ['id' => $id]);

    }

    /**
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        return view('Users/update', ['id' => $id]);

    }

    /**
     * Pour la suppression, il n'y a pas de vue dédiée.
     * On redirige donc vers la page d'accueil.
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        return redirect('/users', ['id' => $id]);

    }

    public function search($zipcode = "69001", $city = "Lyon", $enable = 1)
    {
        return view('Users/search', [
            'zipcode' => $zipcode,
            'city' => $city,
            'enable' => $enable]);
    }

}