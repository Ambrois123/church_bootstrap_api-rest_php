<?php
ob_start();
?>
<section class="py-5" style="display: 0px;"></section>
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
                  <p class="alert alert-danger" role="alert">
                  Votre message n'a pas pu être envoyé. Vérifiez les informations saisies.
                  </p>
                </div>
                <p id="believe"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
$content= ob_get_clean();

require_once 'template.php';