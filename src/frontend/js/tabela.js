$(document).ready(function () {

	var dadosTarefasAtual = dadosTabela(); // Inicializando com todos os dados
	var tabelaTarefas = $("#idTabelaTarefas");
	montarTabela();


	$(".btnInserir").on("click", function () {
		
		validarForm();
		
		
		$("#formTarefas").submit(function( event ) {
			event.preventDefault();

			// { idDaTarefa: 3, nomeDaTarefa: "tarefa1", usuarioDaTarefa: "ariel", dataDaTarefa: "18/05/2021" }
			var dadosTarefaSubmit = {
				idDaTarefa: $("#idDaTarefa").val(),
				nomeDaTarefa: $("#nomeDaTarefa").val(),
				usuarioDaTarefa: $("#usuarioDaTarefa").val(),
				dataDaTarefa: $("#dataDaTarefa").val(),
			};

			$.post( "../../backend/controllers/tarefasController.php", dadosTarefaSubmit)
				.done(function( response ) {
					
					alert( "CallBack do DONE vinda do PHP (response): " + response );
				})
				.fail(function( response ) {
					alert( "FALHOU o POST para o PHP: " + response );
				});


			// $.ajax({
			// 	url: "test.php",
			// 	type: "post",
			// 	data: dadosTarefaSubmit
			// })			
			// .fail(function( response ) {
			// 	alert( "FALHOU o POST para o PHP: " + response );
			// })
			// .done(function( response ) {
			// 	alert( "CallBack do DONE vinda do PHP (response): " + response );
			// });

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

		$.each(dadosTarefasAtual, function(idx, tarefa) {
			if (tarefa.id != $botaoExcluir.val()) {
				novosDados.push(tarefa);
				// tarefa = { id: 3, nome: "tarefa1", usuario: "ariel", data: "18/05/2021" }
			}
		});

		dadosTarefasAtual = novosDados;
		montarTabela();

		// $botaoExcluir.closest('tr').remove();
	});


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

		$.each(tarefas,  function(idx, tarefa) {
			corpo += (
			'<tr>'+
				'<td>' + tarefa.idDaTarefa + '</td>' +
				'<td>' + tarefa.nomeDaTarefa + '</td>' +
				'<td>' + tarefa.usuarioDaTarefa + '</td>' +
				'<td>' + tarefa.dataDaTarefa + '</td>' +
				'<td>' +
					'<button type="button" class="btn btn-warning btnEditar" value=' + tarefa.id+ '>Editar</button>' +
					'&nbsp;' +
					'<button type="button" class="btn btn-danger btnExcluir" value=' + tarefa.id+ '>Excluir</button>' +
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
