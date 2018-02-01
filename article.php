<?php include('connexion.php');
	  include('menu.php');

	  
 ?>


<?php
	$msg="";
	if (isset($_POST['btnComment'])){
			
		$sql= "INSERT INTO commentaires (description, id_articles)
		 VALUES ('".$_POST['description']."')";
		$result=mysqli_query($link,$sql);
		if ($result) {
			$msg='Article commenté!';
		}else{
			$msg=mysqli_error($link);
		}
	}
?>

 <!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!--navigateur internet Exploreur-->
		<meta name="Viewport" content="witdth=device-width, initial-scale=1">
		<meta neme="description" content="c'est un blog">
		<meta name="author" content="Marie Danielle YEBOUA">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/article.css">

		<title>Le Blog de Marie Danielle YEBOUA</title>

	</head>

	<body>

		<div class="container" style="opacity: 0.85; padding:10px;">
			<div class="row-padding">

				<?php
				// Connexion à la base de données
				// une autre manière de se connecter à la base de données
					try
					{
						$bdd = new PDO('mysql:host=localhost;dbname=db_blog;charset=utf8', 'root', '');
					}
					catch(Exception $e)
					{
					        die('Erreur : '.$e->getMessage());
					}

					// On récupère l'article selectionné
					$req = $bdd->prepare('SELECT id, titre, description, image FROM articles WHERE id=?');
					$req->execute(array($_GET['articles']));
					$donnees = $req->fetch();
					?>

				<div class="col-md-12">
					<div class="card jumbotron">
					  <div class="card-body">
					  	<h3 class="text-center" style="color:blue"><!-- htmlspecialchars : permet de proteger les textes -->
							<?php echo htmlspecialchars($donnees['titre']); ?>
						</h3><br>
						<div class="text-center">
					  	<img src="upload/<?php echo $donnees['image'];?>"  alt="Image article" class="img-rounded" />
					  	</div><br>

					  	<p class="text-center" style="font-size:15px">	<?php
							// On affiche le contenu de l'article
							// nl2br Elle permet  de convertir les  retours  à la ligne en balises  HTML  <br />
							echo nl2br(htmlspecialchars($donnees['description']));
							?>
						</p>
					  	
					  </div>
					</div>
				</div>

				<form action="" method="POST" role="form">

					<h2>Commentaires</h2>

					<?php
					 // Fin de la boucle des articles
						$req->closeCursor();
					

						// Récupération des commentaires
						$req = $bdd->prepare('SELECT description FROM commentaires WHERE id_articles = ?');
						$req->execute(array($_GET['articles']));
						while ($donnees = $req->fetch())
						{
					?>

					<p><?php echo nl2br(htmlspecialchars($donnees['description'])); ?></p>

					<?php
						} // Fin de la boucle des commentaires
						$req->closeCursor();
					?>

					<p>
	       				<label for="commenter">Commentez l'article</label><br />
	       				<textarea name="description" id="" rows="3" ></textarea>
	   				</p>
	   				<button name="btnComment" type="submit" class="btn btn-primary">Commenter</button>

   				</form>
			</div>
		</div>

		<script type="text/javascript" src="js/bootstrap.js"></script>
	</body>
</html>