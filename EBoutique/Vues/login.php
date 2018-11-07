      <div class="container">
        <div class="row">

          <!-- Titre -->
          <div class="col-md-4"></div>
          <div class="col-md-4">
            <h2 class="h3 mb-3 text-black" style="text-align: center;">Identifiez-vous</h2>
          </div>
          <div class="col-md-4"></div>

          <!-- Form -->
          <div class="col-md-4"></div>

          <div class="col-md-4">

            <form method="post" action="controleur/actionUtilisateur.php" name="FormLogin">

              <div class="p-3 p-lg-5 border">

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email</label>
                    <input type="email" class="form-control" id="mail" name="mail" onkeyup="contact()" onchange="contact()">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="mdp" class="text-black">Mot de passe</label>
                    <input type="password" class="form-control" id="mdp" name="mdp" onkeyup="contact()" onchange="contact()">
                  </div>
                </div>

                <span id="alerteInfo">
                <?php
                        if (!empty ($_GET["leretour2"]))
                          {
                            echo '<div class="form-group row"><div class="col-lg-12"><div class="error-msg alert alert-danger"><div class="clearfix bshadow0 pbs"><span class="icon-exclamation-circle"></span> &nbsp'. $_GET["leretour2"]. '</div></div></div></div>';
                          }
                ?>
                </span>

                <div class="form-group row">
                  <div class="col-lg-12">
                        <input type='hidden' name='action' value='4'/>
                        <span id='leSubmit'><input type="button" class="btn btn-primary btn-lg btn-block disabled" value="Identifiez-vous" class="special"/></span>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-lg-12">
                        <input type='hidden' name='action' value='4'/>
                        <span id='leReset'><input type="reset" class="btn btn-primary btn-lg btn-block disabled" value="Effacer" class="special" onclick="effacer()" /></span>
                  </div>
                </div>

            </form>
                    <hr>
                    <div class="a-row">
                      Pas encore de compte ?
                      <a href="index.php?page=signin"> Inscrivez-vous</a>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="col-md-4"></div>

          </div>
        </div>
      </div>

<script type="text/javascript">

document.FormLogin.reset();

function contact()
{
  var msgErreur = '';
  var erreur = false;

  if (document.getElementById('mail').value == '')
  {
    erreur = true;
    msgErreur = 'Veuillez entrer une adresse mail.';
  } else
    {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,3}))$/;
      var test = re.test(document.getElementById('mail').value);
      if (test == false)
      {
        msgErreur = document.getElementById('mail').value + ' n\'est pas une adresse email valide ';
        erreur = true;
      }
  else if (erreur == false && document.getElementById('mdp').value == '')
  {
    erreur = true;
    msgErreur = 'Veuillez entrer un mot de passe.';
  }

    }

  if (erreur == true)
  {
    document.getElementById('alerteInfo').innerHTML = '<div class="form-group row"><div class="col-lg-12"><div class="error-msg alert alert-danger"><div class="clearfix bshadow0 pbs"><span class="icon-exclamation-circle"></span> &nbsp' + msgErreur + '</div></div></div></div>';
    document.getElementById('leSubmit').innerHTML = '<input type="button" class="btn btn-primary btn-lg btn-block disabled" value="Identifiez-vous" class="special"/>'
  } else
  {
    document.getElementById('alerteInfo').innerHTML = '';
    document.getElementById('leSubmit').innerHTML = '<input type="submit" class="btn btn-primary btn-lg btn-block" value="Identifiez-vous"  name="formconnexion" class="special"/>';
  }

  if (document.getElementById('mail').value == '' && document.getElementById('mdp').value == '')
  {
    document.getElementById('leReset').innerHTML = '<input type="reset" class="btn btn-primary btn-lg btn-block disabled" value="Effacer" class="special" onclick="effacer()" />';
  } else
  {
    document.getElementById('leReset').innerHTML = '<input type="reset" class="btn btn-primary btn-lg btn-block" value="Effacer" class="special" onclick="effacer()" />';
  }

}

function effacer()
{
    document.getElementById('alerteInfo').innerHTML = '';
    document.getElementById('leReset').innerHTML = '<input type="reset" class="btn btn-primary btn-lg btn-block disabled" value="Effacer" class="special" onclick="effacer()" />';
}
</script>
