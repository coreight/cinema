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
        return $categories = DB::table('categories')->get();
    }


    public function popular()
    {
        $popular = DB::select('
              SELECT categories.title as title, COUNT( categories_id ) as nb_films
              FROM  `movies`
              LEFT JOIN categories ON movies.categories_id = categories.id
              GROUP BY categories_id
              ORDER BY COUNT( categories_id ) DESC
              LIMIT 1');
        return $popular;

    }

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



}