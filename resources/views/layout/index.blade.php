<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>

        <link rel="icon" type="image/x-icon" href="/favicon.ico">

        <title>Invoice</title>

        <script type='text/javascript'>
             window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
</head>
<body>
   
<div id="app">
<div class="container">
            <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{config('app.name')}}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{Request::segment(2)=='invoices' && Request::segment(3)=='create' ? 'active' : ''}}"><a href="{{route('invoices.create')}}">Issue <span class="sr-only">(current)</span></a></li>
                <li class="{{Request::segment(2)=='list' ? 'active' : ''}}"><a href="{{route('list')}}">Invoices</a></li>
                <li class="{{Request::segment(2)=='settings' ? 'active' : ''}}"><a href="{{route('settings.create')}}">Settings</a></li>
                <li class="dropdown">
                
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
               
                <a href="{{url('api/print')}}" class="btn btn-success">Print</a>
            </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>

        <div class="row">
            @yield('content')
        </div>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
</body>
</html>