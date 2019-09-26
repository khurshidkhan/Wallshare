<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>wallshare</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-grid.min.css')}}">
</head>

<body>
    <div class="jumbotron text-center">
    <h2>Your awesome Image sharing website</h2>
    @if (Session::has('errors'))
    <h3 class="error">{{$errors->first()}}</h3>
    @endif

    @if (Session::has('error'))
    <h3 class="error">{{$errors->first()}}</h3>
    @endif

    @if (Session::has('success'))
    <h3 class="success">{{Session::get('success')}}</h3>
    @endif
</div>
    @yield('content')

</body>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
</html>