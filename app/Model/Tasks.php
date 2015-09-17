<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * Class Tasks représentant la table tasks
 * @package app\Model
 */
class Tasks extends Model
{
    protected $table = 'tasks';

    public function movies()
    {
        return $this->hasMany('App\Model\Movies');
    }


    public function administrators()
    {
        return $this->hasMany('App\Model\Administrators');
    }


}