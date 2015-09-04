<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



/**
 * Class Movies représentant la table movies
 * @package app\Model
 */
class Movies extends Model
{
    protected $table = 'movies';

    /* Champs qui pourront $erte modifié en live dans l'application (voir Mass Assignment dans Laravel) */
    protected $fillable = ['visible'];

    public static function dbSearch($bo, $visible) {


        if ($bo == NULL) {
            $bo = ['vf', 'vostfr', 'vost', 'vo', NULL];
        }
        if ($visible == NULL) {
            $visible = array(0,1);
        }

        // Requête pour renvoyer les données demandées
        $movies = DB::table('movies')
            ->whereIn('bo', $bo)
            ->whereIn('visible', $visible)
            ->get();

        return $movies;
    }

    public static function nbTotal()
    {

        $nbTotal = DB::table('movies')
            ->count();

        return $nbTotal;
    }

    public static function enAvant()
    {

        $moviesEnAvant = DB::table('movies')
            ->where('cover', 1)
            ->count();

        return $moviesEnAvant;
    }

    public static function aVenir()
    {
        $moviesEnAvant = DB::table('movies')
            ->where('date_release', '>', new \DateTime())
            ->count();

        return $moviesEnAvant;
    }

    public static function invisible()
    {
        $invisible = DB::table('movies')
            ->where('visible', 0)
            ->count();

        return $invisible;
    }

    public static function budgetTotal()
    {
        $budgetTotal = DB::table('movies')
            ->where('date_release', 'like', '2015%')
            ->sum('budget');

        return $budgetTotal;

    }



}