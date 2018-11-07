<div class="bg-light py-3">
            <div class="container">
              <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php">Accueil</a> <span class="mx-2 mb-0">/</span> <a href="index.php?page=monCompte">MonCompte</a> <span class="mx-2 mb-0">/</span> <a href="index.php?page=mesAdresses">MesAdresses</a> <span class="mx-2 mb-0">/</span><strong class="text-black">ModifierUneAdresse</strong></div>
              </div>
            </div>
          </div>

<div class="site-section">
   <div class="container">
      <div class="row">
         <div class="col-md-3"></div>
         <div class="col-md-6 mb-5 mb-md-0">
            <form method="post" action="controleur/actionAdresse.php" name="FormModifierUneAdresse">
               <h2 class="h3 mb-3 text-black" style="text-align: center;">Modifier une adresse</h2>
               <div class="p-3 p-lg-5 border">
                  
               <div class="form-group">
                              <label for="c_country" class="text-black">Pays <span class="text-danger">*</span></label>
                              <select id="c_country" name="c_country" class="form-control">
                                 <option value="France" selected="selected">France </option>
                                 <option value="Afghanistan">Afghanistan </option>
                                 <option value="Afrique_Centrale">Afrique_Centrale </option>
                                 <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                 <option value="Albanie">Albanie </option>
                                 <option value="Algerie">Algerie </option>
                                 <option value="Allemagne">Allemagne </option>
                                 <option value="Andorre">Andorre </option>
                                 <option value="Angola">Angola </option>
                                 <option value="Anguilla">Anguilla </option>
                                 <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                 <option value="Argentine">Argentine </option>
                                 <option value="Armenie">Armenie </option>
                                 <option value="Australie">Australie </option>
                                 <option value="Autriche">Autriche </option>
                                 <option value="Azerbaidjan">Azerbaidjan </option>
                                 <option value="Bahamas">Bahamas </option>
                                 <option value="Bangladesh">Bangladesh </option>
                                 <option value="Barbade">Barbade </option>
                                 <option value="Bahrein">Bahrein </option>
                                 <option value="Belgique">Belgique </option>
                                 <option value="Belize">Belize </option>
                                 <option value="Benin">Benin </option>
                                 <option value="Bermudes">Bermudes </option>
                                 <option value="Bielorussie">Bielorussie </option>
                                 <option value="Bolivie">Bolivie </option>
                                 <option value="Botswana">Botswana </option>
                                 <option value="Bhoutan">Bhoutan </option>
                                 <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                 <option value="Bresil">Bresil </option>
                                 <option value="Brunei">Brunei </option>
                                 <option value="Bulgarie">Bulgarie </option>
                                 <option value="Burkina_Faso">Burkina_Faso </option>
                                 <option value="Burundi">Burundi </option>
                                 <option value="Caiman">Caiman </option>
                                 <option value="Cambodge">Cambodge </option>
                                 <option value="Cameroun">Cameroun </option>
                                 <option value="Canada">Canada </option>
                                 <option value="Canaries">Canaries </option>
                                 <option value="Cap_vert">Cap_Vert </option>
                                 <option value="Chili">Chili </option>
                                 <option value="Chine">Chine </option>
                                 <option value="Chypre">Chypre </option>
                                 <option value="Colombie">Colombie </option>
                                 <option value="Comores">Colombie </option>
                                 <option value="Congo">Congo </option>
                                 <option value="Congo_democratique">Congo_democratique </option>
                                 <option value="Cook">Cook </option>
                                 <option value="Coree_du_Nord">Coree_du_Nord </option>
                                 <option value="Coree_du_Sud">Coree_du_Sud </option>
                                 <option value="Costa_Rica">Costa_Rica </option>
                                 <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                 <option value="Croatie">Croatie </option>
                                 <option value="Cuba">Cuba </option>
                                 <option value="Danemark">Danemark </option>
                                 <option value="Djibouti">Djibouti </option>
                                 <option value="Dominique">Dominique </option>
                                 <option value="Egypte">Egypte </option>
                                 <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                 <option value="Equateur">Equateur </option>
                                 <option value="Erythree">Erythree </option>
                                 <option value="Espagne">Espagne </option>
                                 <option value="Estonie">Estonie </option>
                                 <option value="Etats_Unis">Etats_Unis </option>
                                 <option value="Ethiopie">Ethiopie </option>
                                 <option value="Falkland">Falkland </option>
                                 <option value="Feroe">Feroe </option>
                                 <option value="Fidji">Fidji </option>
                                 <option value="Finlande">Finlande </option>
                                 <option value="France">France </option>
                                 <option value="Gabon">Gabon </option>
                                 <option value="Gambie">Gambie </option>
                                 <option value="Georgie">Georgie </option>
                                 <option value="Ghana">Ghana </option>
                                 <option value="Gibraltar">Gibraltar </option>
                                 <option value="Grece">Grece </option>
                                 <option value="Grenade">Grenade </option>
                                 <option value="Groenland">Groenland </option>
                                 <option value="Guadeloupe">Guadeloupe </option>
                                 <option value="Guam">Guam </option>
                                 <option value="Guatemala">Guatemala</option>
                                 <option value="Guernesey">Guernesey </option>
                                 <option value="Guinee">Guinee </option>
                                 <option value="Guinee_Bissau">Guinee_Bissau </option>
                                 <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                 <option value="Guyana">Guyana </option>
                                 <option value="Guyane_Francaise ">Guyane_Francaise </option>
                                 <option value="Haiti">Haiti </option>
                                 <option value="Hawaii">Hawaii </option>
                                 <option value="Honduras">Honduras </option>
                                 <option value="Hong_Kong">Hong_Kong </option>
                                 <option value="Hongrie">Hongrie </option>
                                 <option value="Inde">Inde </option>
                                 <option value="Indonesie">Indonesie </option>
                                 <option value="Iran">Iran </option>
                                 <option value="Iraq">Iraq </option>
                                 <option value="Irlande">Irlande </option>
                                 <option value="Islande">Islande </option>
                                 <option value="Israel">Israel </option>
                                 <option value="Italie">italie </option>
                                 <option value="Jamaique">Jamaique </option>
                                 <option value="Jan Mayen">Jan Mayen </option>
                                 <option value="Japon">Japon </option>
                                 <option value="Jersey">Jersey </option>
                                 <option value="Jordanie">Jordanie </option>
                                 <option value="Kazakhstan">Kazakhstan </option>
                                 <option value="Kenya">Kenya </option>
                                 <option value="Kirghizstan">Kirghizistan </option>
                                 <option value="Kiribati">Kiribati </option>
                                 <option value="Koweit">Koweit </option>
                                 <option value="Laos">Laos </option>
                                 <option value="Lesotho">Lesotho </option>
                                 <option value="Lettonie">Lettonie </option>
                                 <option value="Liban">Liban </option>
                                 <option value="Liberia">Liberia </option>
                                 <option value="Liechtenstein">Liechtenstein </option>
                                 <option value="Lituanie">Lituanie </option>
                                 <option value="Luxembourg">Luxembourg </option>
                                 <option value="Lybie">Lybie </option>
                                 <option value="Macao">Macao </option>
                                 <option value="Macedoine">Macedoine </option>
                                 <option value="Madagascar">Madagascar </option>
                                 <option value="Madère">Madère </option>
                                 <option value="Malaisie">Malaisie </option>
                                 <option value="Malawi">Malawi </option>
                                 <option value="Maldives">Maldives </option>
                                 <option value="Mali">Mali </option>
                                 <option value="Malte">Malte </option>
                                 <option value="Man">Man </option>
                                 <option value="Mariannes du Nord">Mariannes du Nord </option>
                                 <option value="Maroc">Maroc </option>
                                 <option value="Marshall">Marshall </option>
                                 <option value="Martinique">Martinique </option>
                                 <option value="Maurice">Maurice </option>
                                 <option value="Mauritanie">Mauritanie </option>
                                 <option value="Mayotte">Mayotte </option>
                                 <option value="Mexique">Mexique </option>
                                 <option value="Micronesie">Micronesie </option>
                                 <option value="Midway">Midway </option>
                                 <option value="Moldavie">Moldavie </option>
                                 <option value="Monaco">Monaco </option>
                                 <option value="Mongolie">Mongolie </option>
                                 <option value="Montserrat">Montserrat </option>
                                 <option value="Mozambique">Mozambique </option>
                                 <option value="Namibie">Namibie </option>
                                 <option value="Nauru">Nauru </option>
                                 <option value="Nepal">Nepal </option>
                                 <option value="Nicaragua">Nicaragua </option>
                                 <option value="Niger">Niger </option>
                                 <option value="Nigeria">Nigeria </option>
                                 <option value="Niue">Niue </option>
                                 <option value="Norfolk">Norfolk </option>
                                 <option value="Norvege">Norvege </option>
                                 <option value="Nouvelle_Caledonie">Nouvelle_Caledonie </option>
                                 <option value="Nouvelle_Zelande">Nouvelle_Zelande </option>
                                 <option value="Oman">Oman </option>
                                 <option value="Ouganda">Ouganda </option>
                                 <option value="Ouzbekistan">Ouzbekistan </option>
                                 <option value="Pakistan">Pakistan </option>
                                 <option value="Palau">Palau </option>
                                 <option value="Palestine">Palestine </option>
                                 <option value="Panama">Panama </option>
                                 <option value="Papouasie_Nouvelle_Guinee">Papouasie_Nouvelle_Guinee </option>
                                 <option value="Paraguay">Paraguay </option>
                                 <option value="Pays_Bas">Pays_Bas </option>
                                 <option value="Perou">Perou </option>
                                 <option value="Philippines">Philippines </option>
                                 <option value="Pologne">Pologne </option>
                                 <option value="Polynesie">Polynesie </option>
                                 <option value="Porto_Rico">Porto_Rico </option>
                                 <option value="Portugal">Portugal </option>
                                 <option value="Qatar">Qatar </option>
                                 <option value="Republique_Dominicaine">Republique_Dominicaine </option>
                                 <option value="Republique_Tcheque">Republique_Tcheque </option>
                                 <option value="Reunion">Reunion </option>
                                 <option value="Roumanie">Roumanie </option>
                                 <option value="Royaume_Uni">Royaume_Uni </option>
                                 <option value="Russie">Russie </option>
                                 <option value="Rwanda">Rwanda </option>
                                 <option value="Sahara Occidental">Sahara Occidental </option>
                                 <option value="Sainte_Lucie">Sainte_Lucie </option>
                                 <option value="Saint_Marin">Saint_Marin </option>
                                 <option value="Salomon">Salomon </option>
                                 <option value="Salvador">Salvador </option>
                                 <option value="Samoa_Occidentales">Samoa_Occidentales</option>
                                 <option value="Samoa_Americaine">Samoa_Americaine </option>
                                 <option value="Sao_Tome_et_Principe">Sao_Tome_et_Principe </option>
                                 <option value="Senegal">Senegal </option>
                                 <option value="Seychelles">Seychelles </option>
                                 <option value="Sierra Leone">Sierra Leone </option>
                                 <option value="Singapour">Singapour </option>
                                 <option value="Slovaquie">Slovaquie </option>
                                 <option value="Slovenie">Slovenie</option>
                                 <option value="Somalie">Somalie </option>
                                 <option value="Soudan">Soudan </option>
                                 <option value="Sri_Lanka">Sri_Lanka </option>
                                 <option value="Suede">Suede </option>
                                 <option value="Suisse">Suisse </option>
                                 <option value="Surinam">Surinam </option>
                                 <option value="Swaziland">Swaziland </option>
                                 <option value="Syrie">Syrie </option>
                                 <option value="Tadjikistan">Tadjikistan </option>
                                 <option value="Taiwan">Taiwan </option>
                                 <option value="Tonga">Tonga </option>
                                 <option value="Tanzanie">Tanzanie </option>
                                 <option value="Tchad">Tchad </option>
                                 <option value="Thailande">Thailande </option>
                                 <option value="Tibet">Tibet </option>
                                 <option value="Timor_Oriental">Timor_Oriental </option>
                                 <option value="Togo">Togo </option>
                                 <option value="Trinite_et_Tobago">Trinite_et_Tobago </option>
                                 <option value="Tristan da cunha">Tristan de cuncha </option>
                                 <option value="Tunisie">Tunisie </option>
                                 <option value="Turkmenistan">Turmenistan </option>
                                 <option value="Turquie">Turquie </option>
                                 <option value="Ukraine">Ukraine </option>
                                 <option value="Uruguay">Uruguay </option>
                                 <option value="Vanuatu">Vanuatu </option>
                                 <option value="Vatican">Vatican </option>
                                 <option value="Venezuela">Venezuela </option>
                                 <option value="Vierges_Americaines">Vierges_Americaines </option>
                                 <option value="Vierges_Britanniques">Vierges_Britanniques </option>
                                 <option value="Vietnam">Vietnam </option>
                                 <option value="Wake">Wake </option>
                                 <option value="Wallis et Futuma">Wallis et Futuma </option>
                                 <option value="Yemen">Yemen </option>
                                 <option value="Yougoslavie">Yougoslavie </option>
                                 <option value="Zambie">Zambie </option>
                                 <option value="Zimbabwe">Zimbabwe </option>
                              </select>
                           </div>
                           <div class="form-group row">
                            <div class="col-md-6">
                              <label for="c_fname_adresse" class="text-black">Prénom <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="c_fname_adresse" name="c_fname_adresse" placeholder="Prénom" value="<?php echo $AdresseDonnees->Prenom; ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname_adresse" class="text-black">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_lname_adresse" name="c_lname_adresse" placeholder="Nom" value="<?php echo $AdresseDonnees->Nom; ?>">
                            </div>
                          </div>
                           <div class="form-group row">
                              <div class="col-md-12">
                                 <label for="c_address" class="text-black">Addresse <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Addresse postal" value="<?php echo $AdresseDonnees->Adresse; ?>">
                              </div>
                           </div>
                           <div class="form-group">
                              <input type="text" class="form-control" id="c_comp_address" name="c_comp_address" placeholder="Bâtiment, étage, lieu-dit, indication au livreur, etc. " value="<?php echo $AdresseDonnees->AdresseComplement; ?>">
                           </div>
                           <div class="form-group row">
                              <div class="col-md-6">
                                 <label for="c_ville" class="text-black">Ville <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" id="c_ville" name="c_ville" value="<?php echo $AdresseDonnees->Ville; ?>">
                              </div>
                              <div class="col-md-6">
                                 <label for="c_postal_zip" class="text-black">Code postal <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip" value="<?php echo $AdresseDonnees->CodePostal; ?>">
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-12">
                                 <label for="c_state_country" class="text-black">État / Région / Canton <span class="text-danger">*</span></label>
                                 <input type="text" class="form-control" id="c_state_country" name="c_state_country" value="<?php echo $AdresseDonnees->Region; ?>">
                              </div>
                           </div>
                           <div class="form-group row">
                            <div class="col-md-12">
                              <label for="c_phone" class="text-black">Téléphone <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="c_phone_adresse" name="c_phone_adresse" placeholder="Numéro de téléphone" value="<?php echo $AdresseDonnees->Telephone; ?>">
                            </div>
                          </div>
                          <div class="form-group mb-4">
                            <label for="c_order_notes" class="text-black">Notes au livreur</label>
                            <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Ecrivez vos éventuelles notes au livreur..." value="<?php echo $AdresseDonnees->Note; ?>"></textarea>
                          </div>
                          <div class="form-group mb-4">
                              <?php if(!$isPrefere)
	                            { ?>
                              <label for="c_is_prefere" class="text-black"><input name="c_is_prefere" value="1" id="c_is_prefere" type="checkbox" /> &nbsp; Cette adresse sera maintenant votre adresse par défaut ?</label>
                            <?php } else {?>
                            <input type='hidden' name='addParDefaut' value='1'/>
                            <label for="c_is_prefere" class="text-black"><input name="c_is_prefere" value="1" id="c_is_prefere" type="checkbox" checked disabled/> &nbsp; Ajouter cette adresse en temps qu'adresse par défaut</label>
                            <p class="text-black text-center small">(Cette adresse est votre adresse par defaut, vous ne pouvez pas avoir aucune adresse par defaut)</p>
                            <?php } ?>
                          </div>

                  <span id="alerteInfo">
                  <?php
                        if (!empty ($_GET["leretour"]))
                          {
                            echo '<div class="form-group row"><div class="col-lg-12"><div class="error-msg alert alert-danger"><div class="clearfix bshadow0 pbs"><span class="icon-exclamation-circle"></span> &nbsp'. $_GET["leretour"]. '</div></div></div></div>';
                          }
                  ?>
                  </span>

                  <input type='hidden' name='idAdresse' value='<?php echo $AdresseDonnees->IdAdresse; ?>'/>
                  <input type='hidden' name='action' value='4'/>

                  <div class="form-group row mb-0">
                    <div class="col-lg-12">
                      <span id='leSubmit'><input type="submit" class="btn btn-primary btn-lg btn-block" value="Modifier l'adresse"  name="FormModifierUneAdresse" class="special"/></span>
                    </div>
                </div>

            </form>
         </div>
         <div class="col-md-3"></div>
      </div>
   </div>
</div>
</div>
</div>

<script type="text/javascript">

document.FormModifierUneAdresse.reset();

</script>
