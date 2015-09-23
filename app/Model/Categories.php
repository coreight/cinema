<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Categories représentant la table categories
 * @package app\Model
 */
class Categories extends Model
{
    protected $table = 'categories';

    /**
     * Relation avec la classe Movies
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function movies()
    {
        return $this->hasMany('App\Model\Movies');
    }

    /**
     * Retourne la liste complète des catégories
     * @return mixed
     */
    public function categories()
    {
//        return $categories = DB::table('categories')->get();
            return Categories::all();
    }

    /**
     * Retourne la ou les catégorie(s) ayant le plus de films
     * @return mixed
     */
    public function popular($limit = 1)
    {
        $popular = DB::select('
              SELECT categories.title as title, COUNT( categories_id ) as nb_films
              FROM  `movies`
              LEFT JOIN categories ON movies.categories_id = categories.id
              GROUP BY categories_id
              ORDER BY COUNT( categories_id ) DESC
              LIMIT '.$limit);
        return $popular;

    }

    /**
     * Retourne les budgets par mois de la catégorie passée en paramètre
     */
    public function budgetsByCategorie($category)
    {
        return DB::table('movies')
            ->select(DB::raw('SUM(budget) AS budget'),
                DB::raw('DATE_FORMAT( date_release,  "%M" ) AS mois'),
                DB::raw('DATE_FORMAT( date_release,  "%m" ) AS numMois'))
            ->where('categories_id', '=', $category)
            ->groupBy('mois')
            ->get();
    }



    /**
     * Retourne la catégorie ayant le plus gros budget
     * @return mixed
     */
    public function bigBudget()
    {
        $bigBudget = DB::select('
            SELECT SUM( budget ) AS budget, categories.title AS title
            FROM  `movies`
            LEFT JOIN categories ON movies.categories_id = categories.id
            GROUP BY categories_id
            ORDER BY  `movies`.`categories_id` ASC
            LIMIT 1');
        return $bigBudget;
    }

    public function noMovies()
{
    $noMovies = DB::select('
            SELECT COUNT(categories.title) as nb_noMovies, movies.categories_id
            FROM  `categories`
            LEFT JOIN movies ON movies.categories_id = categories.id
            WHERE movies.categories_id IS NULL');

    return $noMovies;
}

    /**
     * Compte le nombre de film par catégorie, envoyée en paramètre
     * @param $category
     * @return mixed
     */
    public function moviesByCategorie($category)
    {
        return Movies::where('categories_id', $category)->count();
    }

    /**
     * Retourne le nombre de films pour chaque catégorie
     * @return mixed
     */
    public function moviesByCategories()
    {
        return DB::table('movies')
                    ->select(DB::raw('count(movies.id ) AS nb'), 'categories.title AS title', 'categories.id AS id')
                    ->join('categories', 'categories.id', '=', 'movies.categories_id')
                    ->groupBy('categories_id')
                    ->orderBy('nb', 'DESC')
                    ->get();
    }

    /**
     * Catégories de films de l'acteur passé en paramètre
     * @param array $actor
     * @return mixed
     */
    public function categoriesByActor($actor = [2,3])
    {
        return DB::table('movies')
                    ->select(DB::raw('count( categories_id ) AS nb'), 'categories.id AS id', 'categories.title AS title')
                    ->join('categories', 'categories.id', '=', 'movies.categories_id')
                    ->join('actors_movies', 'actors_movies.movies_id', '=', 'movies.id')
                    ->join('actors', 'actors.id', '=', 'actors_movies.actors_id')
                    ->whereIn('actors.id', $actor)
                    ->groupBy('categories_id')
                    ->get();
    }

    public function categorieByActor($categorie, $actor)
    {
        return DB::table('movies')
            ->select(DB::raw('count( categories_id ) AS nb'), 'categories.id AS catId',  'categories.title AS title')
            ->join('categories', 'categories.id', '=', 'movies.categories_id')
            ->join('actors_movies', 'actors_movies.movies_id', '=', 'movies.id')
            ->join('actors', 'actors.id', '=', 'actors_movies.actors_id')
            ->where('categories.id', $categorie)
            ->where('actors.id', $actor)
            ->groupBy('categories_id')
            ->get();
    }





}