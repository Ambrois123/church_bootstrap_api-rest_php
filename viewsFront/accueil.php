<?php
ob_start();

?>
    <!--photo de fond début-->
    
    <section class="banner d-flex justify-content-center align-items-center pt-5">
      <div class="container my-5 py-5">
        <div class="row">
          <div class="col-md-6"></div>
          <div class="col-md-6">
            <h1 class="text-center title-font py-3 banner-text">Jésus dit "Venez à moi, vous qui êtes accablés sous le poids d'un lourd 
              fardeau et je vous donnerai du repos"</h1>
            <p class="text-center d-flex justify-content-sm-center">
              <a href="#contact" class="btn btn-joinUs rounded-0 btn-lg me-5">Nous visiter</a>
              <a href="predications" class="btn btn-sermon rounded-0 btn-lg">Prédications</a>
            </p>
          </div>
        </div>
        <p id="about"></p>
        <!-- <?php echo password_hash("Church_Admin_aeg31", PASSWORD_DEFAULT) ?> -->
      </div>
    </section>

    <!--photo de fond fin-->

    <!--info générales début-->
    <section class="info py-5 bg-dark general_font"  >
      <div class="container" >
        <h3 class="text-center title-color"  style="border-bottom: #ea7d73 1px solid; padding-bottom: 10px;">Qui sommes-nous</h3>
        <div class="row py-4">
          <div class="card mb-3 border-0 rounded-0 p-0 ">
            <div class="row ">
              <div class="col-md-6 ">
                <img src="images/communionF.jpeg" class="img-fluid d-none d-sm-block " alt="..." >
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title text-center fw-bold ">Une assemblée évangélique</h5>
                  <p class="card-text text-format">
                    En tant que chrétiens, nous attachons une grande importance au fait de se rassembler. Jésus a dit : "Là où deux ou trois sont assemblés en mon nom,
                     je suis au milieu d’eux. » (Matthieu 18:20). C'est dans l'assemblée, que nous découvrons la plénitude de l'amour de Christ. <br/>
                     <br/>
                     <Span>C’est aussi dans l’assemblée, unis autour de la personne de Christ et de Sa Parole qui est la Bible, 
                     que nous saisissons tous les trésors de la foi en Jésus-Christ</Span> (Luc 10:38-42).<br/> 
                     <br/>
                     L’assemblée se constitue de personnes de tous horizons, qui ont le désir commun de connaître Dieu et de le glorifier. 
                     Ils forment ainsi une famille, dans laquelle l’amour de Dieu devient concret (Jean 13:35). <br/>
                    <br/>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3 border-0 rounded-0 p-0">
            <div class="row">
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title text-center fw-bold ">Notre mouvement d'église</h5>
                  <p class="card-text text-format">
                    Notre assemblée à Toulouse est spirituellement affiliée 
                    au mouvement d'églises <span> <a href="https://ggwo.org/" target="_blank" style="cursor: pointer;text-decoration: none;color: #d28503;">Greater Grace World Outreach, 
                      ou G.G.W.O</a>,</span> ce qui signifie "toucher le monde par 
                    une grâce plus excellente" .
                  </br></br>
                    Cette expression tire son origine de Jacques 4 : 6, où il est écrit "Dieu accorde aux humbles
                    une grâce plus excellente; c'est pourquoi l'Écriture dit: Dieu résiste aux l'orgueilleux, Mais il fait grâce aux humbles. "
                  </br></br>
                    C'est un mouvement qui met l’accent sur le fait que seule la grâce de Dieu, 
                    manifestée par la mort de Jésus-Christ à la croix, peut 
                    amener les hommes au salut et les croyants à la sanctification.</br>
                  </br>
                    Par la formation de pasteurs au sein du <a href="https://mbcs.edu/" target="_blank" style="cursor: pointer;text-decoration: none;color: #d28503;">Maryland Bible College 
                      and Seminary (M.B.C.&S)</a> et par l’envoi de missionnaires, 
                    il est à l’origine de nombreuses églises dans le monde.
                  </p>
                </div>
              </div>
              <div class="col-md-6"  >
                <img src="images/assemblee1.jpg" class="img-fluid d-none d-sm-block" alt="...">
              </div>
              <p id="agenda"></p>
            </div>
          </div>
        </div>  
      </div>
    </section>
    <!--infos générales fin-->

    <!--Programme de la semaine début-->
    <section class="agenda py-5 general_font" style="max-height: 1600px;">
      <div class="container">
        <h3 class="text-center title-color"  style="border-bottom: #ea7d73 1px solid; padding-bottom: 10px;">Le programme de la semaine</h3>
        <div class="row py-4 g-1">
          <div class="col-md-4">
            <div class="card rounded-0 h-100">
              <div class="card-body">
                <h6 class="card-title text-center fw-bold">Culte du dimanche de 10h30 à 12h00</h6>
                <p class="card-text text-center">
                  Fasthotel Balma au 2 rue Louis Renault, Balma</br>
                  Métro ligne A : Balma-Gramont.
                </p>               
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card rounded-0 h-100">
              <div class="card-body">
                <h6 class="card-title text-center fw-bold">Evangélisation les samedis de 15h30 à 17h00 </h6>
                <p class="card-text text-center">
                  Lieu: parc de la prairie des filtres</br>
                  Métro ligne A : Saint Cyprien.
                  
                </p>                
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card rounded-0 h-100" id="pastor">
              <div class="card-body">
                <h6 class="card-title text-center fw-bold">Etude biblique les mercredis de 20h00 à 21h30</h6>
                <p class="card-text text-center">
                  Si vous êtes intéressés,</br> 
                  contactez-nous au 06 79 27 32 52
                  <p></p>
                </p>            
              </div>
            </div>
            
          </div>
        </div>
        <div class="event bg-light" style="display: none;">
          <?php foreach($evenements as $evenement):?>

          <h3 class="text-center py-4"><?= $evenement->getTitle()?></h3>
          <div class="flyer text-center pb-4">
            <img src="public/images/<?=$evenement->getFlyer()?>" alt="flyer" class="img-fluid">
          </div>
          <?php 
            endforeach;
          ?>
        </div>
      </div>
    </section>
    <!--Programme de la semaine fin-->

    <!--Le responsable début-->
    <section class="info py-5 bg-light general_font">
      <div class="container">
        <h3 class="text-center title-color"  style="border-bottom: #ea7d73 1px solid; padding-bottom: 10px;">Le responsable</h3>
        <div class="row py-4">
          <div class="card mb-3 border-0 rounded-0 p-0">
            <div class="row ">
              <div class="col-md-6 text-center">
                <img src="images/Famille3.jpeg" class="img-fluid w-75  " alt="Photo de famille du pasteur" >
              </div>
              <div class="col-md-6  d-flex justify-content-center align-items-center">
                <div class="card-body">
                  <p class="card-text text-format">
                    Le pasteur Ambroise ADANLEDJI a été formé à l’Institut 
                    Théologique de Lomé au Togo pendant 4 ans. Il a poursuivi sa formation
                    au Maryland Bible school and Seminary (USA). Il a servi au sein 
                    de l’Eglise Évangélique de la Grâce de Paris comme pasteur assistant 
                    pendant 10 ans. Parallèlement, il a été enseignant à l’Institut Théologique du Soir.
                    Ensuite, il a servi comme pasteur assistant pendant 4 ans à l’Église de la Grâce de Montpellier.
                    En juillet 2021, il déménage à Toulouse pour une implantation d’église. 
                    Il est marié et père de trois enfants.
                    <p>De gauche à droite: Alycia, Melody, Ambroise, Fabien et Raphaël</p>
                  </p>
                </div>
              </div>  
              <p id="contact"></p>           
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Le responsable fin-->

    <!--Nous contacter et vister début-->
    <section class="info py-5 bg-dark general_font">
      <div class="container">
        <h3 class="text-center title-color"  style="border-bottom: #ea7d73 1px solid; padding-bottom: 10px;">Nous visiter</h3>
        <div class="row py-4">
          <div class="card mb-3 border-0 rounded-0 p-0">
            <div class="row ">
              <div class="col-md-6 ">
                <img src="images/plan_eglise.png" class="img-fluid " alt="..." >
              </div>
              <div class="col-md-6">
                <div class="card-body py-5">
                  <h5 class="card-title text-center">Nous contacter</h5>
                  <p 
                  class="card-text text-center"
                  style = "font-family: 'Montserrat', sans-serif; font-size: 1.2rem; color: #ea7d73;"
                  >Vous avez des questions sur la Bible, sur Dieu ou sur la foi chrétienne ? 
                    Vous pouvez nous contacter au +33 6 79 27 32 52 ou remplir ce formulaire.</p>
                  <form class="row g-3" method="post" action="submitContactForm">
                    <div class="col-md-12">
                      <label for="username" class="form-label">Votre nom</label>
                      <input type="text" class="form-control rounded-0" id="username" name="username">
                    </div>
                    <div class="col-12">
                      <label for="email" class="form-label">Votre email</label>
                      <input type="email" class="form-control rounded-0" id="email" name="email">
                    </div>
                    <div class="col-12">
                      <label for="message" class="form-label">Votre message</label>
                      <textarea type="text" cols="8" class="form-control rounded-0" id="message" name="message"></textarea>
                    </div>
                    <div class="col-12 text-center">
                      <button type="submit" class="btn rounded-0 btn-contact ">Envoyer</button>
                    </div>
                  </form>
                </div>
                <p id="believe"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!--Nous contacter et visiter fin-->

    <!--Ce que nos croyons début-->
    <section class="believe py-5 general_font">
      <div class="container">
        <h3 class="text-center title-color"  style="border-bottom: #ea7d73 1px solid; padding-bottom: 10px;">Ce que nous croyons</h3>
        <div class="row row-cols-2 row-cols-md-4 g-4 py-4">
          <div class="col">
            <div class="card rounded-0">
              <img src="images/bible_believe.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="ecritures" class="believe-title"><h6 class="card-title text-center">LA BIBLE</h6></a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-0">
              <img src="images/bible_believe.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="trinity" class="believe-title"><h6 class="card-title text-center">LA TRINITE</h6></a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-0">
              <img src="images/bible_believe.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="father" class="believe-title"><h6 class="card-title text-center">DIEU LE PERE</h6></a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-0">
              <img src="images/bible_believe.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="christ" class="believe-title"><h6 class="card-title text-center">JESUS-CHRIST</h6></a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-0">
              <img src="images/bible_believe.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="spirit" class="believe-title"><h6 class="card-title text-center">LE SAINT-ESPRIT</h6></a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-0">
              <img src="images/bible_believe.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="man" class="believe-title"><h6 class="card-title text-center">L'HOMME</h6></a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-0">
              <img src="images/bible_believe.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="salvation" class="believe-title"><h6 class="card-title text-center">LE SALUT</h6></a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-0">
              <img src="images/bible_believe.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="church" class="believe-title"><h6 class="card-title text-center">L'EGLISE</h6></a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-0">
              <img src="images/bible_believe.jpg" class="card-img-top" alt="...">
              <div class="card-body ">
                <a href="churchFuture" class="believe-title"><h6 class="card-title text-center">LE FUTUR DE L'EGLISE</h6></a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card rounded-0">
              <img src="images/bible_believe.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <a href="endTime" class="believe-title"><h6 class="card-title text-center">LA FIN DES TEMPS</h6></a>
                <p class="card-text"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Ce que nous croyons fin-->
<?php
$content= ob_get_clean();

require_once 'template.php';