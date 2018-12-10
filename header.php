<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class();?>>

    <!-- Menu -->
	<div class="container-flex fixed-top bg-primary border-bottom shadow-lg">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand text-white" href="index.html">Wiki-Ema</a>
				<button class="navbar-toggler rounded-circle border border-white shadow-lg" type="button" data-toggle="collapse"
				 data-target="#menuWikiEma" aria-controls="menuWikiEma" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="menuWikiEma">
					<!-- links -->
					<ul class="navbar-nav mr-auto">
						<!--Ema Klabin-->
						<li class="nav-item">
							<a class="nav-link text-white" href="#">Ema Klabin</a>
						</li>
						<!--acervo-->
						<li class="nav-item">
							<a class="nav-link text-white" href="acervo.html">Acervo</a>
						</li>
						<!--ambientes-->
						<li class="nav-item">
							<a class="nav-link text-white" href="ambientes.html">Ambientes</a>
						</li>


						<!-- exemplo disabled
                                        <li class="nav-item">
                                            <a class="nav-link disabled " href="#">Disabled</a>
                                        </li>
                                        -->

						<!-- Institucional -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true"
							 aria-expanded="false">Institucional</a>
							<div class="dropdown-menu" aria-labelledby="dropdown-menu">
								<a class="dropdown-item text-primary" href="#">Sobre a Casa-museu</a>
								<a class="dropdown-item text-primary" href="#">Programação</a>
								<a class="dropdown-item text-primary" href="#">Contato</a>
							</div>
						</li>
					</ul>
					<!-- formulario de busca -->
					<form class="form-inline mt-3">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Encontre uma obra" aria-label="Encontre uma obra"
							 aria-describedby="button-addon2">
							<div class="input-group-append">
								<button class="btn btn-outline-light" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</form>
					<!-- // formulario de busca -->
				</div>
			</div>
		</nav>
	</div>
	<!-- // menu -->

    <!-- Inicio template -->
	<div class="container-fluid margin-top-home px-0">