<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* Détermine les utilisateurs qui ont acc_s aux méthodes du contrôleur, avec des exceptions */
        $this->middleware('guest', ['except' => ['getLogout','update','store']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:administrators',
            'password' => 'required|confirmed|min:6',
            'firstname' => 'min:2|max:255',
            'description' => 'min:10|max:160',
            'photo' => array(
                'url',
                'regex:/.jpg$|.gif$|.jpeg$|.png$/')
        ], [
            'required' => 'Ce champ doit être renseigné',
            'min' => 'Ce champ doit faire plus de :min caractères',
            'max' => 'Ce champ doit faire moins de :max caractères',
            'confirmed' => 'La confirmation ne correspond pas au mot de passe',
            'unique' => 'Cette adresse email est déjà utilisée',
            'url' => 'Ce champ doit être une URL valide',
            'regex' => 'Ce champ doit être une image valide'

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'firstname' => $data['firstname'],
            'photo' => $data['photo'],
            'description' => $data['description'],
        ]);
    }

    public function getLogin()
    {
        return view('Auth/login');
    }

    public function getRegister()
    {
        return view('Auth/register');
    }

    public function update()
    {
        return view('Auth/update');
    }

    public function store(Request $request)
    {
        $request->user()->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'firstname' => $request['firstname'],
            'photo' => $request['photo'],
            'description' => $request['description'],
        ]);
        Session::flash('success', "Votre profil a bien été modifié");
        return Redirect::route('movies.index');

    }

    /**
     * Handle an authentication attempt.
     * Surchage de la méthode authenticate par défaut de Laravel
     *
     * @return Response
     */
//    public function authenticate()
//    {
//        if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
//            // Authentication passed...
//            return redirect()->intended('dashboard');
//
//        }
//    }

    /*
     * Redirections (surcharge des valeurs par défaut de Laravel)
     */
    protected $loginPath = '/auth/login';
    protected $redirectPath = '/admin/';
    protected $redirectAfterLogout = '/auth/login/';
    protected $redirectTo = '/admin/login';


}
