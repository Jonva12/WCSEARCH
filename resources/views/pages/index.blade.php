

  @extends('layout.landing')

  @section('title', 'WCSearch')


  @section('content')
    <section class="bg-success" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">@lang('landing.title1')</h2>
            <hr class="dark my-4">
            <div class="d-flex flex-row justify-content-center">
              <p class="text-white mb-4">@lang('landing.content1')</p>
              <i class="fas fa-map-marker-alt fa-4x mb-3 sr-icon-1" id="localizacion"></i>
            </div>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="/register">@lang('landing.register')</a>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-crosshairs text-white mb-3 sr-icon-1"></i>
              <h3 class="mb-3">@lang('landing.locator')</h3>
              <p class="text-white mb-0">@lang('landing.locatorText')</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-address-card text-white mb-3 sr-icon-2"></i>
              <h3 class="mb-3">@lang('landing.info')</h3>
              <p class="text-white mb-0">@lang('landing.infoText')</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-comments text-white mb-3 sr-icon-3"></i>
              <h3 class="mb-3">@lang('landing.reviews')</h3>
              <p class="text-white mb-0">@lang('landing.reviewsText')</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-thumbs-up text-white mb-3 sr-icon-4"></i>
              <h3 class="mb-3">@lang('landing.ratings')</h3>
              <p class="text-white mb-0">@lang('landing.ratingsText')</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">@lang('landing.opinions')</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
          <div class="home-post">
            <div class="post-meta">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <br>
              <span class="date">@lang('landing.opinion1.date')</span>
            </div>
            <div class="entry-content">
              <h5><strong>@lang('landing.opinion1.name')</strong></h5>
              <p>
                @lang('landing.opinion1.text')
              </p>

            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="home-post">
            <div class="post-meta">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <br>
              <span class="date">@lang('landing.opinion2.date')</span>
            </div>
            <div class="entry-content">
              <h5><strong>@lang('landing.opinion2.name')</strong></h5>
              <p>
                @lang('landing.opinion2.text')
              </p>

            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="home-post">
            <div class="post-meta">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <br>
              <span class="date">@lang('landing.opinion3.date')</span>
            </div>
            <div class="entry-content">
              <h5><strong>@lang('landing.opinion3.name')</strong></h5>
              <p>
                @lang('landing.opinion3.text')
              </p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="home-post">
            <div class="post-meta">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <br>
              <span class="date">@lang('landing.opinion4.date')</span>
            </div>
            <div class="entry-content">
              <h5><strong>@lang('landing.opinion4.name')</strong></h5>
              <p>
                @lang('landing.opinion4.text')
              </p>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
    </section>

    <section id="we">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">@lang('landing.aboutus')</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-12 text-center">
            <div class="service-box mt-5 mx-auto">
              <img class="fas fa-4x fa-crosshairs text-primary mb-3 sr-icon-1" src="img/participants/artola.png"></i>
              <h3 class="mb-3">Jon Artola</h3>
              <p class="text-muted mb-0">@lang('landing.artola')</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 text-center">
            <div class="service-box mt-5 mx-auto">
              <img class="far fa-4x fa-address-card text-primary mb-3 sr-icon-2" src="img/participants/yaiza.png"></i>
              <h3 class="mb-3">Yaiza Muñoz</h3>
              <p class="text-muted mb-0">@lang('landing.yaiza')</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 text-center">
            <div class="service-box mt-5 mx-auto">
              <img class="far fa-4x fa-comments text-primary mb-3 sr-icon-3" src="img/participants/valdes.png"></i>
              <h3 class="mb-3">Jon Valdes</h3>
              <p class="text-muted mb-0">@lang('landing.valdes')</p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="bg-success text-white" id="contact">
      <div class="container">
        <div class="container text-center">
          <h2 class="mb-4">@lang('landing.contact')</h2>
          <hr class="dark my-4" />
        </div>
        <form method="post" action="form">
          @csrf
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          <div class="form-group">
            <label for="exampleFormControlInput1">@lang('landing.name')</label>
            <input type="text" class="form-control" name="nombre" id="name" placeholder="@lang('landing.name')" min="2" max="255" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">@lang('landing.email')</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="@lang('landing.email')" min="6" max="255" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">@lang('landing.message')</label>
            <textarea class="form-control" id="message" name="mensaje" rows="3" max="255" required></textarea>
          </div>
          <div class="form-group text-center">
            <input class="btn btn-light btn-xl js-scroll-trigger" type="submit" name="submit" value="@lang('landing.send')">
          </div>
        </form>
      </div>
    </section>

    @endsection
