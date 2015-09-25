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
            $budgetsByCategorie =  $category->budgetsByCategorie($bestCategorie->id)->get();

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

    public function getBudgetByCategories()
    {
        $category = new Categories();

        //Récupération de la liste complète des catégories
        $allCategories = $category->categories();

        $data2000 = $data2010 = $data2015 = $categories = [];

        foreach ($allCategories as $allCategory) {

            array_push($categories, $allCategory->title);

            $budgets2000ByCategorie = Categories::interval('>=', "2000", '<', '2010')->budgetsByCategorie($allCategory->id)->get();
            $budgets2010ByCategorie = Categories::interval('>=', '2010', '<', '2015')->budgetsByCategorie($allCategory->id)->get()->toArray();
            $budgets2015ByCategorie = Categories::interval('>=', "2015", '<', '2020')->budgetsByCategorie($allCategory->id)->get()->toArray();

            // Enregistrement de tous les budgets dans un tableau simple pour le traitement en graphique
            if (count($budgets2000ByCategorie) == 0) {
                $d2000 = 0;
            } else {
                $d2000 = intval($budgets2000ByCategorie[0]["budget"]);
            }
            array_push($data2000, $d2000);

            if (count($budgets2010ByCategorie) == 0) {
                $d2010 = 0;
            } else {
                $d2010 = intval($budgets2010ByCategorie[0]["budget"]);
            }
            array_push($data2010, $d2010);

            if (count($budgets2015ByCategorie) == 0) {
                $d2015 = 0;
            } else {
                $d2015 = intval($budgets2015ByCategorie[0]["budget"]);
            }
            array_push($data2015, $d2015);
        }
        return [$data2000, $data2010, $data2015, $categories];
    }






}