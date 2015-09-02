<?php

namespace App\Http\Controllers;

use App\Model\Categories;

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
        $datas = [
            'categories' => Categories::all()
        ];

        return view('Categories/index', $datas);
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