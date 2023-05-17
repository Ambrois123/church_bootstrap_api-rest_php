<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AEG de Toulouse</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <!---Cacher cette partie du menu si pas accès--->

  <?php if(!Security::verifAccess()) :?>

        <li class="nav-item">
          <a class="nav-link " href="<?= URL ?>admin/login">Login</a>
        </li>
  <?php else : ?>
        <li class="nav-item">
          <a class="nav-link " href="<?= URL ?>admin/accueil">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Sermons
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= URL ?>admin/sermons/visualisation">Visualisation</a>
            <a class="dropdown-item" href="<?= URL ?>admin/sermons/creation">Création</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Etudes bibliques
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= URL ?>admin/etudes/visualisation">Visualisation</a>
            <a class="dropdown-item" href="<?= URL ?>admin/etudes/creation">Création</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?= URL ?>admin/deconnexion">Deconnexion</a>
        </li>
  <?php endif ?>

      </ul>
    </div>
  </div>
</nav>