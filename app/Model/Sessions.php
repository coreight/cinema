<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


/**
 * Class Sessions représentant la table sessions
 * @package app\Model
 */
class Sessions extends Model
{
    protected $table = 'sessions';


    /* METHODES */


    public function scopeNextSessions($query)
    {
        $current = Carbon::now();
        return $query->where('date_session', '>', $current);
    }

}