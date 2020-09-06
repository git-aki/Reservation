<!DOCTYPE html>

<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atlantis</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:300,400,700|Rubik:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/styles-merged.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <!-- START: header -->

  <header role="banner" class="probootstrap-header">
    <div class="container">
      <div class="row justify-content-md-center">
        <a href="index.html" class="probootstrap-logo visible-xs"><img src="{{ asset('img/logo_sm.png') }}" class="hires" width="120" height="33" alt="Free Bootstrap Template by uicookies.com"></a>
        
        <a href="#" class="probootstrap-burger-menu visible-xs"><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
          <ul class="probootstrap-main-nav">
            <li @if(strstr($_SERVER['REQUEST_URI'],'index')==true) class="active" @endif ><a href="{{ route('index') }}">Main</a></li>
            <li @if(strstr($_SERVER['REQUEST_URI'],'reservation')==true) class="active" @endif ><a href="{{ route('reservation') }}">reservation</a></li>
            <li @if(strstr($_SERVER['REQUEST_URI'],'contact')==true) class="active" @endif ><a href="{{ route('contact') }}">Contact</a></li>
            <li class="hidden-xs probootstrap-logo-center"><a href="{{ route('index') }}"><img src="{{ asset('img/logo_md.png') }}" class="hires" width="181" height="50" alt="Free Bootstrap Template by uicookies.com"></a></li>
            @if (Route::has('login'))
              @auth
                <li @if(strstr($_SERVER['REQUEST_URI'],'home')==true) class="active" @endif ><a href="{{ route('home') }}">HOME</a></li>
                <li @if(strstr($_SERVER['REQUEST_URI'],'setting')==true) class="active" @endif ><a href="{{ route('setting') }}">Content</a></li>
                <li>
                  <form id="logout-form" class="d-inline for xs" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  </form>
                </li>
                &emsp;
              @else
                <li @if(strstr($_SERVER['REQUEST_URI'],'login')==true) class="active" @endif ><a href="{{ route('login') }}">Login</a></li>

                @if (Route::has('register'))
                  <li @if(strstr($_SERVER['REQUEST_URI'],'register')==true) class="active" @endif ><a href="{{ route('register') }}">Register</a></li>
                @endif
                &emsp; &emsp; &emsp; &emsp; &emsp;
              @endauth
            @endif
          </ul>
          <div class="extra-text visible-xs">
            <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
            <h5>Connect With Us</h5>
            <ul class="social-buttons">
              <li><a href="#"><i class="icon-twitter"></i></a></li>
              <li><a href="#"><i class="icon-facebook2"></i></a></li>
              <li><a href="#"><i class="icon-instagram2"></i></a></li>
            </ul>
          </div>
        </nav>
        </div>
    </div>
  </header>
  <!-- END: header -->

  @yield('content')

  <!-- START: footer -->
  <footer role="contentinfo" class="probootstrap-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="probootstrap-footer-widget">
            <p class="mt40"><img src="{{ asset('img/logo_sm.png') }}" class="hires" width="120" height="33" alt="Free HTML5 Bootstrap Template by uicookies.com"></p>
            <p>普段の生活とは離れてゆっくりとしたひと時を</p>
            <p><a href="#" class="link-with-icon">Learn More <i class=" icon-chevron-right"></i></a></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="probootstrap-footer-widget">
            <h3>Contact</h3>
            <ul class="probootstrap-contact-info">
              <li><i class="icon-location2"></i> <span>##県 ##市 ##町 #-#-#</span></li>
              <li><i class="icon-mail"></i><span>######@######.com</span></li>
              <li><i class="icon-phone2"></i><span>####-##-####</span></li>
            </ul>
            
          </div>
        </div>
      </div>
      <div class="row mt40">
        <div class="col-md-12 text-center">
          <ul class="probootstrap-footer-social">
            <li><a href=""><i class="icon-twitter"></i></a></li>
            <li><a href=""><i class="icon-facebook"></i></a></li>
            <li><a href=""><i class="icon-instagram2"></i></a></li>
          </ul>
          <p>
            <small>&copy; 2017 <a href="https://uicookies.com/" target="_blank">uiCookies:Atlantis</a>. All Rights Reserved. <br> Designed &amp; Developed by <a href="https://uicookies.com/" target="_blank">uicookies.com</a> Demo Images: Unsplash.com &amp; Pexels.com</small>
          </p>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- END: footer -->

  <script src="{{ asset('js/scripts.min.js') }}"></script>
  <script src="{{ asset('js/main.min.js') }}"></script>
  <script src="{{ asset('js/custom.js') }}"></script>


  </body>
</html>