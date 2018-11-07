<style>
  .container_step {
      margin: 100px auto; 
  }
  .progressbar {
      counter-reset: step;
  }
  .progressbar li {
      list-style-type: none;
      width: 16%;
      float: left;
      font-size: 12px;
      position: relative;
      text-align: center;
      text-transform: uppercase;
      color: #7d7d7d;
  }
  .progressbar li:before {
      width: 30px;
      height: 30px;
      content: counter(step);
      counter-increment: step;
      line-height: 30px;
      border: 2px solid #7d7d7d;
      display: block;
      text-align: center;
      margin: 0 auto 10px auto;
      border-radius: 50%;
      background-color: white;
  }
  .progressbar li:after {
      width: 100%;
      height: 2px;
      content: '';
      position: absolute;
      background-color: #7d7d7d;
      top: 15px;
      left: -50%;
      z-index: -1;
  }
  .progressbar li:first-child:after {
      content: none;
  }
  .progressbar li.active {
      color: green;
  }
  .progressbar li.active:before {
      border-color: #55b776;
  }
  .progressbar li.active + li:after {
      background-color: #55b776;
  }
</style>

<div class="bg-light py-3">
            <div class="container">
              <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <a href="index.php?page=monCompte">MonCompte</a> <span class="mx-2 mb-0">/</span> <a href="index.php?page=MesCommandes">MesCommandes</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Commande n° <?php echo $laCommande->NumCommande; ?></strong></div>
              </div>
            </div>
          </div>

    <div class="site-section">
      <div class="container">
        <div class="row">

          <div class="col-md-12 border mb-5">
            <p class="mb-2"></p>
            <h4>Information sur la commande</h4>
            <table class="table site-block-order-table">
                      <tr>
                        <td>Numéro de commande:</td>
                        <td><?php echo $laCommande->NumCommande; ?></td>
                      </tr>
                      <tr>
                        <td>Statut de la commande:</td>
                        <td style="color: #7971ea;"><strong><?php
                        if (count($lesEtats) != 0)
                        {
                        echo $lesEtapes[count($lesEtats) - 1]->Libelle;
                        }
                        else echo 'Echec du payement';
                        ?></strong></td>
                      </tr>
                      <tr>
                        <td>Adresse de l'acheteur:</td>
                        <td><?php echo $lAdresse; ?></td>
                      </tr>
                      <tr>
                        <td>Estimation de la date de livraison:</td>
                        <td><?php echo $laFacture->DateLivraison; ?></td>
                      </tr>
                  </table>
          </div>

          <div class="col-md-12 border mb-5">
            <div class="container_step">
            <ul class="progressbar">
              <?php
              for ($j = 0; $j < count($lesEtapes); $j++)
              {
               $etape = $lesEtapes[$j];
                if(count($lesEtats) > $j)
                {
                  echo '<li class="active">' . $etape->Libelle . '</li>';
                }
                else
                {
                  echo '<li>' . $etape->Libelle . '</li>';
                }
              ?>
              <?php
              }
              ?>
            </ul>
            <br>
          </div>
          
        </div>
      </div>
    </div>