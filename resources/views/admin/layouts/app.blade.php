<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-default navbar-fixed-top" style="border:none;margin:0;background:#282B30;">
                <div class="container-fluid">
                    <div class="navbar-header">
    
                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
    
                        <!-- Branding Image -->
                        <a style="color:#66EB9A;" class="navbar-brand" href="{{ url('/admin') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
    
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @guest
                                <li><a href="{{ route('login') }}">Connexion</a></li>
                                <li><a href="{{ route('register') }}">Inscription</a></li>
                            @else
                            <li>
                                <a href="/" target="_blank">Ma boutique</a>
                            </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
    
                                    <ul class="dropdown-menu">
                                        
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Déconnexion
                                            </a>
    
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                               
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @auth 

       <main>
        <div id="panel-left">
           
            <div class="bootstrap-vertical-nav">

                <button id="panel-toggler" class="btn btn-primary hidden-md-up" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <span class="">Menu</span>
                </button>

                <div class="collapse" id="collapseExample">
                    <ul class="nav flex-column" id="exCollapsingNavbar3">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/categories">Catégories</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="/admin/products">Produits</a>
                          </li>
                    </ul>
                </div>

            </div>
         </div>
         @endauth
         <div class="admin-content" >
             @yield('content')
         </div>
       </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
