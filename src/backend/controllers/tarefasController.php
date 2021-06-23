<?php

require_once "../models/TarefasModel.php";
class TarefasController {

    public function obterTarefas() {
        // return { idDaTarefa: 3, nomeDaTarefa: "tarefa1", usuarioDaTarefa: "ariel", dataDaTarefa: "18/05/2021" };
    }

    public function cadastrarTarefas() {

        $dadosTarefa = $_POST; // ' '

        echo json_encode($dadosTarefa);

        exit();

    }
}

$tarefa = new TarefasController();

$tarefa->cadastrarTarefas();