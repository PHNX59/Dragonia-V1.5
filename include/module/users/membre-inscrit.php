<?php	
	include('../include/module/users/count-players.php');
    try 
	{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=mc_auth;charset=utf8', 'mc_auth', 'D23btGB36wU27d1g');
	}
	catch(Exception $e) 
	{ 
	die('Erreur : '.$e->getMessage());
	}
?>


	<div class="card" style="background-color: #0f1117;">
		<div class="card-body">
			<div class="titre-inscrit" style="font-size: 12px;">Derniers membres inscrits
				<button class="btn btn-icon btn-round btn-default btn-xs float-right" type="button" data-target="#reduire1" data-toggle="collapse" aria-expanded="true" aria-controls="reduire1"><i class="fa fa-minus"></i></button>
			</div>
			
			<section id="reduire1" class="ollapse">
						<div class="card-list">
						<?php $reponse = $bdd->query('SELECT * FROM users ORDER BY date DESC LIMIT 5'); while ($donnees = $reponse->fetch()) { ?>
					<?php echo"	<div class='item-list'>
								<div class='avatar'>
									<img style='border: solid; border-color: #00d0ff9c;' src='../uploads/avatar/".$donnees['avatar']."' alt='...' class='avatar rounded-circle'/>
								</div>
									<div class='info-user ml-3'> 
										<div class='pseudo'><i class='".$donnees['icon']."'></i> ".$donnees['username']." <font size='1px' color=".$donnees['color_groupe']."> (".$donnees['groupe'].")</font></div>
										<div class='view'><a href='../pages/view_profil.php?id=".$donnees['id']."'>Voir le profil </div></a>
									</div>
							</div>";?> <?php } $reponse->closeCursor(); ?>
						</div>
			</section>
			
		</div>
		<div class="card-footer">
		<p><center><font color="white" style="font-size: 9px;">Utilisateurs enregistrés</font> <font color="green" style="font-size: 9px;">[ <?php echo $membercount;?> ]</p></center></font>
		</div>
	</div>
