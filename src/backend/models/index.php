<?php

$dados = [
    "nome" => "Gabriel",
    "sobrenome" => "Vitor",
    "idade" => 14,
    "endereco" => [
        "rua" => "rua Augusto Pasquali",
        "bairro" => "Bota fogo",
    ]
];

// var_dump($dados);

echo json_encode($dados);