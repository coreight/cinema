@extends('layout_logout')

@section('content')


    <div class="theme-default page-signin">
        <!-- Page background -->
        <div id="page-signin-bg">
            <!-- Background overlay -->
            <div class="overlay"></div>
            <!-- Replace this with your bg image -->
            <img src="assets/demo/signin-bg-1.jpg" alt="">
        </div>
        <!-- / Page background -->

        <!-- Container -->
        <div class="signin-container">

            <!-- Left side -->
            <div class="signin-info">
                <a href="index.html" class="logo">
                    CineApp
                </a> <!-- / .logo -->
                <div class="slogan">
                    For movies lovers
                </div> <!-- / .slogan -->
                <ul>
                    <li><i class="fa fa-heart signin-icon"></i> Vos films préférés</li>
                    <li><i class="fa fa-file-text-o signin-icon"></i> Tous les acteurs et réalisateurs</li>
                    <li><i class="fa fa-heart signin-icon"></i> Les prochaines séances près de chez vous</li>
                </ul> <!-- / Info list -->
            </div>
            <!-- / Left side -->

            <!-- Right side -->


            <div class="signin-form">

                <!-- Form -->
                <form method="post" action="" id="signin-form_id">
                    {{ csrf_field() }}

                    <div class="signin-text">
                        <span>Connectez-vous à votre compte</span>
                    </div> <!-- / .signin-text -->

                    <div class="form-group w-icon">
                        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email">
                        <span class="fa fa-user signin-form-icon"></span>
                    </div> <!-- / Username -->

                    <div class="form-group w-icon">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe">
                        <span class="fa fa-lock signin-form-icon"></span>
                    </div> <!-- / Password -->

                    <div class="form-group">
                        <input type="checkbox" name="remember" id="remember" class="form-control">
                        <label for="remember">Se souvenir de moi</label>
                    </div>


                    <div class="form-actions">
                        <input type="submit" value="Se connecter" class="signin-btn bg-primary">
                        <a href="#" class="forgot-password" id="forgot-password-link">Mot de passe oublié ?</a>
                    </div> <!-- / .form-actions -->
                </form>
                <!-- / Form -->


                <!-- Password reset form -->
                <div class="password-reset-form" id="password-reset-form">
                    <div class="header">
                        <div class="signin-text">
                            <span>Password reset</span>
                            <div class="close">&times;</div>
                        </div> <!-- / .signin-text -->
                    </div> <!-- / .header -->

                    <!-- Form -->
                    <form action="index.html" id="password-reset-form_id">
                        <div class="form-group w-icon">
                            <input type="text" name="password_reset_email" id="p_email_id" class="form-control input-lg" placeholder="Enter your email">
                            <span class="fa fa-envelope signin-form-icon"></span>
                        </div> <!-- / Email -->

                        <div class="form-actions">
                            <input type="submit" value="SEND PASSWORD RESET LINK" class="signin-btn bg-primary">
                        </div> <!-- / .form-actions -->
                    </form>
                    <!-- / Form -->
                </div>
                <!-- / Password reset form -->
            </div>
        </div>
        <div class="not-a-member">
            Pas encore membre ? <a href="{{ url('auth/register') }}">Inscrivez-vous</a>
        </div>
    </div>



@endsection
