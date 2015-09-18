<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Actors représentant la table actors
 * @package app\Model
 */
class Comments extends Model
{
    protected $table = 'comments';

    /* Champs qui pourront être modifié en live dans l'application (voir Mass Assignment dans Laravel) */
    protected $fillable = ['content', 'created_at', 'movies_id', 'user_id'];


    /* RELATIONS */

    public function movie()
    {
        return $this->belongsTo('\App\Model\Movies', 'movies_id');
    }

    public function user()
    {
        return $this->belongsTo('\App\Model\Users');
    }

    /* METHODES */

    /**
     * Retourne l'utilisateur ayant le plus  commenté
     * @return mixed
     */
    public function bestCommenter()
    {
        $bestCommenter = DB::select('
            SELECT user.username, COUNT( user_id ) AS nb_comments
            FROM  `comments`
            LEFT JOIN user ON user.id = comments.user_id
            GROUP BY user_id
            ORDER BY COUNT( user_id ) DESC
            LIMIT 1');

        return $bestCommenter;
    }

    /*
     * Scope retournant les commentaires correspondants à un statut particulier
     * @param $statut
     * @return mixed
     */
    public function scopeStatutComments($query, $statut)
    {
        return $query->where('state', $statut);
    }

    public function nbComments()
    {
        return Comments::all()->count();
    }

    /**
     * Retourne le nombre de commentaires par cinéma
     * @return mixed
     */
    public function commentsByCinema()
    {
        return DB::select('
            SELECT cinema.id, cinema.title, COUNT(cinema_movies.cinemas_id) AS nb
            FROM `cinema_movies`
            LEFT JOIN movies ON movies.id = cinema_movies.movies_id
            LEFT JOIN comments ON comments.movies_id = movies.id
            LEFT JOIN cinema ON cinema.id = cinema_movies.cinemas_id
            GROUP BY (cinema_movies.cinemas_id)
            ORDER BY COUNT(cinema_movies.cinemas_id) DESC');
    }

    /**
     * Retourne le nombre de commentaires par film
     * @return mixed
     */
    public function commentsByMovie($cinema)
    {
        return DB::select('
            SELECT movies.title, COUNT( comments.movies_id ) AS nb
            FROM  `comments`
            LEFT JOIN movies ON movies.id = comments.movies_id
            LEFT JOIN cinema_movies ON cinema_movies.movies_id = movies.id
            WHERE cinema_movies.cinemas_id ='. $cinema .'
            GROUP BY comments.movies_id
            ORDER BY nb DESC ');
    }






}