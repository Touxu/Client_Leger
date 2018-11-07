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
            <h2>Inscrivez-vous</h2>
            <form method="post" action="controleur/actionUtilisateur.php" name="FormSignin">
                <div class="field half">
                    <input type="text" name="signin" id="signin" placeholder="Pseudo" onfocus="contact()" onchange="contact()"/>
                </div>
                <div class="field half">
                    <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" onfocus="contact()" onchange="contact()"/>
                </div>
                <div class="field half">
                    <input type="password" name="remdp" id="remdp" placeholder="Retapez votre mot de passe" onfocus="contact()" onchange="contact()">
                </div>
                <div class="field half">
                    <input type="text" name="mail" id="mail" placeholder="Adresse email" onfocus="contact()" onchange="contact()"/>
                    <br>
                        <?php
                        if (!empty ($_GET["leretour"]))
                          {
                            echo '<div class="error-msg"><i class="fa fa-times-circle"></i> '. $_GET["leretour"]. '</div>';
                          }
                        ?>
                        <span" id="alerteInfo"></span>
                </div>

                <ul class="actions">
                    <input type='hidden' name='action' value='1'/>
                    <li id='leSubmit'><input type="button" class="button special disabled" value="S'inscrire" class="special"/></li>
                    <li id='leReset'><input type="reset" class="button special disabled" value="Effacer" class="special" onchangek="effacer()" /></li>
                </ul>
            </form>
            <a href="index.php?page=login">Vous avez déjà un compte?  Connectez-vous!</a>
          <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
</section>


<script type="text/javascript">

document.FormSignin.reset();

function contact()
{
  var msgErreur = '';
  var erreur = false;

  if (document.getElementById('signin').value == '')
  {
    erreur = true;
    msgErreur = 'Veuillez entrer un pseudo.';
  } else if (erreur == false && document.getElementById('mdp').value == '')
  {
    erreur = true;
    msgErreur = 'Veuillez entrer un mot de passe.';
  } else if (erreur == false && document.getElementById('remdp').value == '')
  {
    erreur = true;
    msgErreur = 'Veuillez re entrer votre mot de passe.';
  } else if (erreur == false && document.getElementById('remdp').value != document.getElementById('mdp').value)
  {
    erreur = true;
    msgErreur = 'Veuillez entrer 2 fois le même mot de passe.';
  }
  else if (erreur == false)
  {
    if (document.getElementById('mail').value == '')
    {
      msgErreur = 'Veuillez entrer une adresse mail';
      erreur = true;
    } else
    {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      var test = re.test(document.getElementById('mail').value);
      if (test == false)
      {
        msgErreur = document.getElementById('mail').value + ' n\'est pas une adresse email valide ';
        erreur = true;
      }

    }
  }


  if (erreur == true)
  {
    document.getElementById('alerteInfo').innerHTML = '<div class="error-msg"><i class="fa fa-times-circle"></i> ' + msgErreur + '</div>';
    document.getElementById('leSubmit').innerHTML = '<input type="button" class="button special disabled" value="S\'inscrire" class="special"/>'
  } else
  {
    document.getElementById('alerteInfo').innerHTML = '';
    document.getElementById('leSubmit').innerHTML = '<input type="submit" name="forminscription" value="S\'inscrire" class="special"/>'
  }

    if (document.getElementById('signin').value == '' && document.getElementById('mdp').value == '' &&
        document.getElementById('remdp').value == '' && document.getElementById('mail').value == '')
  {
    document.getElementById('leReset').innerHTML = '<input type="reset" class="button special disabled" value="Effacer" class="special" onchangek="effacer()" /></li>'
  } else
  {
    document.getElementById('leReset').innerHTML = '<input type="reset" class="button special" value="Effacer" class="special" onchangek="effacer()" /></li>'
  }

}

function effacer()
{
    document.getElementById('alerteInfo').innerHTML = '';
}
</script>