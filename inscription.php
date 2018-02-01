<?php 
	include('connexion.php');
	include('menu.php');

 ?>


		<br><br><div class="container">

			<div class="row">

				<div class="col-md-4"></div>
				<div class="col-md-4" style=" text-align:left; background-color: white;">

					<form action="" method="POST" role="form">
						<legend>Inscription</legend>
					
						<div class="form-group">
							<label for="">Votre numero de telephone svp?</label>
							<input type="text" name="nom" class="form-control" id="" placeholder="+255xxxxx">
						</div>

						
						<a href="login.php" name="btnValider" class="btn btn-primary" ><< Precedent</a>

						<a href=" suivant1.php"><button name="btnValider" class="btn btn-primary" style="float: right;">Suivant >></button></a><br><br>
					
						
						<?php 
							if (isset($_POST['btnValider']) ){

								$sql="SELECT * FROM personnes WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."'";
								$req= mysqli_query($link,$sql);
								$data= mysqli_fetch_array($req);
									$_SESSION['variable']=$data['id'];
									header('location:suivant1.php');
								}else{
									echo "";
								}
						 ?>

						<!--/*else{

								$sql= "INSERT INTO personnes (nom, prenom, email, mdp)
					 VALUES ('".mysqli_real_escape_string($link,$_POST['nom'])."',
					 		'".mysqli_real_escape_string($link,$_POST['prenom'])."',
					 		  '".mysqli_real_escape_string($link,$_POST['email'])."',
					 		  '".mysqli_real_escape_string($link, md5($_POST['mdp']))."')";
						$res=mysqli_query($link,$sql);
						if ($res) {
							echo "insertion reussie";
						}else{
							$msg=mysqli_error($link);
							
						}
						}

						 ?-->
					</form>

				</div>
				<div class="col-md-4"></div>

			</div>

		</div></div>
		<?php include('footer.php'); ?>

		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>