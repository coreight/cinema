<?php

namespace App\Http\Controllers;


/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CategoriesController extends Controller
{


    /* ##################### METHODES ##################### */


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('Categories/index');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Categories/create');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function read($id)
    {
        return view('Categories/read', ['id' => $id]);

    }

    /**
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        return view('Categories/update', ['id' => $id]);

    }

    /**
     * Pour la suppression, il n'y a pas de vue dédiée.
     * On redirige donc vers l'index.
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        return redirect('/categories', ['id' => $id]);

    }

    public function search()
    {
        return view('Categories/search');
    }
}