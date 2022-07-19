<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
       <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset("style.css")}}">
    <title>
        @yield('title')</title>

</head>

<body>
    <nav id="nav" class="navbar navbar-expand-lg">
      <div class="container-fluid">
          <a class="navbar-brand" href="#">Hello Trello</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              @auth

                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                      <li class="nav-item">
                          <a href="{{ url('/home') }}"
                          class="nav-link active" aria-current="page" >Home</a>
                      </li>

                      <li class="nav-item">
                        <a href="{{ url('/projet') }}"
                        class="nav-link active" aria-current="page" >Projet</a>
                    </li>


                      <li class="nav-item">
                        <a href="{{ url('/profils') }}"
                        class="nav-link active">Profil</a>
                    </li>

                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              Se déconnecter
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>

                      </li>


                    @else
                        <li class="none_li" class="nav-item">
                            <a href="{{ route('login') }}"
                              class="nav-link active">Log in </a>
                        </li>

                    @if (Route::has('register'))
                          <li class="none_li" class="nav-item">
                            <a href="{{ route('register') }}"
                              class="nav-link active">Register</a>
                          </li>
                    @endif


                  @endauth

              </ul>

          </div>
      </div>
  </nav>

    <section>
        @yield('content')
    </section>


  
       <footer id="footer" class="text-center text-white" style="background-color: #9cd3fa;">
        <!-- Copyright -->
        <div class="text-center text-dark p-3" style="background-color: rgba(255, 255, 255, 0.2);">
          © 2022 Copyright
        </div>
        <!-- Copyright -->
      </footer>
</body>

</html>
