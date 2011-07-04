					<script type="text/javascript">
					<!--
						function couleur(obj){
							obj.style.backgroundColor = "#FFFFFF";
						}						
						function verif(email) {
							var reg = /^[a-z0-9._-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$/
							return (reg.exec(email) != null)
						}
						function check(){
							formulaire = document.forms['contact-form'];
							var msg = "";
							var email = formulaire.elements['email'].value;
							
							if (email != ""){
								if (!verif(email)){
									formulaire.elements['email'].value = "";
									formulaire.elements['email'].style.backgroundColor = "#DEB887";
									msg += "L'adresse email est incorrect\n";
								}
							}
							else{
								formulaire.elements['email'].style.backgroundColor = "#DEB887";
								msg += "Veuillez saisir votre adresse email\n";
							}
							
							if (formulaire.elements['nom'].value == ""){
								msg += "Veuillez saisir votre nom\n";
								formulaire.elements['nom'].style.backgroundColor = "#DEB887";
							}

							if (formulaire.elements['sujet'].value == ""){
								msg += "Veuillez saisir l'objet de l'email\n";
								formulaire.elements['sujet'].style.backgroundColor = "#DEB887";
							}

							if (formulaire.elements['message'].value == ""){
								msg += "Veuillez saisir votre message\n";
								formulaire.elements['message'].style.backgroundColor = "#DEB887";
							}
							
							if (formulaire.elements['code'].value == ""){
								msg += "Veuillez saisir le code de sécurité\n";
								formulaire.elements['code'].style.backgroundColor = "#DEB887";
							}
							
							if (msg == "") return(true);
							else{
								alert(msg);
								return(false);
							}
						}
					//-->
					</script>
					<h1>Coordonnées</h1>
					<p class="subtitle">Voici mes différentes coordonnées : </p>
					<ul>
						<li><span>Téléphone : </span>06 78 68 20 00</li>
						<li><span>Courriel : </span><a href="mailto:adjir.soumia@gmail.com">adjir.soumia@gmail.com</a></li>
						<li><span>Adresse : </span>
							<p class="adresse">Soumia ADJIR<br />
							41 rue des Blancs-Rieux<br />
							59195 Hérin<br />
							FRANCE</p>
						</li>
					</ul>
	<?php if (empty($_POST)){ ?>
					<h1>Formulaire de contact</h1>
					<p class="desc">Vous désirez me contacter mais vous n'avez pas les outils pour, c'est ici :</p>
					<p class="info">les champs suivis du symbole * sont obligatoires</p>
					<form id="contact-form" action="traitement_message.php" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return check();">
						<table id="contact-table">
							<tr>
								<td><label for="nom">Nom *</label></td>
								<?php echo '<td><input class="textfield" name="nom" id="nom" type="text" size="40" value="'.$_SESSION['nom'].'" onkeyup="javascript:couleur(this);" /></td>'."\n"; ?>
							</tr>
							<tr>
								<td><label for="societe">Société</label></td>
								<?php echo '<td><input class="textfield" name="societe" id="societe" type="text" size="40" value="'.$_SESSION['societe'].'" onkeyup="javascript:couleur(this);" /></td>'."\n"; ?>
							</tr>
							<tr>
								<td><label for="email">Courriel *</label></td>
								<?php echo '<td><input class="textfield" name="email" id="email" type="text" size="40" value="'.$_SESSION['email'].'" onkeyup="javascript:couleur(this);" /></td>'."\n"; ?>
							</tr>
							<tr>
								<td><label for="sujet">Sujet *</label></td>
								<?php echo '<td><input class="textfield" name="sujet" id="sujet" type="text" size="40" value="'.$_SESSION['sujet'].'" onkeyup="javascript:couleur(this);" /></td>'."\n"; ?>
							</tr>
							<tr>
								<td id="message-label-cell"><label for="message">Message *</label></td>
								<?php echo '<td><textarea class="textfield" name="message" id="message" cols="56" rows="10" onkeyup="javascript:couleur(this);">'.$_SESSION['message'].'</textarea></td>'."\n"; ?>
							</tr>
							<tr>
								<td><label>Code *</label></td>
								<td>
									<img id="siimage" style="float:left;" src="securimage_show.php?sid=<?php echo md5(time()) ?>" alt="captcha" />
									<br />
									<a tabindex="-1" style="border-style: none" href="" title="Refresh Image" onclick="document.getElementById('siimage').src = 'securimage_show.php?sid=' + Math.random(); return false"><img src="images/refresh.gif" style="margin-top:-3px;" alt="Reload Image" onclick="this.blur()" /></a>
									<div style="clear: both"></div>
								</td>
							</tr>
							<tr>
								<td><label>Saisie : </label></td><td><input type="text" name="code"  onkeyup="javascript:couleur(this);" /></td>
							</tr>
							<tr>
								<td></td>
								<td><input name="sendcopy[]" id="sendcopy" type="checkbox" value="oui" /><label for="sendcopy">Envoyer une copie du message sur le courriel donné ci-dessus</label></td>
							</tr>
							<tr>
								<td></td>
								<td id="contact-submit-cell">
									<script type="text/javascript">
									<!--
										document.write("<input class=\"button\" type=\"submit\" name=\"envoi\" value=\"Envoyer\" />");
									//-->
									</script>
									<noscript>
										<p>Veuillez activer le Javascript sur votre navigateur, s'il vous plaît!</p>
									</noscript>
								</td>
							</tr>
						</table>
					</form>
<?php }; ?>
