<?php include('connexion.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>PAGE D'INSCRIPTION</title>
</head>
<body>

	
	<!--corps de la page-->
	<div class="container" >

<div class="form-group" >
  <label for="example-text-input" class="col-2 col-form-label">Nom</label>
  <div class="col-10">
    <input class="form-control" type="text" value="Nom" id="example-text-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-search-input" class="col-2 col-form-label">Prenoms</label>
  <div class="col-10">
    <input class="form-control" type="search" value="Prenoms" id="example-search-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-email-input" class="col-2 col-form-label">Date de Naissance</label>
  <div class="col-10">
    <input class="form-control" type="email" value="jj/mm/aaaa" id="example-email-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-url-input" class="col-2 col-form-label">Resume</label>
  <div class="col-10">

    <input class="form-control" type="url" id="example-url-input">
  </div>
</div>
		<div class="form-group row">
  <label for="example-url-input" class="col-2 col-form-label">Email</label>
  <div class="col-10">
    <input class="form-control" type="url" id="example-url-input" value="Email">
  </div>
</div>

<div class="form-group row">
  <label for="example-tel-input" class="col-2 col-form-label">Telephone</label>
  <div class="col-10">
    <input class="form-control" type="tel" value="Telephone" id="example-tel-input">
  </div>
</div>
<div class="form-group row">
  <label for="example-password-input" class="col-2 col-form-label">Mot de pass</label>
  <div class="col-6">
    <input class="form-control" type="password" value="Password" id="example-password-input" >
  </div>
</div>

 
 

<div class="form-group row">
  <label for="example-tel-input" class="col-2 col-form-label">Photo</label>
  <div class="col-10">

    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
    
    <button type="button" class="btn btn-primary  btn-block">Valider</button>

  </div>
</div>  




</div>





</body>
</html>