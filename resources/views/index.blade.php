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
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>{{$statistics->getNbCitations()}}</td>
            <td>{{$statistics->getHIndex()}}</td>
            <td>{{$statistics->Geti10Index()}}</td>
            
            
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>Mark</td>
            
            
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>Mark</td>
            <td>Otto</td>
            
            </tr>

        </tbody>
        </table>
        </div>
     
    </body>
</html>    