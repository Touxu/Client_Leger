<style type="text/css">
.error-msg {
  margin: 10px 0;
  padding: 10px;
  border-radius: 3px 3px 3px 3px;
  color: #D8000C;
  background-color: #FFBABA;
}
</style>

<section>
            <h2>Connectez-vous au BackEnd Admin:</h2>
            <form method="post" action="controleur/actionUtilisateur.php" name="FormLogin">
                <div class="field half">
                    <input type="text" name="mail" id="mail" placeholder="Adresse email" onkeyup="contact()" onchange="contact()"/>
                </div>
                <div class="field half">
                    <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" onkeyup="contact()" onchange="contact()"/>

                    <br>
                    <?php
                        if (!empty ($_GET["leretour2"]))
                          {
                            echo '<div class="error-msg"><i class="fa fa-times-circle"></i> '. $_GET["leretour2"]. '</div>';
                          }
                        ?>
                    <span id="alerteInfo"></span>
                </div>

                <ul class="actions">
                    <input type='hidden' name='action' value='4'/>
                    <li id='leSubmit'><input type="button" class="button special disabled" value="Se-connecter" class="special"/></li>
                    <li id='leReset'><input type="reset" class="button special disabled" value="Effacer" class="special" onclick="effacer()" /></li>
                </ul>
            </form>
            <a href="index.php?page=signin">Vous n'avez pas encore de compte?  Inscrivez-vous!</a>
</section>


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
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
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
    document.getElementById('alerteInfo').innerHTML = '<div class="error-msg"><i class="fa fa-times-circle"></i> ' + msgErreur + '</div>';
    document.getElementById('leSubmit').innerHTML = '<input type="button" class="button special disabled" value="Se-connecter" class="special"/>'
  } else
  {
    document.getElementById('alerteInfo').innerHTML = '';
    document.getElementById('leSubmit').innerHTML = '<input type="submit" name="formconnexion" value="Se-connecter" class="special"/>'
  }

  if (document.getElementById('mail').value == '' && document.getElementById('mdp').value == '')
  {
    document.getElementById('leReset').innerHTML = '<input type="reset" class="button special disabled" value="Effacer" class="special" onclick="effacer()" /></li>'
  } else
  {
    document.getElementById('leReset').innerHTML = '<input type="reset" class="button special" value="Effacer" class="special" onclick="effacer()" /></li>'
  }

}

function effacer()
{
    document.getElementById('alerteInfo').innerHTML = '';
}
</script>