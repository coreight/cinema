<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



/**
 * Class Movies représentant la table movies
 * @package app\Model
 */
class Movies extends Model
{
    protected $table = 'movies';

    /* Champs qui pourront être modifié en live dans l'application (voir Mass Assignment dans Laravel) */
    protected $fillable = ['visible'];



    /* RELATIONS */

    public function comments()
    {
        return $this->hasMany('App\Model\Comments');
    }

    public function actors()
    {
        return $this->hasMany('App\Model\Actors');
    }

    /**
     * Retourne la catégorie à laquelle appartient un objet film
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie()
    {
        return $this->belongsTo('App\Model\Categories');
    }


    /* METHODES */

    /**
     * Retourne la liste de tous les films
     * @return mixed
     */
    public function movies()
    {
        return $movies = DB::table('movies')->get();
    }


    public function dbSearch($bo, $visible) {


        if ($bo == NULL) {
            $bo = ['vf', 'vostfr', 'vost', 'vo', NULL];
        }
        if ($visible == NULL) {
            $visible = array(0,1);
        }

        // Requête pour renvoyer les données demandées
        $movies = DB::table('movies')
            ->whereIn('bo', $bo)
            ->whereIn('visible', $visible)
            ->get();

        return $movies;
    }

    public function nbTotal()
    {

        $nbTotal = DB::table('movies')
            ->count();

        return $nbTotal;
    }

    public function enAvant()
    {

        $moviesEnAvant = DB::table('movies')
            ->where('cover', 1)
            ->count();

        return $moviesEnAvant;
    }

    public function aVenir()
    {
        $moviesEnAvant = DB::table('movies')
            ->where('date_release', '>', new \DateTime())
            ->count();

        return $moviesEnAvant;
    }

    public function invisible()
    {
        $invisible = DB::table('movies')
            ->where('visible', 0)
            ->count();

        return $invisible;
    }

    public function budgetTotal()
    {
        $budgetTotal = DB::table('movies')
            ->where('date_release', 'like', '2015%')
            ->sum('budget');

        return $budgetTotal;
    }





}