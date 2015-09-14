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








}