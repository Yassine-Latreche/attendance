<!DOCTYPE html>
<html>
    <head>
        <title>Login - {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/projectstyle.css">
    </head>
    <body>
        <form class="login-form" action="./" method="POST">
            <div class="login-form__logo-container">
                <img class="login-form__logo" src="https://via.placeholder.com/350x150" alt="Logo">
            </div>
            <div class="login-form__content">
                <div class="login-form__header">Login to your account</div>
                <div class="col s12 m6 offset-m3 center-align">
                    <a class="oauth-container btn darken-4 white black-text" href="{{ url('auth/google') }}" style="text-transform:none">
                        <div class="left">
                            <img width="20px" style="margin-top:7px; margin-right:8px" alt="Google sign-in" 
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                        </div>
                        Login with Google
                    </a>
                </div>
            </div>
            
                <!-- Compiled and minified CSS -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
                
                <!-- Compiled and minified JavaScript -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        </form>
    </body>
</html>
