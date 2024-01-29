<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">

    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
    <!------CND DE BOOSTRAP V5---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- LLAMAR A estilos  -->
    <link rel="stylesheet" href="css/estiloLoginV2.css">
	<link rel="stylesheet" href="/https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
	<title>Inicio de Sesión</title>
</head>
<body>
    <!-------------  Encabezado --------->
	 <!----------
    <nav class="navbar navbar-light">
  <div class="container-fluid">
   <a class="navbar-brand" href="#">Tecnoogico de Estudios superirores</a>
  </div>
</nav>--->
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content ">
			<div class="col-md-4 text-center company__info">
			
                <!-----modificaion en la lina css->   8-17-->
				<h4 class="company_title">Sistema Web para el control médico en menores de 12 años.</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row" id="titulo">
						<h2>Inicio de Sesión </h2>
					

					<div class="row">
						<form control="" class="form-group" action="validar.php" method="post">
					
							<div class="row">
								<input type="text" name="usuario" id="username" class="form__input" placeholder="Usuario">
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password" name="contraseña" id="password" class="form__input" placeholder="Contraseña">
							</div>
                            </div>
                            <div class="row" >
								<input id="botonEntrar" type="submit" value="Enviar" class="btn">
							</div>
							
                          
                  
                  <!--  <div class="row" id="face">
                    <button  id="botonFace" class="w-100 py-2 mb-2 btn btn-outline-dark rounded-3" type="button"><svg class="bi me-1" width="16" height="16"></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg> inicar Facebook</button>
					
					</div>--->
												
						</form>
					</div>
                    </div>
					<div class="row">
						<p> <a href="newUser/index.php">Registrate Aqui</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>