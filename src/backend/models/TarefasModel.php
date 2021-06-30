<?php

class TarefasModel {

	public function __construct() {
		new ConexaoBanco();
	}

	public function cadastrarTarefasModel($dadosTarefa = []) {
		if (empty($dadosTarefa)) { // se ta vazio ou não passou parâmetro retorno erro.
			throw new Exception("Model: O array de dados da tarefa está em branco");
		}

		// criar a logica para salvar os dados no banco
	}

}