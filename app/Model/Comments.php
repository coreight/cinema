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







}