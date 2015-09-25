<?php

namespace App\Http\Controllers;

use App\Model\Actors;
use App\Model\Comments;
use App\Model\Directors;
use App\Model\Messages;
use App\Model\Movies;
use App\Model\Categories;
use App\Model\Cinemas;
use App\Model\Users;
use App\Model\Recommandations;
use App\Model\Sessions;
use App\Model\Tasks;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class DashboardController
 * @package App\Http\Controllers
 */
class DashboardController extends Controller
{
    /**
     * Affichage du dashboard
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        // Vérification de l'autorisation de l'administrateur
        if (Gate::denies('notExpired')){
            abort(403);
        }


        $actor = new Actors();
        $movie = new Movies();
        $categorie = new Categories();
        $session = new Sessions();

        $nbComments = Comments::count();
        $nbCommentsActifs = Comments::statutComments(2)->count();
        $nbMovies = Movies::count();
        $nbFavMovies = $movie->favMovies();
        $nbVisibleMovies = $movie->visible();

        // Récupération des prochaines sessions
        $nextSessions = $session->nextSessions()->get();
        $now = Carbon::now();

        // Calcul du délai avant les prochaines séances, et ajout à un tableau
        foreach ($session->nextSessions()->get() as $session) {

            $dateSession = new Carbon($session->date_session);

            $delai = $now->diffInDays($dateSession);

            // Couleur du label associé
            if ($delai < 3) {
                $color = "danger";
            } else if ($delai < 8) {
                $color = "warning";
            } else {
                $color = "success";
            }

            $delaiNextSessions[$session->id] = array('delai' => $delai, 'color' => $color);
        }


        $datas = [
            'dob' => $actor->actorsAge(),
            'city' => $actor->actorsorigin(),
            'nbComments' => $nbComments,
            'nbCommentsActifs' => $nbCommentsActifs,
            'nbCommentsValidation' => Comments::statutComments(1)->count(),
            'nbCommentsInactifs' => Comments::statutComments(0)->count(),
            'tauxCommentsActifs' => round($nbCommentsActifs / $nbComments * 100),
            'tauxFilmsFavoris' => round($nbFavMovies / $nbMovies * 100),
            'tauxFilmsVisible' => round($nbVisibleMovies / $nbMovies * 100),
            'categories' => $categorie->categories(),
            'nbSessions' => $session->nextSessions()->count(),
            'nextSessions' => $nextSessions,
            'delaiNextSessions' => $delaiNextSessions,

        ];

        return view('welcome', $datas);

    }

    /**
     * Dashboard advanced
     * @return \Illuminate\View\View
     */
    public function dashboard2()
    {
        $cinema = new Cinemas();
        $cinemas = $cinema->cinemas();

        $users = new Users();
        // Recupération des utilisateurs s'étant connecté il y a moins de 3 semaines (21 jours)
        $users = $users->recentUsers(21);

        $recommandation = new Recommandations();
        $recommandations = $recommandation->recommandations();

        // Tâches
        $tasks = Tasks::all();

        // Chat, messages stockés en MongoDB



        $messages = Messages::all();

        $datas = [
            'cinemas' => $cinemas,
            'recommandations' => $recommandations,
            'users' => $users,
            'tasks' => $tasks,
            'messages' => $messages
        ];

        return view('/Pages/dashboard2',$datas);

    }

    public function createmessage(Request $request)
    {
        $message = new Messages();
        $message->user = Auth::user()->toArray();
        $message->content = $request->input('content');
        $message->save();

//        return response()->json($message->user['name']);
    }


    public function dashboard3()
    {
        $actor = new Actors();
        $ages = $actor->actorsAge();

        $vingtaine = $trentaine = $quarantaine = $cinquantaine = $soixantaine = 0;

        // Décompte du nombre d'acteurs par tranche d'âge
        foreach ($ages as $age) {
            $age = intval($age);
            if  ($age >= 18 AND $age < 25  ) {
                $vingtaine++;
            } else if ($age >= 25 AND $age < 35  ) {
                $trentaine++;
            } else if ($age >= 35 AND $age < 45  ) {
                $quarantaine++;
            } else if ($age >= 45 AND $age < 60  ) {
                $cinquantaine++;
            }  else if ($age > 60 ) {
                $soixantaine++;
            }
        }
        $tranchesAge = [
            'Entre 18 et 25' => $vingtaine,
            'Entre 25 et 35' => $trentaine,
            'Entre 35 et 45' => $quarantaine,
            'Entre 45 et 60' => $cinquantaine,
            'Plus de 60' => $soixantaine,
        ];
        $nbActors = array_sum($tranchesAge);


        $movies = new Movies();
        // Recherche des meilleurs réalisateurs
        $bestDirectors = $movies->bestDirectors();

        // Recherche des films pour chaque réalisateur
        $array = [];
        for ($i = 2000; $i <= 2015; $i++) {

            foreach ($bestDirectors as $bestDirector) {

                $moviesBestDirector = $movies->moviesBestDirectors($bestDirector, $i);

                foreach ($moviesBestDirector as $movie) {

//                    dump($movie);
                    $count = count($moviesBestDirector);

                    $array[$i][$movie->directors_id ] = $count;
                }

            }
        }

        // Tableau de données
        $datas = [
            'actorsOrigin' => $actor->actorsorigin(),
            'tranchesAge' => $tranchesAge,
            'nbActors' => $nbActors,
            'bestDirectors' => $bestDirectors,
            'moviesBestDirectors' => $array
        ];

        // Renvoi de la vue
        return view('/Pages/dashboard3',$datas);
    }


    public function dashboard4()
    {

        $comments = new Comments();
        $commentsByCinema = $comments->commentsByCinema();
        $nbTotalComments = $comments->nbComments();

        $category = new Categories();
        $categories = $category->categories();

        $nbTotalMovies = Movies::all()->count();

        foreach ($categories as $categorie) {
            $moviesByCategorie[$categorie->title] = $category->moviesByCategorie($categorie->id);
        }

        $datas = [
            'commentsByCinemas' => $commentsByCinema,
            'nbTotalComments' => $nbTotalComments,
            'moviesByCategorie' => $moviesByCategorie,
            'nbTotalMovies' => $nbTotalMovies
        ];

        // Renvoi de la vue
        return view('/Pages/dashboard4',$datas);
    }


}






















