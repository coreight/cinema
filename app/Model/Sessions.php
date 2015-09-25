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


    /* RELATIONS */

    public function movies()
    {
        return $this->belongsTo('App\Model\Movies');
    }

    public function cinema()
    {
        return $this->belongsTo('App\Model\Cinemas');
    }


    /* METHODES */

    /**
     * Retourn les prochaines séances
     * @param $query
     * @return mixed
     */
    public function scopeNextSessions($query)
    {
        $current = Carbon::now();
        return $query->where('date_session', '>', $current)->orderBy('date_session');
    }

    public function sessionsByMonth()
    {
        return DB::table('sessions')
                    ->select(DB::raw('DATE_FORMAT( date_session,  "%M" ) AS mois'),
                            DB::raw('COUNT( DATE_FORMAT( date_session,  "%M" )) AS nb'))
                    ->groupBy(DB::raw('DATE_FORMAT( date_session,  "%m" )'))
                    ->orderBy(DB::raw('DATE_FORMAT( date_session,  "%m" )'))
                    ->get();
    }


}