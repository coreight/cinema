<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Cinemas représentant la table cinemas
 * @package app\Model
 */
class Cinemas extends Model
{
    protected $table = 'cinema';

    /* RELATIONS */

    public function movies()
    {
        return $this->hasMany('App\Model\Movies');
    }

    /* METHODES */

    public function cinemas()
    {
        return $cinemas = DB::table('cinema')->get();
    }
}