<?php include('connexion.php');
	  include('menu.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) 
		{
			$sql= "INSERT INTO articles (titre,description,image,id_categories, id_users) 
			VALUES (
					'".mysqli_real_escape_string($link,$_POST['titre'])."',
					 '".mysqli_real_escape_string($link,$_POST['description'])."',
					 '".($_FILES['image']['name'])."', 
					 '".($_POST['categories'])."', 
					 '".($_POST['users'])."')";
			if (isset($_GET['id']))
				{
					$sql="UPDATE articles SET titre='".$_POST['titre']."', 
					description='".$_POST['description']."', 
					image='".$_FILES['image']['name']."', 
					id_categories='".$_POST['categories']."', 
					id_users='".$_POST['users']."' WHERE id=".$_GET['id']; 
	 			} 
			$result=mysqli_query($link ,$sql);
			if ($result) {
				$msg='<h3 style="color:green">Insertion reussie!</h3>';
			}else{
				$msg=mysqli_error($link);
			}
		}
		
}
	if (isset($_GET['id'])){
	$update="SELECT * FROM articles WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
	}
	if (isset($_GET['sup'])){
	$delete="DELETE FROM articles WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
	}
?>
 <!DOCTYPE html>
			

			<a style="background-color: orange" type="submit" class="btn btn-lg" id="btnValider" value="enregistrer" name="btnValider" href="accueil.php">Allez à accueil </a>


		<div class="container">

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" style="background-color: white;">

					<form action="" method="POST" role="form" enctype="multipart/form-data">
						<h1 style="color: blue">ARTICLES</h1>
			<legend>Formulaire</legend> <span> <?php echo $msg; ?> </span>
						<span> <?php echo $msg; ?> </span>
					
						<div class="form-group">
							<label for="">Titre</label>
							<input name="titre" type="text" class="form-control" id="" placeholder="Entrer le titre" required value="<?php if (isset ($_GET['id'])) echo $dataU['titre']; ?>">
						</div>

						<div class="form-group">
							<label for="">description</label>
							<textarea name="description" type="text" class="form-control textarea" id="" required placeholder="Description de l'article"></textarea>
						</div>
						<div class="form-group">
							<label for="">image</label>
							<input name="image" type="file" class="form-control" id="" placeholder=" Choisissez une image" required value="<?php if (isset ($_GET['id'])) echo $dataU['image']['name']; ?>">
						</div>
						<div class="form-group">
							<label for="">Categories</label>
							<select name="categories" class="form-control">
					<?php
					//recupere toutes les categories dans la bd
					$sqlcategorie="SELECT * FROM categories";
					//execute la requete et on la stock dans $repcategorie
					$repcategorie=mysqli_query($link,$sqlcategorie);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($datacat=mysqli_fetch_array($repcategorie)) {
						?>
						<option value="<?php echo $datacat['id'];?>">
						<?php echo $datacat['libelle'];?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						</div>
						<div class="form-group">
							<label for="">Utilisateurs</label>
							<select name="users" class="form-control">
					<?php
					//recupere toutes les categories dans la bd
					$sqlusers="SELECT * FROM users";
					//execute la requete et on la stock dans $repcategorie
					$repusers=mysqli_query($link,$sqlusers);
					//mysqli_fetch_array = permet de tran sformer le resultat $repcategorie en variable de type tableau $datacat
					// la boucle while nous permet de parcourir le tableau $datacat et de recuperer les valeurs de chaques elements du tableau $datacat
					while ($datausers=mysqli_fetch_array($repusers)) {
						?>
						<option value="<?php echo $datausers['id'];?>">
						<?php echo $datausers['nom'].' '.$datausers['prenom'];?>
							
						</option>

						<?php
					}
					?>
								
							</select>
						</div>
						<div style="text-align: center;">
						<button type="submit" class="btn btn-success btn-lg btn-block" id="btnValider" value="enregistrer" name="btnValider">Valider</button>
						</div>
					</form>
				</div>
			</div>
<br>
			<div class="row"> 
				<div class="col-md-2"></div>
				<div class="col-md-8" style="background-color: white;">
				</div>
				<table class="table" border="2">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Titre</th>
							<th>Resumé</th>
							<th>Image</th>
							<th>Categories</th>
							<th>Utilisateurs</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT 
										titre,
										description,
										image,
										libelle,
										nom,
										prenom,
										articles.id
									FROM articles
									INNER JOIN categories
									ON categories.id = articles.id_categories
									INNER JOIN users
									ON users.id = articles.id_users
									";

							$res= mysqli_query($link,$list);
	while ($data = mysqli_fetch_array($res))
		{						
							
						 ?>
						<tr>
							<td> <?php echo $n; ?> </td>
							<td><?php echo $data['titre']; ?></td>
							<td><?php echo substr($data['description'], 0, 50) ; ?>...</td>
							<td><img src="upload/<?php echo $data['image'];  ?>" width="50px" height="50px" alt=""></td>
							<td><?php echo $data['libelle']; ?></td>
							<td><?php echo $data['nom'].' '.$data['prenom']; ?></td>
							<td>
								<a href="?id=<?php echo $data['id']; ?>" class="btn btn-primary">Modifier</a><br><br>
								<a href="?sup=<?php echo $data['id']; ?>" class="btn btn-warning">Supprimer</a>
							</td>
						</tr>
						<?php $n++;
						 } ?>
					</tbody>
				</table>
				</div>
			</div>

		</div>
		

		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/control.js"></script>
	</body>
</html>