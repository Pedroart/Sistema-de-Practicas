@extends('plantilla.web')

@section('content')
    <!--Banner-->
    <div class="banner">
        <div class="bg-color">
        <div class="container">
            <div class="row">
            <div class="banner-text text-center">
                <div class="text-border">
                <h2 class="text-dec">Conecxion con  el mundo laboral</h2>
                </div>
                <div class="intro-para text-center quote">
                <p class="big-text">Aprendiendo hoy. . . Liderando el mañana.</p>
                <p class="small-text">CONECTANDO TALENTO CON OPORTUNIDADES</p>
                <a href="#footer" class="btn get-quote">Conoce más</a>
                </div>
                <a href="#feature" class="mouse-hover">
                <div class="mouse"></div>
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!--/ Banner-->
    <!--Feature-->
  <section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Ejes de acción</h2>
          <p>Fomentamos el fortalecimiento de las competencias que hacen más empleables a nuestros estudiantes y egresados, orientándolos en el diseño y logro de sus metas profesionales.</p>
          <hr class="bottom-line">
        </div>
        <div class="feature-info">
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Observatorio laboral</h4>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-css3"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Mentoring y acompañamiento</h4>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-drupal"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Embajador de marca</h4>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-trophy"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ feature-->
  <!--Pricing-->
  <section id="pricing" class="section-padding">
    <div class="">
        <div class="header-section text-center">
            <h2>Nuestros Aliados</h2>
            <p>Encuentra ofertas publicadas de forma exclusiva para estudiantes y titulados</p>

        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4" style="padding:10px;">
            <div class="price-table">
                <!-- Plan  -->
                <div class="pricing-head">
                <h4>Banco de Crédito del Perú (BCP)</h4>
                </div>

                <!-- Plean Detail -->
                <div class="price-in mart-15">
                <a href="#" class="btn btn-bg green btn-block">POSTULA</a>
                </div>
            </div>
            </div>
            <div class="col-md-4" style="padding-top:10px;">
                <div class="price-table">
                <!-- Plan  -->
                <div class="pricing-head">
                    <h4>Banco de Crédito del Perú (BCP)</h4>
                </div>

                <!-- Plean Detail -->
                <div class="price-in mart-15">
                    <a href="#" class="btn btn-bg green btn-block">POSTULA</a>
                </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4" style="padding-top:10px;">
                <div class="price-table">
                <!-- Plan  -->
                <div class="pricing-head">
                    <h4>Banco de Crédito del Perú (BCP)</h4>
                </div>

                <!-- Plean Detail -->
                <div class="price-in mart-15">
                    <a href="#" class="btn btn-bg green btn-block">POSTULA</a>
                </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!--/ Pricing-->
@endsection
