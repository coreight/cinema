<?php

namespace App\Http\Controllers;

use App\Model\Categories;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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

        if (Gate::denies('superadmin')){
            abort(403);
        }

        $datas = [
            'categories' => Categories::all()
        ];

        $categories = new Categories();
        $datas['popular'] = $categories->popular();
        $datas['bigBudget'] = $categories->bigBudget();
        $datas['noMovies'] = $categories->noMovies();

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
     * @param CategoriesRequest $request
     * @return mixed
     */
    public function store(CategoriesRequest $request)
    {
        $categorie = new Categories();
        $categorie->title = $request->title;
        $categorie->description = $request->description;
        $categorie->slug = $request->slug;
        $categorie->administrators_id = Auth::user()->id;


        /* Traitement de l'upload d'image */
        $filename = "";
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Récupère le nom original du fichier
            $destinationPath = public_path() . '/uploads/categories'; // Indique où stocker le fichier
            $file->move($destinationPath, $filename); // Déplace le fichier
        }
        $categorie->image = asset("uploads/categories/". $filename);

        $categorie->save();

        Session::flash('success', "La catégorie $categorie->title a été enregistrée");

        return Redirect::route('categories.index');

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


        if(is_array($id)){

        } else {

            $categorie = Categories::find($id);
            $categorie->delete();
        }

        return Redirect::route('categories.index');

    }

    public function search()
    {
        return view('Categories/search');
    }
}