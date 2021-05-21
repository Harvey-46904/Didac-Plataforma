<!doctype html>
<html lang="en">
  <head>
  	<title>Didac Plataform</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h1 class="heading-section">Didac</h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      
		      	<form  class="signin-form" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Usuario" id="Email" name="Email" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Contraseña" id="contraseña" name="contraseña"required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
				@if (Session::get('msgerror'))
              <div class="alert alert-danger"><strong>{!! \Session::get('msgerror') !!}</strong></div>
              @endif
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Iniciar Sesión</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Recuerdame
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
								
								</div>
	            </div>
	          </form>
	         
	        
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

