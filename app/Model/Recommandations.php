<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Recommandations représentant la table recommandations
 * @package app\Model
 */
class Recommandations extends Model
{
    protected $table = 'recommandations';

    public function movies()
    {
        return $this->belongsTo('App\Model\Movies');
    }

    public function cinema()
    {
        return $this->belongsTo('App\Model\Cinemas');
    }

    /**
     * Retourne la liste complète des acteurs
     * @return mixed
     */
    public function recommandations()
    {
        return Recommandations::all();
    }

}