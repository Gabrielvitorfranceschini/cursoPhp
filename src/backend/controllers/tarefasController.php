<?php

require_once "../../frontend/view/index.php";

class TarefasController {

	protected $dadosTarefa;
	protected $tarefasModel;
	public $chamarFuncao;

	public function __construct() {
		$this->dadosTarefa = $_POST["dadosTarefa"]; // Obtém os dados enviados pelo front para o back.
		$this->chamarFuncao = $_POST["funcao"];
		$this->tarefasModel = new TarefasModel();
	}

	public function obterTarefasController() {
		echo json_encode(["mensagem" => "ola mundo"]);
		exit;
	}

	public function cadastrarTarefasController() {
		$this->validarTarefaController();

		return $this->tarefasModel->cadastrarTarefasModel($this->dadosTarefa);
	}

	public function atualizarTarefasController() {
		echo json_encode(["mensagem" => "ola mundo"]);
		exit;
	}

	public function excluirTarefasController() {
		echo json_encode(["mensagem" => "ola mundo"]);
		exit;
	}

	private function validarTarefaController() {
		if (empty($this->dadosTarefa["nomeDaTarefa"])) {
			throw new Exception("Controller: O nome da tarefa está em branco");
		}
	}

}

$tarefa = new TarefasController();

switch ($tarefa->chamarFuncao) {
	case "obterTarefasController":
		return $tarefa->obterTarefasController();
		break;
	case "cadastrarTarefasController":
		return $tarefa->cadastrarTarefasController();
		break;
	case "atualizarTarefasController":
		return $tarefa->atualizarTarefasController();
		break;
	case "excluirTarefasController":
		return $tarefa->excluirTarefasController();
		break;
	default: echo json_encode(["mensagem" => "Função não existe!"]);
		break;
}

unset($tarefa);