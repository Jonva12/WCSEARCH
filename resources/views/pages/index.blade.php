

  @extends('layout.layout')

  @section('title', 'WCSearch')


  @section('content')
    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-white">Que es WCSearch?</h2>
            <hr class="light my-4">
            <div class="d-flex flex-row justify-content-center">
              <p class="text-faded mb-4">WCSearch es un localizador de aseos publicos dependiendo de tu localizacion. Siempre buscamos la manera mas rapida para satisfacer tus necesidades!</p>
              <i class="fas fa-map-marker-alt fa-4x mb-3 sr-icon-1" id="localizacion"></i>
            </div>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Unete</a>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-crosshairs text-primary mb-3 sr-icon-1"></i>
              <h3 class="mb-3">WC Lolizador</h3>
              <p class="text-muted mb-0">Utilizamos geolocalizacion para mostrarte los aseos publicos mas cercanos a tu ubicacion.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-address-card text-primary mb-3 sr-icon-2"></i>
              <h3 class="mb-3">WC Informacion</h3>
              <p class="text-muted mb-0">Mostramos todo tipo de informacion sobre los aseos.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-comments text-primary mb-3 sr-icon-3"></i>
              <h3 class="mb-3">Reviews</h3>
              <p class="text-muted mb-0">Los usuarios pueden realizar comentarios sobre el estado del aseo.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-thumbs-up text-primary mb-3 sr-icon-4"></i>
              <h3 class="mb-3">Ratings</h3>
              <p class="text-muted mb-0">Cada aseo recibira valoraciones de los usuarios para saber de una manera interactiva el estado de los mismos.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">What We Offer</h2>
            <hr class="my-4">
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="fas fa-4x fa-crosshairs text-primary mb-3 sr-icon-1"></i>
              <h3 class="mb-3">WC Locator</h3>
              <p class="text-muted mb-0">We use geolocation for showing the toilets available near you.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-address-card text-primary mb-3 sr-icon-2"></i>
              <h3 class="mb-3">WC Information</h3>
              <p class="text-muted mb-0">We display all the necessary information about the WCs.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-comments text-primary mb-3 sr-icon-3"></i>
              <h3 class="mb-3">Reviews</h3>
              <p class="text-muted mb-0">We use the comments of the users to show them in the WCs Card for you.</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <i class="far fa-4x fa-thumbs-up text-primary mb-3 sr-icon-4"></i>
              <h3 class="mb-3">Ratings</h3>
              <p class="text-muted mb-0">Each toilet is rated by the community to choose better.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="we">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Who we are</h2>
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
              <p class="text-muted mb-0">Director and Coordinator</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 text-center">
            <div class="service-box mt-5 mx-auto">
              <img class="far fa-4x fa-address-card text-primary mb-3 sr-icon-2" src="img/participants/yaiza.png"></i>
              <h3 class="mb-3">Yaiza Muñoz</h3>
              <p class="text-muted mb-0">2º head of Direction</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 text-center">
            <div class="service-box mt-5 mx-auto">
              <img class="far fa-4x fa-comments text-primary mb-3 sr-icon-3" src="img/participants/valdes.png"></i>
              <h3 class="mb-3">Jon Valdes</h3>
              <p class="text-muted mb-0">Technician</p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section class="bg-success text-white" id="contact">
      <div class="container">
        <div class="container text-center">
          <h2 class="mb-4">Contact Form</h2>
          <hr class="light my-4" />
        </div>
        <form method="post" action="form" onsubmit=" return alert(' Message Sent!')">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Yaiza Muñoz">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Message</label>
            <textarea class="form-control" id="message" name="messages" rows="3"></textarea>
          </div>
          <div class="form-group text-center">
            <input class="btn btn-light btn-xl js-scroll-trigger" type="submit" name="submit" value="Enviar">
          </div>
        </form>
      </div>
    </section>

    @endsection
