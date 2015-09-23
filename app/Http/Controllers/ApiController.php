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
        $actorsNames = [];
        foreach ($bestActors as $bestActor) {
            array_push($actorsIds, $bestActor->id);
            array_push($actorsNames, $bestActor->fullname);
        }

        // On récupère les catégories des films de chaque acteur
            $categories = $category->categoriesByActor($actorsIds);


        // On récupère pour chacun de ces catégories les chiffres par acteur
        $series = [];
        $cat = [];
        $array = [];

        foreach ($categories as $categorie) {

            array_push($cat, $categorie->title);

            $data = [];

            foreach ($bestActors as $bestActor) {

                $categorieByActor = $category->categorieByActor($categorie->id, $bestActor->id);


                if (count($categorieByActor) == 0) {
                    $categorieNbByActor = 0;
                } else {
                    $categorieNbByActor = intval($categorieByActor[0]->nb);
                }

                array_push($data, $categorieNbByActor);
            }
            array_push($array, $data);


        }
        array_push($series, $array);

        return array('series' => $series, 'categories' => $cat, 'actors' => $actorsNames);


    }

    public function getNbSessionsByMonth()
    {
        $session = new Sessions();
        $nbSessionsByMonth = $session->sessionsByMonth();

        return response()->json($nbSessionsByMonth);

    }

    public function getBudgetBestCategories()
    {
        // Récupération des 4 "meilleurs" catégories (= ayant le plus de films)
        $category = new Categories();
        $bestCategories = array_slice($category->moviesByCategories(),0, 4);

        foreach ($bestCategories as $bestCategorie) {
            $budgetsByCategorie =  $category->budgetsByCategorie($bestCategorie->id);

            // Initialisation d'un tableau vide formaté
            for ($i = 1; $i <= 12; $i++) {
                $data[$bestCategorie->title][$i] = 0;
            }

            foreach ($budgetsByCategorie as $budgetsByMonth) {

                      $data[$bestCategorie->title][intval($budgetsByMonth->numMois)] = intval($budgetsByMonth->budget);
            }

        }

        return $data;

    }






}