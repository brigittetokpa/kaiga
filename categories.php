<?php include('connexion.php');
	  include('menu.php');
	$msg="";
	if (isset($_POST['btnValider'])){
		$sql= "INSERT INTO categories (libelle) VALUES ('".$_POST['libelle']."')";$result=mysqli_query($link,$sql);
		if ($result) {
				$msg='<h3 style="color:green">Insertion reussie!</h3>';
				}else{
				$msg=mysqli_error($link);
				die();
		}
	}

	if (isset($_GET['id']))
	{
		$update="SELECT * FROM categories WHERE id=".$_GET['id'];
		$res=mysqli_query($link,$update);
		$dataU=mysqli_fetch_array($res);
	}

if (isset($_GET['sup']))
	{
		$delete="DELETE  FROM categories WHERE id=".$_GET['sup'];
		$res=mysqli_query($link,$delete);
	}
	
?>

<!DOCTYPE html>
<html lang="">
	
			<br>

	<a style="background-color: orange" type="submit" class="btn btn-lg" id="btnValider" value="enregistrer" name="btnValider" href="accueil.php">Allez à accueil </a>


	<div class="container" style=";height:100%; width: 80%">

		<div class="col-sm-6 col-sm-offset-3" >
			<h1 style="color: blue">CATEGORIES</h1>
			<legend>Formulaire</legend> <span> <?php echo $msg; ?> </span>
			<div class="row">
			<form action="" name="form1" method="Post"> 

				<div class="form-group">
				<label>Libelle:</label> <br><input type="text" name="libelle" class="form-control" required value="<?php if (isset($_GET['id'])) echo $dataU['libelle']; ?>">
				<br>
				</div>
			
				

	 			<button type="submit" class="btn btn-success btn-lg btn-block" id="btnValider" value="enregistrer" name="btnValider">Valider</button>
				
			
			</form>
			<br><br>
			</div></div>

			<div>
				<table border="2" class="table">
					<thead style="background-color: yellow">
						<tr>
					 		<th><b>Numero</b></th>
					 		<th><b>libelle</b></th>			 		
					 		<th><b>Action</b></th>
				 		</tr>
					</thead>

					<tbody >
							<?php	
							$n=1;
							$list=" SELECT * FROM categories"; 
							$res= mysqli_query($link,$list);
							 while ($data = mysqli_fetch_array($res)){
							?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $data['libelle']; ?></td>
								<td>
				 	   		<a href="?id=<?php echo $data['id'];?>" class="btn btn-primary" >Modifier</a>
				 	   		<a href="?sup=<?php echo $data['id'];?>" class="btn btn-warning">Supprimer</a>
				 	   	</td>
								
							</tr>
							<?php
								$n++;
							}?>
					</tbody>
				 
			 	</table>
			 	
			 	</div>

			 	<?php 
					if(isset($_POST["submit"]))
						{


						if(isset($_GET['id']))
							{ 

								$sql="UPDATE categories SET 
								libelle='".$_POST['libelle']."',
								 WHERE id=".$_GET['id'];
							}else
								{
						
									$sql="INSERT INTO categories(libelle) 
									VALUES(
											'".$_POST["libelle"]."',
			
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





	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>
</html>