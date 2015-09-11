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


}