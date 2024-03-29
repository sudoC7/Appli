

<?php
	session_start();
	ob_start();
?>
	
<?php 
    $title = "Ajout produit";
    #other php code here
?>

	<div class="container h-100 d-flex justify-content-center align-items-center" > 
      	
		<div class="d-flex flex-column mx-auto p-2">

			<div class="d-flex flex-column">

			<!-- Le deux boutons d'en haut "panier" et "ajouter le produit"  -->
				<div class="mb-5">
					<button class="btn btn-primary">Ajouter produit</button>
					<a href="recap.php" class="text-reset text-decoration-none">
						<button type="button" class="btn btn-light text-primary position-relative">
						Panier
						<?php
							// session_start();
							require('functions.php');
							nbrShop();
						?> 
						</button>
					</a>
				</div>

				<h1 class="text-primary">Ajouter un produit</h1>

				<!-- Lz formulaire -->
				<form action="traitement.php?action=add" class="d-flex flex-column" method="post">
					
					<label class="mb-2">
						<p class="mb-0">Nom du produit : </p>
						<input class="rounded" type="text" name="name">
					</label>
						
					<label class="mb-2">
						<p class="mb-0">Prix du produit en € : </p>
						<input class="rounded" type="number" step="any" name="price">
					</label>
					
					<label class="mb-2">
						<p class="mb-0">Quantité désirée :</p>
						<input class="rounded" type="number" name="qtt">
					</label>
					
					<!-- boutton ajout de produit -->
					<label>
						<input type="submit" class="btn btn-primary" name="submit" value="Ajouter le produit">
					</label>
				</form>

				<?php 
					if (isset($_SESSION['messageAlert'])) {
						echo $_SESSION['messageAlert'];
					}
				?>
				
			</div>
	  	</div>
	</div>


<?php	
	$content = ob_get_clean();
	require_once "template.php";
?>