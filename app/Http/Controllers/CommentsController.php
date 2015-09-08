<?php

namespace App\Http\Controllers;

use App\Model\Comments;


/**
 * Class CategoriesController
 * @package App\Http\Controllers
 */
class CommentsController extends Controller
{


    /* ##################### METHODES ##################### */


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $datas = [
            'comments' => Comments::all()
        ];

        $comment= new Comments();
        $datas['bestCommenter'] = $comment->bestCommenter();

        return view('Comments/index', $datas);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Comments/create');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function read($id)
    {
        return view('Comments/read', ['id' => $id]);

    }

    /**
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        return view('Comments/update', ['id' => $id]);

    }

    /**
     * Pour la suppression, il n'y a pas de vue dédiée.
     * On redirige donc vers l'index.
     * @return \Illuminate\View\View
     */
    public function delete($id)
    {
        return redirect('/comments', ['id' => $id]);

    }

    public function search()
    {
        return view('Comments/search');
    }
}