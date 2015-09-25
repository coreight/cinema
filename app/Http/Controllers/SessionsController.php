<?php

namespace App\Http\Controllers;

use App\Model\Sessions;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\SessionsRequest;


/**
 * Class SessionsController
 * @package App\Http\Controllers
 */
class SessionsController extends Controller
{

    /**
     * @return \Illuminate\View\View
     */
    public function store(SessionsRequest $request)
    {
        $session = new Sessions();
        $session->movies_id = $request->movies_id;
        $session->cinema_id = $request->cinema_id;
        $session->date_session = $request->date_session.' '.$request->time_session;

        $session->save();


        Session::flash('success', "La séance a été enregistrée");

        return Redirect::route('cinemas.index');
    }

}