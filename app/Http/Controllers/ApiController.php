<?php

namespace App\Http\Controllers;

use App\Model\Actors;
use App\Model\Categories;
use App\Model\Directors;
use App\Model\Sessions;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{

    public function getBestDirectors()
    {
        $directors = Directors::all();
        return response()->json($directors);
        // Le retour en JSON va permettre de récupérer directement les données pour une utilisation en jquery avec getJSON

    }

    public function getNbMoviesByCategorie()
    {
        $category = new Categories();
        $nbMoviesByCategorie = $category->moviesByCategories();

        return response()->json($nbMoviesByCategorie);
    }

    public function getCategoriesBestActors()
    {
        $actor = new Actors();
        $category = new Categories();

        // On récupère les 5 "meilleurs" acteurs, et on pousse leur ids dans un tableau
        $bestActors = $actor->bestActors();
        $actorsIds = [];
        foreach ($bestActors as $bestActor) {
            array_push($actorsIds, $bestActor->id);
        }

        // On récupère les catégories des films de chaque acteur
            $categories = $category->categoriesByActor($actorsIds);


        // On récupère pour chacun de ces catégories les chiffres par acteur
        $series = [];
        $cat = [];
        $array = [];

        foreach ($categories as $categorie) {
//            dump($categorie);
            array_push($cat, $categorie->title);

            $data = [];

            foreach ($bestActors as $bestActor) {

                $categorieByActor = $category->categorieByActor($categorie->id, $bestActor->id);
//                dump($categorieByActor);

                if (count($categorieByActor) == 0) {
                    $categorieNbByActor = 0;
                } else {
                    $categorieNbByActor = intval($categorieByActor[0]->nb);
                }

                array_push($data, $categorieNbByActor);
            }
            array_push($array, $data);
//            dump($array);

        }
        array_push($series, $array);
//        dump($series);

        return array('series' => $series, 'categories' => $cat);


    }

    public function getNbSessionsByMonth()
    {
        $session = new Sessions();
        $nbSessionsByMonth = $session->sessionsByMonth();

        return response()->json($nbSessionsByMonth);

    }



}