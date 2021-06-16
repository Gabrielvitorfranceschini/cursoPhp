

<?php
	$x = 0;
	$y = 0;
?>


<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Página inicial</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
		crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
</head>

<body>
	<br />
	<div class="container">

		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Criar
			tarefa</button>
		<br />
		<br />
		<table id="idTabelaTarefas" class="table table-responsive table-striped table-hover">
		</table>
	</div>
	<script src="../js/tabela.js"></script>

	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Cadastrar tarefa</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

					<!-- FORM DA TAREFA -->
					<form id="formTarefas" class="row g-3 needs-validation" novalidate>

						<div class="col-md-3">
							<label for="idDaTarefa" class="form-label">Id da Tarefa</label>
							<input type="number" min="1" class="form-control" id="idDaTarefa" required>
							<div class="invalid-feedback">
								Informe um id para a tarefa
							</div>
						</div>

						<div class="col-md-9">
							<label for="nomeDaTarefa" class="form-label">Nome da tarefa</label>
							<input type="text" class="form-control" id="nomeDaTarefa" required>
							<div class="invalid-feedback">
								Informe um nome para a tarefa
							</div>
						</div>

						<div class="col-md-6">
							<label for="usuarioDaTarefa" class="form-label">Usuário</label>
							<input type="text" class="form-control" id="usuarioDaTarefa" required>
							<div class="invalid-feedback">
								Informe um usuário para a tarefa
							</div>
						</div>

						<div class="col-md-6">
							<label for="dataDaTarefa" class="form-label">Data</label>
							<input type="date" class="form-control" id="dataDaTarefa" required>
							<div class="invalid-feedback">
								Informe uma data para a tarefa
							</div>
						</div>

						<div class="modal-footer col-12">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
							<button type="submit" class="btn btn-primary btnInserir">Salvar</button>
						</div>
					</form>
					<!-- FIM DO FORM -->

				</div>
			</div>
		</div>
	</div>

</body>

</html>


