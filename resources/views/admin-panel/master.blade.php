<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favicon/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('favicon/site.webmanifest')}}">
<link rel="mask-icon" href="{{asset('favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
<meta name="msapplication-TileColor" content="#603cba">
<meta name="theme-color" content="#ffffff">
  <!------Chart------->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="{{url('css/style2.css')}}">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<!-- FONTAWESOME CSS & JS-->
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
  
</head>
<body>
  <div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
      <div class="sidebar-header">
      <a href="{{url('admin/dashboard')}}">
      <img src="{{asset('images/ppm-large.jpg')}}" width="30%" height="30%" alt="">
       <h3>Personal Blogs </h3>
      </a> 
      </div>
      <ul class="list-unstyled components">
       
        <li>
          <a href="{{url('admin/dashboard')}}">Home</a>
        </li>
        <li>
          <a href="{{url('admin/users')}}">User</a>
        </li>
        <li>
          <a href="{{url('admin/skills')}}">Skill</a>
        </li>
        <li>
          <a href="{{route('projects.index')}}">Project</a>
        </li>
        <li>
          <a href="{{url('admin/student_counts')}}">Student</a>
        </li>
        <li>
          <a href="{{url('admin/categories')}}">Category</a>
        </li>
        <li>
          <a href="{{url('admin/posts')}}">Post</a>
        </li>
      </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

    <!----Navbar---------------------->
      <nav class="navbar navbar-default sticky-top">
        <div class="container-fluid">

          <div class="navbar-header">
            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
            <i class="fas fa-sliders-h"></i>
                                <span>Toogle sidebar</span>  
                            </button>
          </div>
           <div class="dropdown nav">
                 <a class="dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" >
                  <span>{{strToUpper(Auth::user()->name)}}</span>  
                 </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                 </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                
                </div>
            </div>
                        
        </div>
      </nav> 
      <!-----------Main content------->
      <div class="main">
         @yield("main")
      </div>
      <!-------------------------------------------------------Main End------------------>
    </div>
    <!--------------------------End Content Page Holder----------------->
  </div>
<!-----Bootstrap js and jquery-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
  <!-- Bootstrap Js CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {


      $('#sidebarCollapse').on('click', function() {
        $('#sidebar, #content').toggleClass('active');
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
      });
    });
  </script>
  <script>
    @yield('javascript')
  </script>
</body>

</html>