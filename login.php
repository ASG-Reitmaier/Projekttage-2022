<!DOCTYPE html>
<html>
 
    <head>
        
        <meta name ="viewport" content="width-device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Anmeldung</title>
        <!-- CSS von Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 

        <link rel="stylesheet" href="/path/to/cdn/bootstrap.min.css" />
            <script src="/path/to/cdn/bootstrap.min.js"></script>
        <link href="bootstrap5-dropdown-ml-hack-hover.css" rel="stylesheet" />
            <script src="bootstrap5-dropdown-ml-hack.js"></script>
        
        
        
    </head>
    <body>
<div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<form class="border shadow p-3 rounded"
      	      action="check-login.php" 
      	      method="post" 
      	      style="width: 450px;">
      	      <h1 class="text-center p-3">LOGIN</h1>
      	      <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
		  <div class="mb-3">
		    <label for="benutzername" 
		           class="form-label">Benutzername</label>
		    <input type="text" 
		           class="form-control" 
		           name="benutzername" 
		           id="benutzer_id">
		  </div>
		  <div class="mb-3">
		    <label for="password" 
		           class="form-label">Passwort</label>
		    <input type="password" 
		           name="passwort" 
		           class="form-control" 
		           id="passwort_id">
		  </div>
		  
		 
		  <button type="submit" 
		          class="btn btn-primary">LOGIN</button>
		</form>
      </div>

</body>
    
</html>