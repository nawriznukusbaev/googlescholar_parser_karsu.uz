<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Google statistics</title>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('public/js/app.js') }}" defer></script>
    <style >
        .pad{padding:50px;}
    </style >

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
</head>
    <body>

        <div class="container">
        <div class="row pad" >
            
            <div class="col-12 justify-content-center d-flex align-items-center"><h2>Publication statistics of Karakalpak State University in Google scholar</h2></div>
          
        </div>
            <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Full name</th>
            <th scope="col">Citations</th>
            <th scope="col">h-index</th>
            <th scope="col">i10-index</th>
        
            </tr>
        </thead>
        <tbody>
            @foreach($statistics  as $id => $statistics)
            <tr>
            <th scope="row">{{ $id+1 }}</th>
            <td>{{$statistics->fullname}}</td>
            <td>{{$statistics->citations}}</td>
            <td>{{$statistics->hIndex}}</td>
            <td>{{$statistics->i10Index}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        </div>
     
    </body>
</html>    