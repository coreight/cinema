<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Actors représentant la table actors
 * @package app\Model
 */
class Actors extends Model
{
    protected $table = 'actors';

    public function movies()
    {
        return $this->hasMany('App\Model\Movies');
    }

    /**
     * Retourne la liste complète des acteurs
     * @return mixed
     */
    public function actors()
    {
        return $actors = DB::table('actors')->orderBy('firstname')->get();
    }

    /**
     * Calcul de l'âge moyen des acteurs
     * @return float
     */
    public function actorsAge()
    {
        // Récupération des dates de naissance
        $dob = DB::table('actors')->select('id', 'dob')->get();

        $now = new \DateTime('NOW');

        // Calcul de l'age de chaque acteur
        foreach ($dob as $d)
        {
            $datetime = new \DateTime($d->dob);
            $diff = $now->diff($datetime);
            $array[$d->id] = $diff->format('%y');
        };

        return $array;
    }


    public function actorsOrigin()
    {
        $cities = DB::select('SELECT city, COUNT(city) AS nb FROM actors GROUP BY city');
        foreach ($cities as $city)
        {
            $array[$city->city] = $city->nb;
        }
        return $array;
    }

    /**
     * Retourne les 5 "meilleurs" acteurs, c'est à dire ceux ayant le plus de films
     * @return mixed
     */
    public function bestActors()
    {
        return DB::table('actors_movies')
                ->select(DB::raw('count(movies_id ) AS nb'),'actors.id',
                        DB::raw('CONCAT( actors.firstname,  " ", actors.lastname ) AS fullname'))
                ->join('actors', 'actors.id', '=', 'actors_movies.actors_id')
                ->groupBy('actors_id')
                ->orderBy('nb', 'desc')
                ->take(5)
                ->get();


    }


}