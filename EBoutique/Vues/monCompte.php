          <div class="bg-light py-3">
            <div class="container">
              <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">MonCompte</strong></div>
              </div>
            </div>
          </div>

    <div class="site-section">
      <div class="container">
        <div class="row">

          <div class="col-md-4"></div>
          <div class="col-md-4"><h2 class="h3 mb-3 text-black" style="text-align: center;">Mon Compte:</h2></div>
          <div class="col-md-4"></div>

          <div class="col-md-4"></div>
          <div class="col-md-4">
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Prénom:</span>
              <p class="mb-0"><?php echo $_SESSION['pseudo']; ?></p>
              <br>
              <span class="d-block text-primary h6 text-uppercase">Nom:</span>
              <p class="mb-0"><?php echo $_SESSION['nom']; ?></p>
              <br>
              <span class="d-block text-primary h6 text-uppercase">Email:</span>
              <p class="mb-0"><?php echo $_SESSION['mail']; ?></p>
              <br>
              <span class="d-block text-primary h6 text-uppercase">Téléphone:</span>
              <p class="mb-0"><?php echo $_SESSION['tel']; ?></p>
              <hr>
              <div class="form-group">
              <div class="col-md-12 mb-3 mb-md-0">
                <a href="index.php?page=mesCommandes"><button class="btn btn-primary btn-sm btn-block">Mes Commandes</button></a>
              </div>
              </div>
              <div class="form-group mb-0">
              <div class="col-md-12 mb-3 mb-md-0">
                <a href="index.php?page=mesAdresses"><button class="btn btn-primary btn-sm btn-block">Mes Adresses</button></a>
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4"></div>

          <div class="col-md-4"></div>
          <div class="col-md-4" style="text-align: center;"><a href="index.php?page=deconnexion">Se déconnecter</a></div>
          <div class="col-md-4"></div>

        </div>
      </div>
    </div>