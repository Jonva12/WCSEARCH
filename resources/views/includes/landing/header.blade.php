 <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container-fluid">
          <img src="img/logo.png" alt="WCSearch" id="icon" class="rounded float-left">
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">WCSearch</a>
        </div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">@lang('landing.title1')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">@lang('landing.opinions')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#we">@lang('landing.aboutus')</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">@lang('landing.contact')</a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="register"><a href="/register"><i class="fas fa-pencil-alt" id="logicon"></i>  @lang('landing.signup') </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li id="login"><a href="/login"><i class="fas fa-sign-in-alt" id="logicon"></i>  @lang('landing.login') </a> </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
           <li class="nav-item">
                <a class="nav-link" href="{{ route('change_lang', ['lang' => 'es']) }}">ES </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('change_lang', ['lang' => 'en']) }}">EN</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <header class="masthead text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-7 mx-auto">
              <img class="img-fluid" id="header" src="img/iphone2.png" alt="WCSearch" >
          </div>
          <div class="col-lg-5 mx-auto"><hr>
            <h1 id="welcome"><strong>@lang('landing.title')</strong></h1>
            <br/>
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="/register">@lang('landing.register')</a><br/>
            <a class="badge badge-success" href="/home">@lang('landing.map')</a>
          </div>
        </div>
      </div>
    </header>
