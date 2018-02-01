<?php include('connexion.php');
	  include('menu.php');
	  //obtenir la date UTC
	  
	$msg="";
	if (isset($_POST['btnValider'])){
		/*echo '<pre>';
		print_r ($_FILES['image']);die();*/
		if (move_uploaded_file($_FILES['image']['tmp_name'], 'upload/'.$_FILES['image']['name'])) { 
			$sql= "INSERT INTO client ( nom, prenom,email, mdp, telephone, image) 
				VALUES (
					'".$_POST['nom']."', 
					'".$_POST['prenom']."',
					'".$_POST['email']."',
					'".$_POST['mdp']."', 
					'".$_POST['telephone']."', 
					'".$_FILES['image']['name']."')";

			 if (isset($_GET['id'])){
			$sql="UPDATE client SET 
					nom='".$_POST['nom']."', 
					prenom='".$_POST['prenom']."',
					email='".$_POST['email']."',
					mdp='".$_POST['mdp']."', 
					telephone='".$_POST['telephone']."', 
					image='".$_FILES['image']['name']."' WHERE id=".$_GET['id'];
		}
			$result=mysqli_query($link ,$sql);
			if ($result) {
				$msg='<h3 style="color:green">super!Insertion reussie!</h3>';
			}else{
				$msg=mysqli_error($link);
			}
		}
		
	}
	if (isset($_GET['id'])){
	$update="SELECT * FROM client WHERE id=".$_GET['id'];
	$res=mysqli_query($link, $update);
	$dataU=mysqli_fetch_array($res);
}
if (isset($_GET['sup'])){
	$delete="DELETE FROM client WHERE id=".$_GET['sup'];
	$res=mysqli_query($link, $delete);
}
?>
 <!DOCTYPE html>
			

			<br><br>
		<div class="container" style=";height:100%; width: 80%">

			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8" style="background-color: white;">

					<form action="" method="POST" role="form" enctype="multipart/form-data">
						
			<legend style="color:green; text-align:center">BIENVENU A VOUS CHER CLIENT!</legend> <span> <?php echo $msg; ?> </span>
						<span> <?php echo $msg; ?> </span>
					
						
						<div class="form-group">
							<label for="">Nom</label>
							<input name="nom" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['nom']; ?>" class="form-control" id="" placeholder="Entrez le nom" required>
						</div>
						<div class="form-group">
							<label for="">Prénoms</label>
							<input name="prenom" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['prenom']; ?>" class="form-control" id="" placeholder="Entrez le(s) prénom(s)" required>
						</div>

						
						<div class="form-group">
							<label for="">email</label>
							<input name="email" type="email" required value="<?php if (isset ($_GET['id'])) echo $dataU['email']; ?>" class="form-control" id="" placeholder="Entrez votre adresse email">
						</div>

						<div class="form-group">
							<label for="">Mot de passe</label>
							<input name="mdp" type="password" value="<?php if (isset ($_GET['id'])) echo $dataU['mdp']; ?>" class="form-control" id="" placeholder="Entrez le mot de passe" required>
						</div>

						<div class="form-group">
							<label for="">telephone</label>
							<input name="telephone" type="text" value="<?php if (isset ($_GET['id'])) echo $dataU['telephone']; ?>" class="form-control" id="" placeholder="Entrez le(s) telephone(s)" required>
						</div>

						<div class="form-group">
							<label for="">image</label>
							<input name="image" type="file" class="form-control" id="" placeholder=" Choisissez une image" required value="<?php if (isset ($_GET['id'])) echo $dataU['image']['name']; ?>">
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
				</div><table class="table" border="2">
					<thead>
						<tr>
							<th>Numero</th>
							<th>Noms</th>
							<th>Prenoms</th>
							<th>Emails</th>
							<th>mot de passe</th>
							<th>telephone</th>
							<th>image</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$n=1;
							$list=" SELECT * FROM client";																	
							$res= mysqli_query($link,$list);
							while ($data = mysqli_fetch_array($res)){
								
							
						 ?>
						<tr>
							<td><?php echo $n; ?> </td>
							<td><?php echo $data['nom']; ?></td>
							<td><?php echo $data['prenom']; ?></td>
							<td><?php echo $data['email']; ?></td>
							<td><?php echo $data['mdp']; ?></td>
							<td><?php echo $data['telephone']; ?></td>
							<td><img src="upload/<?php echo $data['image'];  ?>" width="50px" height="50px" alt=""></td>
							
							<td>
								<a href="?id=<?php echo $data['id']; ?>" class="btn btn-primary">Modifier</a>
								<a href="?sup=<?php echo $data['id']; ?>" class="btn btn-warning">Supprimer</a>
							</td>
						</tr>
						<?php $n++;
						 } 
						?>
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