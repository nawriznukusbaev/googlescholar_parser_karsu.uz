<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>nawriz</title>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <style >
        .pad{padding:50px;}
    </style >

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/create_form.css') }}" rel="stylesheet">
</head>
    <body>
        
        <div id="login-container">
            <h3>Create Google Scholar user code</h3>
            <hr>
            <div class="container">
            <div class="row">
                <div class="col-12">
                <form action="{{ route("store") }}" method="get">

                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="email-label">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="text" name="user_code" class="form-control" placeholder="Google Scholar user code" aria-label="Email" aria-describedby="email-label">
                    </div>                               
                   
                    </label>

                    <div class="text-center">
                    <button type="submit" class="btn btn-customized">Create</button>
                    </div>

                </form>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>    