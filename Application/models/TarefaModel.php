<?php

namespace Application\models;

use Application\core\database\BancoDeDados;
use Application\core\model\IBaseModel;

class TarefaModel implements IBaseModel {

	protected $bancoDeDados = null;
	protected $tabela = "tarefas";

	public function __construct() {
		$this->bancoDeDados = new BancoDeDados();
		$this->excluirTabela();
		$this->criarTabela();
	}

	private function excluirTabela() {
		$sql = (
			"DROP TABLE IF EXISTS `{$this->tabela}`"
		);

		if (in_array($this->tabela, DROP_TABLE)) {
			return $this->executar($sql);
		}
	}

	private function criarTabela() {
		$sql = (
			"CREATE TABLE IF NOT EXISTS `{$this->tabela}` (
				`id` INT AUTO_INCREMENT PRIMARY KEY,
				`titulo` VARCHAR(150) DEFAULT NULL,
				`data_inicio` DATE DEFAULT '0001-01-01',
				`data_fim` DATE DEFAULT '0001-01-01',
				`status` TINYINT NOT NULL,
				`prioridade` TINYINT NOT NULL,
				`usuario` VARCHAR(50) DEFAULT NULL,
				`descricao` TEXT DEFAULT NULL,
				`data_criacao` TIMESTAMP,
				`data_atualizacao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
				`usuario_atualizacao` VARCHAR(50) DEFAULT NULL
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
		);

		if (in_array($this->tabela, CREATE_TABLE)) {
			return $this->executar($sql);
		}
	}

	private function executar($sql) {
		$this->bancoDeDados->executar($sql);

		$dados = [];

		if ($this->bancoDeDados->nroDeLinhas > 0) {
			$dados = $this->bancoDeDados->resultados;
		}

		return $dados;
	}

	public function listarTodos() {
		$sql = ("SELECT * FROM {$this->tabela};");

		return $this->executar($sql);
	}

	// CRUD

	public function listar($id) {
		$sql = ("SELECT * FROM {$this->tabela} WHERE id= '{$id}';");

		return $this->executar($sql);
	}

	public function excluir($id) {
		$sql = ("DELETE FROM {$this->tabela} WHERE id= '{$id}';");

		return $this->executar($sql);
	}

	public function criar($dados) {
		$valores = $this->sanitizeValuesArray($dados);

		$campos = implode(', ', array_keys($dados));
		$valores = implode(', ', array_values($valores));

		$data_criacao = date("Y-m-d H:i:s");

		$sql = (
			"INSERT INTO {$this->tabela} (${campos}, data_criacao) VALUES (${valores}, '${data_criacao}');"
		);

		// "INSERT INTO tarefas (titulo, data_inicio, data_fim, status, prioridade, usuario, descricao, data_criacao)
		// VALUES ('Teste da tarefa', '2021-07-05', '2021-07-06', '1', '5', 'ariel.felippi', 'teste tarefa.', '2021-07-06 19:33:12');"

		return $this->executar($sql);
	}

	public function atualizar($dados) {
		$campos = array_keys($dados);
		$valores = $this->sanitizeValuesArray($dados);

		$id = $dados["id"];

		$updateFieldsValues = $this->prepareUpdate($campos, $valores);

		$sql = (
			"UPDATE {$this->tabela} SET {$updateFieldsValues}  WHERE id= '{$id}';"
		);

		/*
			"UPDATE tarefas SET
				id='5', titulo='Teste da tarefa ASDF',
				data_inicio='2021-07-13', data_fim='2021-07-19',
				status='5', prioridade='3', usuario='ariel.felippi',
				descricao='Teste Tarefa. FFFFFFFFFFFFFFFFFFFFF'
			WHERE id= '5';"
		*/

		return $this->executar($sql);
	}

	// Fim CRUD.

	private function sanitizeValuesArray($dados) {
		$add_quotes = function ($str) {
			return sprintf("'%s'", $str);
		};

		$dadosTmp = array_map($add_quotes, $dados);

		return $dadosTmp;
	}

	private function prepareUpdate($campos, $valores) {
		$join_filedsValues = function ($field, $value) {
			$escaparHtml = ["descricao"];

			if (in_array($field, $escaparHtml)) {
				$value = htmlspecialchars($value, ENT_QUOTES);
			}

			$joined = ($field . "=" . $value);

			return $joined;
		};

		$dadosTmp = array_map($join_filedsValues, $campos, $valores);
		$dadosTmp = implode(', ', $dadosTmp);

		return $dadosTmp;
	}

}