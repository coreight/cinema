@extends('layout_logout')

@section('content')

    <div class="page-signup theme-default">

        <!-- Page background -->
        <div id="page-signup-bg">
            <!-- Background overlay -->
            <div class="overlay"></div>
            <!-- Replace this with your bg image -->
        </div>
        <!-- / Page background -->

        <!-- Container -->
        <div class="signup-container">
            <!-- Header -->
            <div class="signup-header">
                <a href="index.html" class="logo">
                    CineApp
                </a> <!-- / .logo -->
                <div class="slogan">
                    For movies lovers.
                </div> <!-- / .slogan -->
            </div>
            <!-- / Header -->

            <!-- Form -->
            <div class="signup-form">
                <form method="post" action="" id="signup-form_id">
                {{ csrf_field() }}
                    <div class="signup-text">
                        <span>Créer un compte</span>
                    </div>

                    <div class="form-group w-icon">
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control input-lg" placeholder="Nom">
                        <span class="fa fa-user signup-form-icon"></span>
                        @if ($errors->has('name'))
                            <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

                    <div class="form-group w-icon">
                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control input-lg" placeholder="Email">
                        <span class="fa fa-envelope signup-form-icon"></span>
                        @if ($errors->has('email'))
                            <p class="help-block text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="form-group w-icon">
                        <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control input-lg" placeholder="Mot de passe">
                        <span class="fa fa-lock signup-form-icon"></span>
                        @if ($errors->has('password'))
                            <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <div class="form-group w-icon">
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" id="password_confirmation" class="form-control input-lg" placeholder="Confirmation de mot de passe">
                        <span class="fa fa-lock signup-form-icon"></span>
                        @if ($errors->has('password'))
                            <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <br>
                    <div class="signup-text">
                        <span>Facultatif</span>
                    </div>

                    <div class="form-group w-icon">
                        <input type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" class="form-control input-lg" placeholder="Prénom">
                        <span class="fa fa-user signup-form-icon"></span>
                        @if ($errors->has('firstname'))
                            <p class="help-block text-danger">{{ $errors->first('firstname') }}</p>
                        @endif
                    </div>

                    <div class="form-group w-icon">
                        <input type="text" name="description" id="register-description" value="{{ old('description') }}" class="form-control input-lg" placeholder="Description">
                        <span class="fa fa-pencil signup-form-icon"></span>
                        @if ($errors->has('description'))
                            <p class="help-block text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div id="register-limit-label" class="limiter-label">Caractères restants : <span class="limiter-count"></span></div>
                    <br>

                    <div class="form-group w-icon">
                        <input type="text" name="photo" id="photo" value="{{ old('photo') }}" class="form-control input-lg" placeholder="Photo de profil">
                        <span class="fa fa-picture-o signup-form-icon"></span>
                        @if ($errors->has('photo'))
                            <p class="help-block text-danger">{{ $errors->first('photo') }}</p>
                        @endif
                    </div>

                    <div class="form-actions">
                        <input type="submit" value="S'inscrire" class="signup-btn bg-primary">
                    </div>
                </form>
                <!-- / Form -->

                <!-- "Sign In with" block -->
                <div class="signup-with">
                    <!-- Facebook -->
                    <a href="index.html" class="signup-with-btn" style="background:#4f6faa;background:rgba(79, 111, 170, .8);">S'inscrire avec <span>Facebook</span></a>
                </div>
                <!-- / "Sign In with" block -->
            </div>
            <!-- Right side -->
        </div>

        <div class="have-account">
            Vous êtes déjà inscrit ? <a href="{{ url('auth/login') }}">Connectez-vous</a>
        </div>

</div>
@endsection
