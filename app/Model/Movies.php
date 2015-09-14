<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;



/**
 * Class Movies représentant la table movies
 * @package app\Model
 */
class Movies extends Model
{

    /*Trait*/

    /**
     * Les films ne seront pas supprimés définitivement, mais mis à la corbeille
     */
    use SoftDeletes;

    protected $table = 'movies';

    /* Champs qui pourront être modifié en live dans l'application (voir Mass Assignment dans Laravel) */
    protected $fillable = ['visible'];

    protected $dates = ['deleted_at'];



    /* ##################### RELATIONS ##################### */

    public function comments()
    {
        return $this->hasMany('App\Model\Comments');
    }

    public function actors()
    {
        return $this->hasMany('App\Model\Actors');
    }

    public function sessions()
    {
        return $this->hasMany('App\Model\Sessions');
    }

     /* ##################### METHODES ##################### */

    /**
     * Retourne la liste de tous les films
     * @return mixed
     */
    public function movies()
    {
        return $movies = DB::table('movies')
            ->where('deleted_at', NULL)
            ->get();
    }

    /**
     * Retourne la liste des films d'un cinéma donné
     * @param $cinema
     * @return mixed
     */

    /*
    public function moviesInCinema($cinema)
    {
        return $movies = DB::select('
        SELECT movies.id, movies.title
        FROM cinema_movies
        LEFT JOIN movies ON movies.id = cinema_movies.movies_id
        WHERE cinema_movies.cinemas_id =12');
    }
*/

    /**
     * Retourne la catégorie à laquelle appartient un objet film
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorie()
    {
        return $this->belongsTo('App\Model\Categories');
    }


    /**
     * Méthode de recherche avancée
     * @param $bo
     * @param $visible
     * @return mixed
     */
    public function dbSearch($bo, $visible) {


        if ($bo == NULL) {
            $bo = ['vf', 'vostfr', 'vost', 'vo', NULL];
        }
        if ($visible == NULL) {
            $visible = array(0,1);
        }

        // Requête pour renvoyer les données demandées
        $movies = DB::table('movies')
            ->where('deleted_at', NULL)
            ->whereIn('bo', $bo)
            ->whereIn('visible', $visible)
            ->get();

        return $movies;
    }

    public function nbTotal()
    {

        $nbTotal = DB::table('movies')
            ->where('deleted_at', NULL)
            ->count();

        return $nbTotal;
    }

    public function enAvant()
    {

        $moviesEnAvant = DB::table('movies')
            ->where('deleted_at', NULL)
            ->where('cover', 1)
            ->count();

        return $moviesEnAvant;
    }

    public function aVenir()
    {
        $moviesEnAvant = DB::table('movies')
            ->where('date_release', '>', new \DateTime())
            ->where('deleted_at', NULL)
            ->count();

        return $moviesEnAvant;
    }

    public function invisible()
    {
        $invisible = DB::table('movies')
            ->where('visible', 0)
            ->where('deleted_at', NULL)
            ->count();

        return $invisible;
    }

    public function visible()
    {
        $visible = DB::table('movies')
            ->where('visible', 1)
            ->where('deleted_at', NULL)
            ->count();

        return $visible;
    }

    public function budgetTotal()
    {
        $budgetTotal = DB::table('movies')
            ->where('date_release', 'like', '2015%')
            ->where('deleted_at', NULL)
            ->sum('budget');

        return $budgetTotal;
    }


    public function favMovies()
    {
        $fav = DB::select('SELECT COUNT( DISTINCT movies_id ) AS fav FROM  user_favoris');
        return intval($fav[0]->fav);
    }


}