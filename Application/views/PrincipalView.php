<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<title><?php echo SYSTEM_NAME;?></title>
    	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/fontawesome_5_15/css/all.min.css">
		<script src="/assets/js/jquery.min.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>
		<script src="/assets/fontawesome_5_15/js/all.min.js"></script>
	</head>
	<body>

		<header>
			<nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-light bg-white border-bottom box-shadow mb-3">
				<div class="container">
					<a class="navbar-brand" asp-area="" asp-controller="Home" asp-action="Index"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
						<ul class="navbar-nav flex-grow-1">
							<li class="nav-item">
								<a class="nav-link text-dark" ><i class="fas fa-dna fa-1x"></i> C-Gemis</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-dark"  ><i class="fas fa-flask"></i> TCGA</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-dark"  ><i class="fas fa-mortar-pestle"></i> GEO</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-dark"  ><i class="fas fa-at"></i> Contact</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-dark"  ><i class="fas fa-newspaper"></i> Publications</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-dark"  ><i class="fas fa-address-card"></i> About</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<div class="container">
			<?php $this->view($data["paginaMeio"], $data["dados"]); ?>
		</div>

		<style>
			/* Information Developer */
			div.dev{
				height: 2%;
				text-align: right;
				float: right;
				margin-right: 7em;;
				font-style: italic;
			}
			/* GitHub */
			div.dev a.git:link {
				text-decoration: none;
				text-decoration-color: #6C757D;
				color: #6C757D;
			}
			div.dev a.git:visited {
				color: #6C757D;
			}
			div.dev a.git:hover {
				color: #000000;
			}
			div.dev a.git:active {
				color: #6C757D;
			}
			/*Instagram*/
			div.dev a.insta:link {
				text-decoration: none;
				text-decoration-color: #6C757D;
				color: #6C757D;
			}
			div.dev a.insta:visited {
				color: #6C757D;
			}
			div.dev a.insta:hover {
				color:#FFC34F;
			}
			div.dev a.insta:active {
				color: #6C757D;
			}
		</style>
		<footer class="border-top footer text-muted">
			<div class="dev">
				<a target="_blank" class="insta" href="https://www.instagram.com/arielfelippi/" > <i class="fab fa-instagram"></i></a>  <a target="_blank" class="git" href="https://github.com/arielfelippi/cursoPhp/" ><i class="fab fa-github"></i></a>
			</div>
			<div class="container">
				<span><?php echo SYSTEM_NAME . '&nbsp;'; echo  '&nbsp;&nbsp;' . date('Y')?> &copy;</span>
			</div>
		</footer>

	</body>
</html>
<script src="/assets/js/moment.js"></script>
<script src="/assets/js/functions.js"></script>
