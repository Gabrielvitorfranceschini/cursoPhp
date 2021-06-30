<?php

class ConexaoBanco {

	protected $nomeServidor;
	protected $nomeUsuario;
	protected $senhaUsuario;
	protected $nomeBanco;
	protected $porta;
	protected $conexao;

	public function __construct() {
		$this->nomeServidor = "localhost";
		$this->nomeUsuario = "mariadb";
		$this->senhaUsuario = "asdf000";
		$this->nomeBanco = "cursoPhp";
		$this->porta = "3306";
		$this->conectar();
	}

	private function conectar() {

	  // Criar conexão
		$this->conexao = new mysqli($this->nomeServidor, $this->nomeUsuario, $this->senhaUsuario, "", $this->porta);

		if ($this->conexao->connect_error) {
			die("Conexão falhou: " . $this->conexao->connect_error);
		}

		echo "Conexão com o banco estabelecida com sucesso.";

		$this->criarBancoDeDados();
	}

	private function criarBancoDeDados() {
		// Cria banco de dados se não existir
		$sql = "CREATE DATABASE IF NOT EXISTS {$this->nomeBanco}";

		if (!mysqli_query($this->conexao, $sql)) {
			echo "Erro ao criar banco de dados: " . mysqli_error($this->conexao);
		}

		echo "<br> Banco de dados criado com sucesso.";
	}

}