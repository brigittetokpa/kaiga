<?php
	session_start();
	include('connexion.php'); 
	include('menu.php');
?>

		

			<div class="row" >

				<div class="col-md-4"> 
				</div>
				<div class="col-md-4" style="color: black; text-align:left;"><br><br><br>

					<form action="" method="POST" role="form">
						<legend style="color: black;">Se connecter</legend>

						<div class="form-group">
							<label for="">EMAIL</label>
							<input type="email" name="email" class="form-control" id="" placeholder="Exemple@email.com">
						</div>

						<div class="form-group">
							<label for="">mot de passe</label>
							<input type="password" name="mdp" class="form-control" id="" placeholder="Xxxxx">
						</div>

					
						<a href="users.php"><button type="submit" name="btnValider" class="btn btn-primary">Submit</button></a>
					</form>
					<?php if (isset($_POST['btnValider']) ){

								$sql="SELECT * FROM client WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' AND mdp='".mysqli_real_escape_string($link,md5($_POST['mdp']))."' LIMIT 0,1";
								$req= mysqli_query($link,$sql);
								if (mysqli_num_rows($req)>0) {
									$data= mysqli_fetch_array($req);
									$_SESSION['variable']=$data['id'];
									header('location:users.php');
								}else{
									echo "<h4>identifiants incorrects, veuillez creer un compte svp!</h4>";
								}
						} ?>
				
						 <a href="users.php" ><h3>Nouveau compte?</h3></a>
				</div>
				<div class="col-md-4"></div>

			</div>

		</div>
		<?php include('footer.php'); ?>

		<!-- jQuery -->
		<script src=""></script>
		<!-- Bootstrap JavaScript -->
		<script src=""></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>