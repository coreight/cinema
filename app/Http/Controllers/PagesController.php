<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{

    /**
     * Affichage de la page de contact
     */
    public function contact()
    {
        return view('Pages/contact');
    }

    /**
     * Affichage de la page de mentions légales
     */
    public function mentions()
    {
        return view('Pages/mentions');

    }

    /**
     * Affichage de la page de foire aux questions
     */
    public function faq()
    {

        // Test Mongo
        $m = new \MongoClient();
        $db = $m->selectDB('Laravel');
        $collection = new \MongoCollection($db, 'unicorns');
        $find = array('name' => 'Horny');
        $result = $collection->find($find);
        foreach ($result as $document) {
            dump($document);
        }


        return view('Pages/faq');

    }

    public function search(Request $request)
    {
        $title = $request->input('title');
        dump($title);
        $lang = $request->input('lang');
        dump($lang);
        $test = $request->input('test');
        dump($test);




        return view('Pages/search');
    }


}