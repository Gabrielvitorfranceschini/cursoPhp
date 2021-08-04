<?php

use Application\core\controller\Controller;
use Application\core\controller\IBaseController;
use Application\core\exception\MyException;

class UsuarioController extends Controller implements IBaseController {

	protected $UsuarioModel = null;

	public function __construct() {
		$this->UsuarioModel = $this->model('UsuarioModel');
	}

	// index == listarTodos
	public function index() {
		$data["paginaMeio"] = "Usuario/UsuarioView";
		$data["dados"] = $this->tarefasModel->listarTodos();
		$this->view("PrincipalView", $data);
	}

	public function criarOuAtualizar() {
		$dados = $_REQUEST; // obtém os dados do front.

		if (isset($dados["id"]) && $dados["id"] > 0) {
			return $this->atualizar($dados);
		}

		return $this->criar($dados);
	}

	// Métodos padrão conhecidos como CRUD (Create, Read, Update e Delete).

	public function listar($id = 0) {
		$this->validarIdUsuario($id);

		$dados = $this->UsuarioModel->listar($id);
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($dados);
		exit();
	}

	public function criar($dados = []) {
		unset($dados["id"]);
		$this->validarUsuario($dados);

		$retorno= $this->UsuarioModel->criar($dados);
		header('Content-Type: application/json; charset=utf-8');

		if ($retorno) {
			$dados = $this->UsuarioModel->listarTodos();
			echo json_encode($dados);
			exit();
		}

		echo json_encode([]);
		exit();
	
	}

	public function atualizar($dados = []) {
		$this->validarTarefa($dados);

		$id = $dados["id"];

		$obj = $this->tarefasModel->atualizar($dados);

		if ($obj) {
			return $this->listar($id);
		}

		return $obj;

	}

	public function excluir($id = 0) {
		$this->validarIdTarefa($id);
		return $this->tarefasModel->excluir($id);
	}

	// Fim CRUD.

	private function validarTarefa($dados) {
		try {
			foreach ($dados as $chave => $valor) {

				// Variáveis escalares são as que contém integer, float, string ou boolean. os tipos array, object e resource não são escalares.
				$existeCampoInvalido = ($chave != "descricao" && (!is_scalar($valor) || empty($valor)));

				if ($existeCampoInvalido) {
					throw new MyException("Controller: O campo {$chave} da tarefa é inválido.");
				}
			}
		} catch (MyException $error) {
			echo $error->jsonException($error);
			die();
		}
	}

	private function validarIdTarefa($id) {
		try {
			$idInvalido = (!is_numeric($id) || $id <= 0);

			if ($idInvalido) {
				throw new MyException("O id da tarefa é inválido.");
			}
		} catch (MyException $error) {
			echo $error->jsonException($error);
			die();
		}
	}

}