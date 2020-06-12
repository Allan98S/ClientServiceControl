
<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
		<title>Welcome</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="Assets/login.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<script> 
		var server_url = "http://localhost";
		$(document).ready(function () {
			
		 $('.message a').click(function(){
          $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
         });
		 var $select= $("#rolType");
		  $.ajax({
          url:server_url+"/ClientServiceControl/Controller/IndexController.php", 
          dataType : 'json',               
          success : function(role) { 
			$.each(role, function (key, rol) { 
			value= rol.rol_id+","+rol.rol_name;
			$select.append($("<option />").val(value).text(rol.rol_name));
		});

		}
						
		});//roles
	    });

		</script>


	</head>

	<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

  
  <!-- Links -->
  <ul class="nav navbar-nav">
 
<li class="nav-item">
    <a class="nav-link" href="index.php">Home</a>
</li>

</ul>
</nav>
<br>
<br>
<h1>Inicio de Usuario </h1>
<div class="login-page">
	<div class="form">
		<form class="register-form" action="Controller/UserRegister.php" method="post">
		<input type="text" name="name" id="name" placeholder="name" required/>
		<input type="text" name="lastName" id="lastName" placeholder="apellidos" required/>
		<input type="text" name="mail" id="mail" placeholder="correo electr&oacute;nico" required/>
		<input type="password" name="password" id="password" placeholder="contrase&ntilde;a" required/>
		<input type="text" name="company" id="company" placeholder="nombre de la empresa" required/>
		<textarea  name="companyAddress" id="companyAddress" placeholder="direcci&oacute;n de la empresa" 
		required></textarea>


		<label>Rol de usuario:</label>
		<select id="rolType" name="rolType" >  </select>
      
		<button>Registrarse</button>
		<p class="message">¿Ya est&aacute; registrado? <a href="#">Iniciar Sesi&oacute;n</a></p>
		</form>
		<form class="login-form" action="Controller/UserLogin.php" method="post">
		<input type="text" name="mail" id="mail" placeholder="correo electr&oacute;nico" required/>
		<input type="password" name="password" id="password" placeholder="contrase&ntilde;a" required/>
		<button>Iniciar Sesi&oacute;n</button>
		<p class="message">¿No registrado? <a href="#">Crear una cuenta</a></p>
		</form>
	</div>
	</div>

	</body>



</html>