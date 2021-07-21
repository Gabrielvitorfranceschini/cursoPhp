<?php

namespace Application\core\database;

use Application\core\exception\TraitExceptionJSON;

class BancoDeDados {
	use TraitExceptionJSON;

	protected $nomeBanco = "";
	protected $objMysqli = null;
	public $resultados = [];
	public $nroDeLinhas = 0;

	public function __construct() {
		$conexaoBanco = new ConexaoBanco();

		$this->nomeBanco = $conexaoBanco->obterNomeBanco();
		$this->objMysqli = $conexaoBanco->obterConexao();
		$this->selecionarBanco();
	}

	private function selecionarBanco() {
		try {
			if (!$this->objMysqli->select_db($this->nomeBanco)) {
				$this->criarBancoDeDados();
			}
		} catch (\Exception $error) {
			echo $this->jsonException($error);
			die();
		}
	}

	private function criarBancoDeDados() {
		try {

			// Instrução SQL que cria o banco de dados se não existir
			$sql = "CREATE DATABASE IF NOT EXISTS {$this->nomeBanco}";

			if (!$this->objMysqli->query($sql)) {
				throw new \Exception("BancoDeDados: Erro ao criar banco de dados: " . mysqli_error($this->objMysqli));
			}

			$this->selecionarBanco();
		} catch (\Exception $error) {
			echo $this->jsonException($error);
			die();
		}
	}

	public function executar($sql) {
		try {
			$this->resultados = $this->objMysqli->query($sql, MYSQLI_USE_RESULT);

			if (!empty($this->objMysqli->error) && $this->objMysqli->errno > 0) {
				throw new \Exception("BancoDeDados - executar sql: {$this->objMysqli->errno}, {$this->objMysqli->error}, {$sql}");
			}

			if (!is_scalar($this->resultados) && $this->resultados->num_rows) {
				$this->nroDeLinhas = $this->resultados->num_rows;
				$this->resultados = $this->prepararDadosRetorno();
			}
			
			$this->resultados = $this->prepararDadosRetorno();
		} catch (\Exception $error) {
			echo $this->jsonException($error);
			die();
		}
	}

	private function prepararDadosRetorno() {
		$dados = [];

		$obj = (object) $this->resultados;

		if ($obj && isset($obj->scalar)) {
			return $obj->scalar;
		}

		while ($row = $obj->fetch_object()) {
			$dados[] = $row;
		}

		$this->nroDeLinhas = count($dados);

		return $dados;
	}

}
