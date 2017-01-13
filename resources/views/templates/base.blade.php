<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/master.css">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Application</a>
    </div>
            @if(Auth::check())
            <p> {{ Auth::user()->email }}</p>
            @endif

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
          &nbsp;
      </ul>
      <ul class="nav navbar-nav">

        <li><a href="/">Home</a></li>
        @if(Auth::check())
        <li><a href="{{ url('/livres') }}">Livres </a></li>
        <li><a href="{{ url('/livre/new') }}">Ajouter un livre</a></li>
        @endif

      </ul>
      <ul class="nav navbar-nav navbar-right">

        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Register</a></li>
        @else
            <li >
                <a href="#"  role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul >
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif

        </ul>
			</div>
      </ul>
    </div>
  </div>
</nav>

</body>
<div class="container">@yield('content')</div>
<footer>
  <p>Copyright : ITAkademy 2017</p>
  <a href="contact">Nous contacter</a>
</footer>
</html>
