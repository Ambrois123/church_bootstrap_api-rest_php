<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--font awesome-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--style CSS-->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>AEGT</title>
  </head>
  <body>

    <!--Navbar début-->

    <nav class="aegt-navbar navbar navbar-expand-xl position-fixed bg-dark w-100 general_font">
        <div class="container-fluid">
          <img src="images/logo.png" alt="logo_aget" class="logo_navbar">
          <button 
            class="navbar-toggler rounded-0" 
            type="button" 
            data-bs-toggle="collapse"
            data-bs-target="#navbarToggleExternalContent" 
            aria-controls="navbarToggleExternalContent"
            aria-expanded="false" 
            aria-label="Toggle navigation">
            <i class="fas fa-bars" style="color: #d28503;"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item pe-4">
                <a class="nav-link active" aria-current="page" href="accueil" style="color: #ea7d73;">Accueil</a>
              </li>
              <li class="nav-item dropdown pe-4 ">
                <a class="nav-link dropdown-toggle" 
                href="#" 
                id="navbarDropdown" 
                role="button" 
                data-bs-toggle="dropdown" 
                aria-expanded="false"
                style="color: #ea7d73;">
                  Nous découvrir
                </a>
                <ul class="dropdown-menu bg-dark rounded-0 text-center" aria-labelledby="navbarDropdown">
                  <li><a class="nav-link" href="http://localhost/aget_front/accueil#about" style="color: #ea7d73;">Qui sommes-nous</a></li>
                  <li><a class="nav-link" href="http://localhost/aget_front/accueil#pastor" style="color: #ea7d73;">Le responsable</a></li>
                  <li><a class="nav-link" href="http://localhost/aget_front/accueil#believe" style="color: #ea7d73;">Ce que nous croyons</a></li>
                </ul>
              </li>
              <li class="nav-item pe-4">
                <a class="nav-link" href="http://localhost/aget_front/accueil#agenda" style="color: #ea7d73;">Agenda</a>
              </li>
              <!-- <li class="nav-item pe-4">
                <a class="nav-link" href="http://localhost/aget_front/accueil#pastor" style="color: #ea7d73;">Le responsable</a>
              </li> -->
              <li class="nav-item pe-4">
                <!-- <a class="nav-link" href="http://localhost/aget_front/accueil#believe" style="color: #ea7d73;">Ce que nous croyons</a> -->
              </li>
              <li class="nav-item pe-4">
                <a class="nav-link" href="http://localhost/aget_front/accueil#partners" style="color: #ea7d73;">Eglises partenaires</a>
              </li>
              <li class="nav-item pe-4">
                <a class="nav-link" href="predications" style="color: #ea7d73;">Prédications</a>
              </li>
              <li class="nav-item pe-4">
                <a class="nav-link" href="http://localhost/aget_front/accueil#contact" style="color: #ea7d73;">Nous contacter</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!--Navbar fin-->
    <main>
        <?= $content; ?>
    </main>


    <!-- Footer -->
    <footer class="text-center text-lg-start bg-dark text-muted general_font">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section >
        <div class="container text-center text-md-start mt-5" >
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4" >
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4" style="color: #d28503;">
                <i class="fas fa-atlas me-3" ></i>Assemblée Evangélique de la Grâce de Toulouse
              </h6>
              <p class="text-center">
                L'homme considère Dieu comme un obstacle à sa liberté. Alors qu'en réalité Dieu est le sauveur qui désire lui donner du repos.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" >
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4" style="color: #d28503;" id="partners">
                Eglises Partenaires en France
              </h6>
              <p>
                <a href="https://www.aegnimes.com/" target="_blank" class="text-reset" >Assemblée Evangélique de Nîmes</a>
              </p>
              <p>
                <a href="https://eglisegrace.org/" target="_blank" class="text-reset">Eglise de la Grâce de Montpellier</a>
              </p>
              <p>
                <a href="https://www.eeglyon.com/" target="_blank" class="text-reset">Eglise Evangélique de la Grâce de Lyon</a>
              </p>
              <p>
                <a href="https://eegparis.org/" target="_blank" class="text-reset">Eglise Evangélique de la Grâce de Paris</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4" style="color: #d28503;">
                Eglise Partenaires en Suisse
              </h6>
              <p>
                <a href="https://www.eegg.org/" target="_blank" class="text-reset">Eglise Evangélique de la Grâce de Genève</a>
              </p>
              <p>
                <a href="https://www.aegl.ch/" target="_blank" class="text-reset">Assemblée Evangélique de la Grâce - Lausane</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4" style="color: #d28503;">Contact</h6>
              <!-- <p><i class="fas fa-home me-3"></i>Assemblée Evangélique de la Grâce de Toulouse</p> -->
              <p>
                <i class="fas fa-envelope me-3"></i>
                admin@aegtoulouse.fr
              </p>
              <p><i class="fas fa-phone me-3"></i> +33 6 79 27 32 52</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4 " style="background-color: rgba(0, 0, 0, 0.05);">
        
        © 2023 Copyright:
        <a class="text-reset fw-bold" href="accueil">aegtoulouse.fr</a>        
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <script src="assets/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
