@extends("welcome")
@section("meta_tags")
     <meta name="keywords" content=" "/>
    <meta name="description" content="{{ config('app.name')}} "/>
    <meta name="author" content="{{ config('app.name')}}" />
    <meta name="copyright" content="{{ config('app.name')}}" />
    <meta name="robots" content="index"/>
    <title>{{ config('app.name')}} | Exchange</title>
@endsection
@section('hero')
    @include("web.hero")
@endsection
@section("content")
	
{{-- <p id="demo"></p>
<button onclick="typeWriter()">Click me</button> --}}



   
<main id="main">

    <!-- ======= Cliens Section ======= -->
   {{--  <section id="cliens" class="cliens section-bg">
      <div class="container">

        <div class="row" data-aos="zoom-in">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/vendors/arsha/assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/vendors/arsha/assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/vendors/arsha/assets/img/clients/client-3.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/vendors/arsha/assets/img/clients/client-4.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/vendors/arsha/assets/img/clients/client-5.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="/vendors/arsha/assets/img/clients/client-6.png" class="img-fluid" alt="">
          </div>

        </div>

      </div>

      <hr class="fancy-line"></hr>

    </section> --}}<!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about" style="background: #2D3748; top:-100; position: relative;">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>¿Quiénes Somos?</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p>
              En <b>SolidScript</b>, somos un equipo comprometido, con la formación integral de cada uno de los integrantes de nuestro equipo, que desarrolla y brinda soluciones tecnológicas a las personas. 
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>Investigar</li>
              <li><i class="ri-check-double-line"></i>Desarrollar</li>
              <li><i class="ri-check-double-line"></i>Crear Soluciones</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              <b>MISIÓN</b>:<span class="my-3"> Queremos estar a la vanguardia en cuanto a la necesidades del mercado digital, ofreciendo a las personas y a otras empresas, servicios de calidad con excelentes resultados</span>.<br>
              <b>VISIÓN</b>:<span class="my-3"> Ser una empresa sólida, reconocida en el mercado profesional venezolano por la calidad de sus servicios y capaz de competir con las grandes casas en calidad de servicio, precios y tecnología</span>. <br> <br>
              <span class="mt-3">
                Somos una empresa 100% Venezolana, que trabaja continuamente en el pro del desarrollo tecnológico, buscando el desarrollo personal y profesional del equipo humano que conforma la empresa.
              </span>


            </p>
            {{-- <a href="#" class="btn-learn-more">Learn More</a> --}}
          </div>
        </div>

      </div>
       <div class="waveTop3 css-1rkknkd"></div>
       <style type="text/css">
         .waveTop3 {
    bottom: -85px;
    transform: scaleY(-1);
    -webkit-transform: scaleY(-1);
    margin-left: 0;
}

       </style>
    </section><!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

            <div class="content">
              <h3>SolidScript <strong>Exchange</strong></h3>
                <p>
                    <strong>SolidScript Exchange</strong>, es una plataforma de intercamio de <b>Criptomonedas</b> por dinero fudiciario. Actualmente el sistema trabaja con la moneda de Venezuela, Bs.Soberanos. Envía criptoactivos desde tu billetera a la de nuestro sistema, que luego se encargara de realizar una transferencia bancaria hacia la cuenta que usted registre.
                </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Exchange <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      ¡El Exchange es muy fácil de usar! Te permite cambiar en minutos criptomonedas por dinero fudiciario. 
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Transacciones <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                        Todas las transacciones que realices dentro de la plataforma tienen un porcentaje de comisión de 0,95$
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Objetivo <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                        <strong>SolidScript Exchange</strong>, inicia sus operaciones en Venezuela, realizando cambios de criptomonedas por la moneda local. Nuestro proyecto quiere ir más alla de las fronteras, para realizar intercambios de criptomonedas por la moneda de cualquier país de manera rápida y segura.
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("/vendors/arsha/assets/img/why-us.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>

      </div>
    </section><!-- End Why Us Section -->

   {{--  <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
            <img src="/vendors/arsha/assets/img/skills.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
            <p class="font-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>

            <div class="skills-content">

              <div class="progress">
                <span class="skill">HTML <i class="val">100%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">CSS <i class="val">90%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">JavaScript <i class="val">75%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="progress">
                <span class="skill">Photoshop <i class="val">55%</i></span>
                <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Skills Section --> --}}

    <!-- ======= Services Section ======= -->
    <section id="features" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Características</h2>
          <p>SolidScript Exchange, pone a dispocición su plataforma para que las personas que dessen cambiar criptomonedas por dineo fudiciario, puedan realizar sus operaciones de manera rápida y segura.</p>
        </div>

        <div class="row">
          <div class="col-xl-sm col-xl-md col-lg-4 col-xl-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon">
                {{-- <i class="bx bxl-dribbble"></i> --}}
                <img src="{{ asset('/assets/images/features/easy.svg') }}"  width="100" height="100">
              </div>
              <h4><a href="">Fácil de usar</a></h4>
              <p>La plataforma es fácil de usar. Ofrecemos tutoriales para la orientación.</p>
            </div>
          </div>

          <div class="col-xl-sm col-xl-md col-lg-4 col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon">
                {{-- <i class="bx bx-file"></i> --}}
                <img src="{{ asset('/assets/images/features/security.svg') }}"  width="100" height="100">
              </div>
              <h4><a href="">Seguridad</a></h4>
              <p>La Seguridad está por encima de todo. Tus datos personales no están expuestos.</p>
            </div>
          </div>

          <div class="col-xl-sm col-xl-md col-lg-4 col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon">
                {{-- <i class="bx bx-tachometer"></i> --}}
                <img src="{{ asset('/assets/images/features/fast.svg') }}"  width="100" height="100">
              </div>
              <h4><a href="">Rapidez</a></h4>
              <p>Realiza transacciones con alto rendimiento y seguro.</p>
            </div>
          </div>

          <div class="col-xl-sm col-xl-md col-lg-4 col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon">
                {{-- <i class="bx bx-layer"></i> --}}
               <img src="{{ asset('/assets/images/features/calculator.svg') }}"  width="100" height="100">
             </div>
              <h4><a href="">Bajo costo</a></h4>
              <p>Queremos que experimentes las mejores tarifas en transacciones.</p>
            </div>
          </div>

          <div class="col-xl-sm col-xl-md col-lg-4 col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon">
                {{-- <i class="bx bx-layer"></i> --}}
                 <img src="{{ asset('/assets/images/features/support.svg') }}"  width="100" height="100">
              </div>
              <h4><a href="">Apoyo</a></h4>
              <p>Nuestro equipo siempre estará disponible para brindarte ayuda.</p>
            </div>
          </div>

           <div class="col-xl-sm col-xl-md col-lg-4 col-xl-4 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
             <div class="icon">
                {{-- <i class="bx bx-layer"></i> --}}
                 <img src="{{ asset('/assets/images/features/solution.svg') }}"  width="100" height="100">
              </div>
              <h4><a href="">Trasparencia</a></h4>
              <p>Todos pueden investigar y participar dentro de la plataforma.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
            <h3>Call To Action</h3>
            <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- End Cta Section -->

   

   {{--  <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="/vendors/arsha/assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="/vendors/arsha/assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="/vendors/arsha/assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="/vendors/arsha/assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section --> --}}

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Actualizaciones</h2>
          <p>SolidScript Exchange, se encuentra en fase inicial, pero nos encontramos trabajando arduamente para mejorar las experiencias de las personas en el intercambio de criptomonedas, es por ello que es de nuestro agrado mostrarles nuestra sección de próximas actualizaciones en la plataforma.</p>
        </div>

        <div class="row">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="box featured">
              <h3>Noviembre - Diciembre 2021</h3>
              <ul>
                <li><i class="bx bx-check"></i>Reclutamiento de equipo</li>
                <li><i class="bx bx-check"></i>Analisís y planteamiento del Sistema</li>
                <li><i class="bx bx-check"></i>Desarrollo de la estructura del Sistema</li>
                <li><i class="bx bx-check"></i>Creación de Página de aterrizaje</li>
                <li><i class="bx bx-check"></i>Desarrollo del Sistema (Fase Inicial)</li>
                <li><i class="bx bx-check"></i>Relizar pruebas en fase de desarrollo</li>
                <li class="na"><i class="bx bx-x"></i> <span>Relizar pruebas en fase de producción</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Creación de Cuentas en Redes Sociales</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Publicar Proyecto</span></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box featured">
              <h3>Fase Secundaria Q1 2022</h3>
              <ul>
                <li class="na"><i class="bx bx-x"></i> <span>Fase de rendimiento del Exchange</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Mejoras en seguridad de ingreso al sistema</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Planificación de intercambio de moneda local a criptomoneda</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Desarrollo e implementaciónde intercambio de moneda local a criptomoneda</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Segunda fase de rendimiento del Exchange</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Dar de alta de nuevas criptomonedas en el Exchange</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Habilitar Chat de soporte e información</span></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box featured">
              <h3>Tercera Fase Q2 2022</h3>
              <ul>
                <li class="na"><i class="bx bx-x"></i><span>Reclutamiento de nuevos integrantes</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Planificación de Inversion en moneda local</span></li>
                <li class="na"><i class="bx bx-x"></i> <span>Desarrollo de Inversion en moneda local</span></li>
                <li class="na"><i class="bx bx-x"></i><span>Planificación de Inversion en criptomonedas</span></li>
                <li class="na"><i class="bx bx-x"></i><span>Desarrollo de Inversion en criptomonedas</span></li>
                <li class="na"><i class="bx bx-x"></i><span>Reestructuración y/o modernización de sitio web y Exchange </span></li>
                <li class="na"><i class="bx bx-x"></i><span>Planificación y análisis de Aplicación Móvil</span></li>
              </ul>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Preguntas Frecuentes</h2>
          <p>a continuación presentamos una serie de preguntas frecuentes que resolveran tus dudas acerca del intercambio de criptoactivos a mondea fudiciaria.</p>
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">¿Qué criptomonedas puedo cambiar a Bs.Soberanos? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Actualmente puede intercambiar @foreach($cryptos as $crypto)<span>{{$crypto->crypto}},&nbsp;</span>@endforeach a Bs.Soberanos.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">¿Cuál es el costo de la transacción? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                   Por cada intercambio que realice de alguna cryptomoneda a Bs.Soberanos, tendrá un costo de {{ $commission }}. Este monto será descontado de la cantidad de criptomoneda que usted envíe.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">¿Qué bancos estan disponibles para la transacción? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Todos los Bancos de Venezuela. Las transacciones que se hacen desde nuestras cuentas hacia las de los usuarios provienen del Banco Provincial. 
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">¿Qué tipo de transacciones maneja SolidScript Exchange? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Transferencia Bancaria y Pago Móvil.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">¿Cuanto es el mínimo y el máximo para intercambiar? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                    No existe monto minimo para intercambiar criptoactivos a Bs.Soberanos. El valor o monto máximo de intercambio, será fijado por el capital en Bs.Soberanos que exista dentro de la plataforma.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-6" class="collapsed">¿Cuál es la billetera que usa el Exchange? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">
                <p>
                    La billetera que usa el exchange es Metamask. Proximannte se habilitaran nuevas Wallets.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contacto</h2>
          <p>SolidScript Exchange, pone a disposición su equipo para atenderte en cualquier momento. Contáctanos, si deseas soprte, información más detallada y/o personalizada.</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
             {{--  <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street, New York, NY 535022</p>
              </div> --}}

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Whatsapp:</h4>
                <p>+584142823998</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Asunto</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Mensaje</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Enviar</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main>
 
@endsection
<script type="text/javascript">
  var i = 0;
var txt = 'Lorem ipsum typing effect!'; /* The text */
var speed = 50; /* The speed/duration of the effect in milliseconds */

function typeWriter() {
  txt= ''
  if (i < txt.length) {
    document.getElementById("demo").innerHTML += txt.charAt(i);
    i++;
    setTimeout(typeWriter, speed);
  }
} 
</script>