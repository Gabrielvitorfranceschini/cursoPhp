<br />
<div class="container">

	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="far fa-plus-square"></i> Criar
		tarefa</button>
	<br />
	<br />
	<table id="idTabelaTarefas" class="table table-responsive table-striped table-hover">
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Cadastrar tarefa</h5>
				<button type="button" class="btn-close btnCriarTarefa" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<!-- FORM DA TAREFA -->
				<form id="formTarefas" class="row g-3 needs-validation" novalidate>

					<div class="col-md-3">
						<label for="id" class="form-label">Id da Tarefa</label>
						<input type="number" min="1" readonly class="form-control" id="id" name="id" required>
					</div>

					<div class="col-md-9">
						<label for="titulo" class="form-label">Título</label>
						<input type="text" class="form-control" id="titulo" name="titulo" required>
						<div class="invalid-feedback">
							Informe um titulo para a tarefa
						</div>
					</div>

					<div class="col-md-6">
						<label for="data_inicio" class="form-label">Data de inicio</label>
						<input type="date" class="form-control" id="data_inicio" name="data_inicio" required>
						<div class="invalid-feedback">
							Informe uma data de inicio para a tarefa
						</div>
					</div>

					<div class="col-md-6">
						<label for="data_fim" class="form-label">Data fim</label>
						<input type="date" class="form-control" id="data_fim" name="data_fim" required>
						<div class="invalid-feedback">
							Informe uma data fim para a tarefa
						</div>
					</div>

					<div class="col-md-3">
						<label for="status" class="form-label">Status</label>
						<input type="number" min="1" max="5" class="form-control" id="status" name="status" required>
						<div class="invalid-feedback">
							Selecione um status para a tarefa
						</div>
					</div>

					<div class="col-md-3">
						<label for="prioridade" class="form-label">Prioridade</label>
						<input type="number" min="1" max="5" class="form-control" id="prioridade" name="prioridade" required>
						<div class="invalid-feedback">
							Selecione uma prioridade para a tarefa
						</div>
					</div>

					<div class="col-md-6">
						<label for="usuario" class="form-label">Usuário</label>
						<input type="text" class="form-control" id="usuario" name="usuario" required>
						<div class="invalid-feedback">
							Informe um usuário para a tarefa
						</div>
					</div>

					<div class="col-md-12">
						<label for="descricao" class="form-label">Descrição</label>
						<textarea class="form-control" id="descricao" name="descricao" rows="5" required></textarea>
						<div class="invalid-feedback">
							Informe uma descrição para a tarefa
						</div>
					</div>

					<div class="modal-footer col-12">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
						<button type="button" class="btn btn-primary btnInserir">Salvar</button>
					</div>
				</form>
				<!-- FIM DO FORM -->

			</div>
		</div>
	</div>
</div>
<script type="text/javascript">var paramPHP = '<?php echo json_encode($data); ?>';</script>
<script src="/assets/js/tarefas/tarefas.js"></script>
