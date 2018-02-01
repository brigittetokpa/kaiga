<?php include('connexion.php');
	   include('menu.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		$sql= "INSERT INTO codeuses (nom,prenom,email,date de naissance,telephone,mot de passe,resume,photo) VALUES ('".$_POST['nom']."','".$_POST['prenom']."','".$_POST['email']."','".$_POST['date de naissance']."','".$_POST['telephone']."','".$_POST['mot de passe']."','".$_POST['resume']."','".$_POST['photo']."')";$result=mysqli_query($link,$sql);
		if ($result) {
			$msg='Insertion reussie';
		}else{
			$msg=mysqli_error($link);
		}
	}

	if (isset($_GET['id']))
	{
		$update="SELECT * FROM codeuses WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

if (isset($_GET['sup']))
	{
		$delete="DELETE  FROM codeuses WHERE id=".$_GET['sup'];
		$res=mysqli_query($link,$delete);
	}
	

 ?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.css" >

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<head>
	<title> inscription</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="description" content="INSCRIPTION">
	<link rel="style sheet" href="style.css">
</head>
<body>
	<header>
		<h1>  PAGE INSCRIPTION</h1>
	</header>
	<nav>
					
						<div class="form-group">
							<label for="">Nom</label>
							<input name="nom" type="text" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['nom']; ?>" id="" placeholder="Entrer le nom">
						</div>

						<div class="form-group">
							<label for="">Prenom</label>
							<input name="prenom" type="text" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['prix']; ?>"  id="" placeholder="Entrer le prenom">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input name="email" type="text" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['email']; ?>" id="" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="">Date de naissance</label>
							<input name="date de naissance" type="text" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['date de naissance']; ?>" id="" placeholder="Date de naissance">
						</div>
						<div class="form-group">
							<label for="">Telephone</label>
							<input name="telephone" type="text" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['telephone']; ?>" id="" placeholder="Telephone">					
						</div>
						<div class="form-group">
							<label for="">Mot de passe</label>
							<input name="mot de passe" type="text" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['mot de passe']; ?>" id="" placeholder="mot de passe">				
								</div>

						<div class="form-group">
							<label for="">Photo</label>
			<input name="photo" type="file" class="form-control" value="<?php if (isset($_GET['id'])) echo $dataU['photo']; ?>" id="" placeholder="Photo">
						</div>

						<div class="form-group">
							<label for="">resume</label>
							<div class="select">
								<select class="form-control" name="resume" class=form-control" value="">
									<?php 

										$n=1;
										$list="SELECT * FROM codeuses";
										$res= mysqli_query($link,$list);
										while ($data=mysqli_fetch_array($res)){

										
									?>
										<option><?php echo $data['libelle']; ?></option>

									<?php
										$n++;
										}
									?>
									
								</select><br>
						</div>
							
						<button name="btnValider" type="submit" class="btn btn-primary btn-lg btn-block">Valider</button>
					</form>
				</div></div>
				<div class="col-md-2"></div>
			</div>

				</div>
			
			<?php
			//recuperer toutes les categories dans la bd 
					if(isset($_POST["submit"]))
						{


						if(isset($_GET['id']))
							{ 

								$sql="UPDATE codeuses SET 
								nom='".$_POST['nom']."',
								prenom='".$_POST['prenom']."',
								email='".$_POST['email']."',
								date de naissance='".$_POST['date de naissance']."',
								mot de passe='".$_POST['mot de passe']."',
								telephone='".$_POST['telephone']."',
								photo='".$_POST['photo']."',
								id_codeuses='".$_POST['id_codeuses']."', WHERE id=".$_GET['id'];
							}else
								{
						
									$sql="INSERT INTO codeuses(nom,prenom,email,date de naissance,telephone,mot de passe,photo) 
									VALUES(
											'".$_POST["nom"]."',
											'".$_POST["prenom"]."',
											'".$_POST["email"]."',
											'".$_POST["date de naissance"]."',
											'".$_POST["telephone"]."',
											'".$_POST["photo"]."',
											'".$_POST["mot de passe"]."'
										)";//die(sql);
								}
						$result=mysqli_query($link,$sql);
						if ($result) {
						echo "<h3 style=color:green>Super! Insertion reussie</h3>";
						# code...
						}else{
						echo "mysql_error()";
						die();
					}

			}
			 ?>



		</div>
		

		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>