$(document).ready(function () {
	var timeout = 700; // 1s (1000)
	var tabelaTarefas = $("#idusuario");

	var dadosUsuariosAtual = JSON.parse(paramPHP); // Inicializando com todos os dados vindos do PHP
	montarTabela();

	$(".btnCriarTarefa").on("click", function () {
		limparFormulario();
	});

	$(".btnInserir").on("click", function () {

		var temCamposInvalidos = false;// validarForm(true);

		if (!temCamposInvalidos) {

			var dadosUsuario = {
				id: $("#id").val(),
				nome: $("#texto|varchar 150").val(),
				data_inicio: $("#data_inicio").val(),
				data_fim: $("#data_fim").val(),
                email: $("#texto").val(),
				status: $("#int ou tynyint").val(),
				prioridade: $("#prioridade").val(),
				usuario: $("#texo|varchar 150").val(),
				descricao: $("#descricao").val(),
                //
                data_criacao: $("#date").val(),
                data_alteracao: $("#date").val(),
			};

			var url = "/UsuarioController/criarOuAtualizar";

			$.post(url, dadosUsuario)
				.done(function (response) {
					if (response && response.length > 0) {
						dadosUsuariosAtual = response;
						montarTabela();
					}

					exibirAviso("Tarefa cadastrada com sucesso.");
					limparFormulario();
				})
				.fail(function (response) {
					exibirAviso(response, "Erro ao salvar o Usuario.");
				});
		}

	});


	$(".btnEditar").on("click", function () {
		var $botaoEditar = $(this);
		var id = $botaoEditar.val();
		var url = "/UsuarioController/listar/" + id;

		$("#staticBackdropLabel").html("Editar tarefa");

		$.get(url)
			.done(function (response) {

				if (response && response.length > 0) {

					$("#id").val(response[0].id);
					$("#titulo").val(response[0].titulo);
					$("#data_inicio").val(response[0].data_inicio);
					$("#data_fim").val(response[0].data_fim);
					$("#status").val(response[0].status);
					$("#prioridade").val(response[0].prioridade);
					$("#usuario").val(response[0].usuario);
					$("#descricao").val(response[0].descricao);

					// Exibir Modal
					$(".modal").modal("show");
				} else {
					exibirAviso(response, "Usuario não cadastrado.");
					limparFormulario();
				}

			})
			.fail(function (response) {
				exibirAviso(response, "Erro ao obter o Usuario");
				limparFormulario();
			});

	});

	$('#idTabelaUsuario').on('click', '.btnExcluir', function (e) {
		e.preventDefault();
		var $botaoExcluir = $(this);
	
		var url = "/UsuarioController/excluir/" + $botaoExcluir.val();

			$.get(url)
				.done(function (response) {
					exibirAviso("Usuario excluido.");
					limparFormulario();
				})
				.fail(function (response) {
					exibirAviso(response, "Erro ao excluir");
				});
		
	
		 $botaoExcluir.closest('tr').remove();
	});

	function montarTabela() {
		var cabecalho = montarCabecalhoTabela();
		var corpo = montarCorpoTabela();
		var htmlDaTabela = (cabecalho + corpo);

		tabelaUsuario.html(htmlDaTabela);

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
		var Usuario = dadosUsuariosAtual;

		$.each(Usuario, function (, Usuario) {
			corpo += (
				'<tr>' +
				'<td>' + Usuario.id + '</td>' +
				'<td>' + Usuario.titulo + '</td>' +
				'<td>' + Usuario.usuario + '</td>' +
				'<td>' + formatarDataHoraBr(Usuario.data_criacao) + '</td>' +
				'<td>' +
				'<button type="button" class="btn btn-warning btnEditar" value=' + Usuario.id + '><i class="far fa-edit"></i> Editar</button>' +
				'&nbsp;' +
				'<button type="button" class="btn btn-danger btnExcluir" value=' + Usuario.id + '><i class="far fa-trash-alt"></i> Excluir</button>' +
				'</td>' +
				'</tr>'
			);
		});

		corpo += '</tbody>';

		return corpo;
	}

	// Example starter JavaScript for disabling form submissions if there are invalid fields
	function validarForm(returnValidation) {
		'use strict'

		returnValidation = returnValidation || false;
		var temCamposInvalidos = false;

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.prototype.slice.call(forms)
			.forEach(function (form) {

				var check = form.checkValidity();

				if (!check) {
					temCamposInvalidos = true;
				} else {
					form.classList.add('was-validated');
				}

			});

		if (returnValidation) {
			return temCamposInvalidos;
		}
	}

	function exibirAviso(response, msg) {
		msg = msg || "";
		response = response || "";

		setTimeout(function () {
			console.log("response: " + response);

			// Fechar Modal
			$(".modal").modal("hide");

			if (msg) {
				alert(msg);
			}

		}, timeout);

	}

	function limparFormulario() {
		$("#staticBackdropLabel").html("Cadastrar tarefa");
		//
		$("#id").val(0);
		$("#titulo").val("");
		$("#data_inicio").val("");
		$("#data_fim").val("");
		$("#status").val("");
		$("#prioridade").val("");
		$("#usuario").val("");
		$("#descricao").val("");
	}

});
