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


}