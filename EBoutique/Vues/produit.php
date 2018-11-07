<div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <a href="index.php?page=magasin">Magasin</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $nouveauProduit->NomProd; ?></strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <form method="post" action="./Controleur/actionPanier.php" name="FormProduit">
        <div class="row">
          <div class="col-md-6">
            <img src="Vues/images/<?php
                     if($nouveauProduit->Image != null){echo $nouveauProduit->Image;}
                     else{echo "noimage.png";}?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $nouveauProduit->NomProd; ?></h2>
            <p><?php echo $nouveauProduit->DescProd; ?></p>
            <p><strong class="text-primary h4"><?php echo $nouveauProduit->PrixProd; ?>€</strong></p>
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary" type="button" onclick='retirer()'>&minus;</button>
              </div>
              <input id="laQuantitée" name="qt" type="text" class="form-control text-center" value="1" onkeypress='validate(event)' onclick='this.select();'>
              <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" onclick='ajouter()'>&plus;</button>
              </div>
            </div>

            </div>
            <input type="hidden" name="action" value="1">
            <input type="hidden" name="num" value="<?php echo $nouveauProduit->NumProd; ?>">
            <p><input type="button"class="buy-now btn btn-sm btn-primary" value="Ajouter au panier" onclick='ajouterProduit()' ></input></p>

          </div>
        </div>
      </form>
      </div>
    </div>

<script type="text/javascript">
function validate(evt)
{
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
function retirer()
{
  if(is_int(document.getElementById('laQuantitée').value))
  {
  if(document.getElementById('laQuantitée').value > 1)
  document.getElementById('laQuantitée').value --;
  }
  else document.getElementById('laQuantitée').value = 1;
}

function ajouter()
{
  if(is_int(document.getElementById('laQuantitée').value))
  {
  document.getElementById('laQuantitée').value ++;
  }
  else document.getElementById('laQuantitée').value = 1;
}

function ajouterProduit()
{
  if(is_int(document.getElementById('laQuantitée').value))
  {
    document.forms["FormProduit"].submit();
  }
  else
  {
    alert("Erreur: Cette quantitée n'est pas un entier");
    document.getElementById('laQuantitée').value = 1;
  }
}

function is_int(value){
  if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
      return true;
  } else {

      return false;
  }
}
</script>

