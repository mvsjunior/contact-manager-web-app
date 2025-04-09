<?php $contatos = [];?>
<html>
    <head>
        <title>Contact Management {{ isset($pageTitle) ? ' - ' . $pageTitle :  ''}}</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class='container-fluid py-2'>
        <header class='row'>
            <div class="col-12 mb-4">
                <nav class="navbar bg-body-tertiary fixed-top" style='border-bottom: solid 1px rgba(0,0,0,.2); box-shadow: rgba(0,0,0,.2) 2px 2px 10px'>
                    <div class="container">
                        <a class="navbar-brand" href="#"><i class="fa fa-address-book" aria-hidden="true"></i> <b>Contact Management</b></a>

                        <div>
                            @if(auth()->check())
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{auth()->user()->name}}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li class='dropdown-item'><a  class='small btn' href="{{route('login.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> logout</a></li>
                                    </ul>
                                </div>
                            @else
                                <a  class='small' href="{{route('login.logout')}}">Login</a>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <main class='row py-4'>
            <div class="col-12 py-4">

                <div class="container">
                    <h1 class='my-4'>{{$pageTitle ?? 'Contacts'}}</h1>
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>