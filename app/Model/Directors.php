<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Directors représentant la table directors
 * @package app\Model
 */
class Directors extends Model
{
    protected $table = 'directors';

    /**
     * Retourne la liste complète des réalisateurs
     * @return mixed
     */
    public function directors()
    {
        return $directors = DB::table('directors')->orderBy('firstname')->get();
    }

}