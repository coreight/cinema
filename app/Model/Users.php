<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


/**
 * Class Users représentant la table user
 * @package app\Model
 */
class Users extends Model
{
    protected $table = 'user';

    /**
     * @return mixed
     */
    public function recentUsers($jours)
    {
        $now = new Carbon('NOW');
        $date = $now->subDays($jours);

        return Users::where('lastActivity', '>' , $date)->orderBy('lastActivity','DESC')->get();

    }


}


