<?php

namespace Application\core\model;

interface IBaseModel {

	public function listar(int $id);

	public function criar(array $dados);

	public function atualizar(array $dados);

	public function excluir(int $id);

}
