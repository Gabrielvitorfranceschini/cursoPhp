$(document).ready(function () {
	var tabelaTarefas = $("#idTabelaTarefas");
	var dadosTarefasAtual = JSON.parse(paramPHP); // Inicializando com todos os dados vindos do PHP
	montarTabela();

	$(".btnInserir").on("click", function () {

		validarForm();

		$("#formTarefas").submit(function (event) {
			event.preventDefault();

			var dadosTarefa = {
				titulo: $("#titulo").val(),
				data_inicio: $("#data_inicio").val(),
				data_fim: $("#data_fim").val(),
				status: $("#status").val(),
				prioridade: $("#prioridade").val(),
				usuario: $("#usuario").val(),
				descricao: $("#descricao").val(),
			};

			var url = "/TarefaController/criar";

			$.post(url, dadosTarefa)
				.done(function (response) {
					console.log("done: " + response);
					var msg = "CallBack do DONE vinda do PHP (response): " + response;
				})
				.fail(function (response) {
					console.log("fail: " + response);
					var msg = "CallBack do FAIL vinda do PHP (response): " + response;
					alert(msg);
				});
		});

	});


	$(".btnEditar").on("click", function () {
		var $botaoEditar = $(this);

		console.log("O botão clicado foi: ", $botaoEditar.text(), " valor: ", $botaoEditar.val());
	});

	$('#idTabelaTarefas').on('click', '.btnExcluir', function (e) {
		e.preventDefault();
		var $botaoExcluir = $(this);

		console.log("O botão clicado foi: ", $botaoExcluir.text(), " valor: ", $botaoExcluir.val());

		var novosDados = [];

		$.each(dadosTarefasAtual, function (idx, tarefa) {
			if (tarefa.id != $botaoExcluir.val()) {
				novosDados.push(tarefa);
				// tarefa = { id: 3, nome: "tarefa1", usuario: "ariel", data: "18/05/2021" }
			}
		});

		dadosTarefasAtual = novosDados;
		montarTabela();

		// $botaoExcluir.closest('tr').remove();
	});

	function montarTabela() {
		var cabecalho = montarCabecalhoTabela();
		var corpo = montarCorpoTabela();
		var htmlDaTabela = (cabecalho + corpo);

		tabelaTarefas.html(htmlDaTabela);

	}

	function montarCabecalhoTabela() {
		var cabecalho = (
			'<thead class="table-dark">' +
			'<tr>' +
			'<th scope="col">Id</th>' +
			'<th scope="col">Tarefa</th>' +
			'<th scope="col">Usuário</th>' +
			'<th scope="col">Data</th>' +
			'<th scope="col">Ações</th>' +
			'</tr>' +
			'</thead>'
		);

		return cabecalho;
	}

	function montarCorpoTabela() {
		var corpo = '<tbody>';
		var tarefas = dadosTarefasAtual;

		$.each(tarefas, function (idx, tarefa) {
			corpo += (
				'<tr>' +
					'<td>' + tarefa.id + '</td>' +
					'<td>' + tarefa.titulo + '</td>' +
					'<td>' + tarefa.usuario + '</td>' +
					'<td>' + formatarDataHoraBr(tarefa.data_criacao) + '</td>' +
					'<td>' +
						'<button type="button" class="btn btn-warning btnEditar" value=' + tarefa.id + '><i class="far fa-edit"></i> Editar</button>' +
						'&nbsp;' +
						'<button type="button" class="btn btn-danger btnExcluir" value=' + tarefa.id + '><i class="far fa-trash-alt"></i> Excluir</button>' +
					'</td>' +
				'</tr>'
			);
		});

		corpo += '</tbody>';

		return corpo;
	}

	// Example starter JavaScript for disabling form submissions if there are invalid fields
	function validarForm() {
		'use strict'

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.prototype.slice.call(forms)
			.forEach(function (form) {
				form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
						event.preventDefault()
						event.stopPropagation()
					}

					form.classList.add('was-validated')
				}, false)
			})
	}

});

/*
	function dadosTabela() {
		var dadosTarefa = [];

		dadosTarefa = [
			{ idDaTarefa: 3, nomeDaTarefa: "tarefa1", usuarioDaTarefa: "ariel", dataDaTarefa: "18/05/2021" },
			{ idDaTarefa: 4, nomeDaTarefa: "tarefa2", usuarioDaTarefa: "tiago", dataDaTarefa: "18/05/2021" },
			{ idDaTarefa: 5, nomeDaTarefa: "tarefa3", usuarioDaTarefa: "sadi", dataDaTarefa: "18/05/2021" },
			{ idDaTarefa: 6, nomeDaTarefa: "tarefa4", usuarioDaTarefa: "michel", dataDaTarefa: "25/05/2021" },
			{ idDaTarefa: 7, nomeDaTarefa: "tarefa5", usuarioDaTarefa: "gabriel", dataDaTarefa: "25/05/2021" },
		];

		return dadosTarefa;
	}
*/
