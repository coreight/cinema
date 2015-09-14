<?php

namespace App\Http\Controllers;

use App\Model\Actors;
use App\Model\Comments;
use App\Model\Movies;
use App\Model\Categories;
use App\Model\Sessions;
use Illuminate\Database\Eloquent\Model;


/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{

    public function dashboard()
    {
        $actor = new Actors();
        $movie = new Movies();
        $categorie = new Categories();
        $session = new Sessions();

        $nbComments = Comments::count();
        $nbCommentsActifs = Comments::statutComments(2)->count();
        $nbMovies = Movies::count();
        $nbFavMovies = $movie->favMovies();
        $nbVisibleMovies = $movie->visible();

        $datas = [
            'dob' => $actor->actorsAge(),
            'city' => $actor->actorsorigin(),
            'nbComments' => $nbComments,
            'nbCommentsActifs' => $nbCommentsActifs,
            'nbCommentsValidation' => Comments::statutComments(1)->count(),
            'nbCommentsInactifs' => Comments::statutComments(0)->count(),
            'tauxCommentsActifs' => round($nbCommentsActifs / $nbComments * 100),
            'tauxFilmsFavoris' => round($nbFavMovies/ $nbMovies * 100),
            'tauxFilmsVisible' => round($nbVisibleMovies/ $nbMovies * 100),
            'categories' => $categorie->categories(),
            'nbSessions' => $session->nextSessions()->count(),
            'nextSessions' => $session->nextSessions()->get(),

        ];

        return view('welcome', $datas);

    }


}