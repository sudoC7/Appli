<!DOCTYPE html>
<html> 
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ">
		<title>Ajout produit</title>
		<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css"></link>
	</head>
	<body>
	<div class="container h-100 d-flex justify-content-center align-items-center" > <!--    class="container h-100 d-flex justify-content-center align-items-center"            class="container-xl mx-auto p-5"             class="container"  style="width: 400px;"-->
      	
		<div class="d-flex flex-column mx-auto p-2">

			<div class="d-flex flex-column">

				<div class="mb-5">
					<button class="btn btn-primary">Ajouter produit</button>
					<a href="recap.php" class="btn btn-light text-primary">Panier</a>
					<!-- <button class="btn btn-light text-primary" >Panier</button> -->
				</div>
				<h1 class="text-primary">Ajouter un produit</h1>
				<form action="traitement.php" class="d-flex flex-column" method="post">
					
					<!-- <label class="nav_wrapper padding"> -->
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
					
					<label>
						<input type="submit" class="btn btn-primary" name="submit" value="Ajouter le produit">
					</label>
					
				</form>
				<div class=" border m-3 p-3 alert alert-success" role="alert">
					<p>Votre produit à bien été enregistré !</p>
				</div>
				
				
			</div>
	  	</div>
	</div>


	<!-- <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script> -->
	</body>
</html>



<!-- Client(Navigateur) envoie la requete HTTP/GET au Serveur -->
