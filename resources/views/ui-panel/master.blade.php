<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
<link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
<meta name="msapplication-TileColor" content="#603cba">
<meta name="theme-color" content="#ffffff">
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    />
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <!-- FONTAWESOME CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <!--------HEADER SECTION-->
          <div class="header">
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-4">
                <img
                  src="{{asset('images/ppm-large.jpg')}}"
                  id="header-img"
                  alg="My Image"
                />
              </div>
              <div class="col-md-4">
                <p>HELLO!</p>
                <p>IT'S ME</p>
                <p>PYAE PHYO MAUNG</p>
                <p>THE HAPPY CODER</p>
                <a href="{{url('posts')}}">
                  <button class="btn btn-outline-primary">
                    <i class="fas fa-plus-circle"></i> Explore My Blog
                  </button></a
                >
              </div>
              <div class="col-md-2"></div>
            </div>
          </div>

          <!----------NAVBAR SECTION-->
            <div id="navbar">
            <a href="{{url('/')}}">HOME</a>
            <a href="{{url('/posts')}}">BLOGS</a>
            @if(Auth::check())
            <a class="float-right" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                LOGOUT
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            <a href="#" class="float-right">{{strToUpper(Auth::user()->name)}}</a>
            @else
            <a href="{{url('login')}}" class="float-right">LOGIN</a>
            <a href="{{url('register')}}" class="float-right">REGISTER</a>
            @endif
          </div>
           
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
               @yield('main')
              </div>
            </div>
          </div>

          <div class="footer">
            <div class="row">
              <div class="col-md-4 mb-4">
                <h5>ABOUT THIS WEBSITE</h5>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Necessitatibus magnam neque dolore et ea deserunt, aperiam est
                  odio modi! Minus quam velit dignissimos vel molestiae qui!
                  Deleniti facere tempora fuga.
                </p>
              </div>
              <div class="col-md-4 mb-4">
                <h5>CONTACT INFO</h5>
                <p>Phone-09965941179</p>
                <p>Email-kophyo11897.ppm@gmail.com</p>
              </div>
              <div class="col-md-4">
                <h5>FOLLOW ME ON</h5>
                <a href="#"> <i class="fab fa-facebook"></i></a>
                &nbsp; &nbsp; &nbsp;
                <a href="#"> <i class="fab fa-telegram"></i></a>
                &nbsp; &nbsp; &nbsp;
                <a href=""> <i class="fab fa-viber"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-----Bootstrap js and jquery-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="{{asset('js/script.js')}}"></script>
  </body>
</html>
