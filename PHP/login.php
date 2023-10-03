<?php

include "conexao.php";

$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];

// Primeiro, verifique se o login está na tabela CLIENTE
$sql_cliente = "SELECT * FROM CLIENTE WHERE EMAIL_CLIENTE = '$email' AND SENHA_CLIENTE = '$senha'";
$result_cliente = mysqli_query($conn, $sql_cliente);

if ($result_cliente->num_rows == 1) {
    $cliente = $result_cliente->fetch_assoc();
    echo"Login realizado com sucesso!";
    header("refresh: 3; url=../HTML/dadospessoais.html");
} else {
    // Se não foi encontrado na tabela CLIENTE, verifique na tabela RESTAURANTE
    $sql_restaurante = "SELECT * FROM RESTAURANTE WHERE EMAIL_RESTAURANTE = '$email' AND SENHA_RESTAURANTE = '$senha'";
    $result_restaurante = mysqli_query($conn, $sql_restaurante);

    if ($result_restaurante->num_rows == 1) {
        $restaurante = $result_restaurante->fetch_assoc();
        echo"Login realizado com sucesso!";
        header("refresh: 3; url=../HTML/dadospessoais.html");
    } else {
        // Se não foi encontrado em ambas as tabelas, exiba uma mensagem de erro
        echo "Conta inválida ou inexistente!";
    }
}

?>