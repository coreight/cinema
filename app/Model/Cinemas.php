<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Cinemas représentant la table cinemas
 * @package app\Model
 */
class Cinemas extends Model
{
    protected $table = 'cinema';

    public function movies()
    {
        return $this->hasMany('App\Model\Movies');
    }
}