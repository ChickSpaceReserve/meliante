<?php

include "conexao.php";

/*<---- variaveis do formulário ---->*/
$nome             = $_POST['txtnome'];
$email            = $_POST['txtemail'];
$cpf              = $_POST['txtcpf'];
$data_nasc        = $_POST['txtdata_nasc'];
$cidade           = $_POST['txtcidade'];  
$csenha           = $_POST['txtcsenha'];
$senha            = $_POST['txtsenha'];
$telefone         = $_POST['txttelefone'];
$CPF_Contador_Palavras = strlen($cpf);

$ano_atual = date("Y");
$mes_atual = date("m"); /*<---- Pegar dia/mes/ano atual ---->*/
$dia_atual = date("d");
/*
echo"$ano_atual <br>";
echo"$mes_atual <br>";
echo"$dia_atual <br>";
*/
$ano = substr($data_nasc,-10,-6);
$mes = substr($data_nasc,-5,-3); /*<---- Pega a data de nascimento do usuario e divide entre dia/mes/ano  ---->*/
$dia = substr($data_nasc, -2);
/*
echo"$ano <br>";
echo"$mes <br>";
echo"$dia <br>";
*/
/*
echo "Nome: $nome <br>";
echo "E-mail: $email <br>";
echo "CPF: $cpf <br>";
echo "Cidade: $data_nasc <br>";
echo "Cidade: $cidade <br>";
echo "Senha: $senha <br>";
echo "Confirmar senha: $csenha <br>";
echo "Telefone: $telefone <br>";
*/
/*
$idade = $ano_atual - $ano;
*/

$inserir = "INSERT INTO CLIENTE(CPF_CLIENTE,EMAIL_CLIENTE,NOME_CLIENTE,TELEFONE_CLIENTE,DATA_NASC,CIDADE_CLIENTE,SENHA_CLIENTE)
            VALUES($cpf,'$email','$nome','$telefone','$data_nasc','$cidade','$senha')";


/*echo "<br>$inserir<br>";
mysqli_query($conn, $inserir);
echo"Cadastro armazenado com sucesso!";
header("refresh: 0; url=../index.html");
*/


if (strlen($senha) < 8) {
    echo "Senha deve ser maior que 8 caracteres!";
} else {
if($senha === $csenha){
   if( $ano_atual - $ano >=18 && $mes <= $mes_atual){
        if ($CPF_Contador_Palavras != 11) {
            echo "CPF inválido!";
        } else {
            $CPF_V1 = intval($cpf[0]);
            $CPF_V2 = intval($cpf[1]);
            $CPF_V3 = intval($cpf[2]);
            $CPF_V4 = intval($cpf[3]);
            $CPF_V5 = intval($cpf[4]);
            $CPF_V6 = intval($cpf[5]);
            $CPF_V7 = intval($cpf[6]);
            $CPF_V8 = intval($cpf[7]);
            $CPF_V9 = intval($cpf[8]);
            $CPF_V10= intval($cpf[9]);
            $CPF_V11= intval($cpf[10]);
        
            $Resultado_CPF = $CPF_V1 * 1 + $CPF_V2 * 2 + $CPF_V3 * 3 + $CPF_V4 * 4 + $CPF_V5 * 5 + $CPF_V6 * 6 + $CPF_V7 * 7 + $CPF_V8 * 8 + $CPF_V9 * 9;
            $CPF_Verificador1 = $Resultado_CPF % 11;
        
            if ($CPF_Verificador1 == 10) {
                $CPF_Verificador1 = 0;
            }
        
            $Resultado_CPF = $CPF_V1 * 0 + $CPF_V2 * 1 + $CPF_V3 * 2 + $CPF_V4 * 3 + $CPF_V5 * 4 + $CPF_V6 * 5 + $CPF_V7 * 6 + $CPF_V8 * 7 + $CPF_V9 * 8 + $CPF_Verificador1 * 9;
            $CPF_Verificador2 = $Resultado_CPF % 11;
        
            if ($CPF_Verificador2 == 10) {
                $CPF_Verificador2 = 0;
            }
        
            if ($CPF_Verificador1 == $CPF_V10 && $CPF_Verificador2 == $CPF_V11) {
                mysqli_query($conn, $inserir);
                echo"Cadastro armazenado com sucesso!";
                header("refresh: 0; url=../HTML/cadastro.html");
            } else {
                echo "CPF inválido!";
            }
        }
   }
   else{
       echo "Você é menor de idade!!!!!";
   }
} else {
    echo"Senha incorreta! Verifique a senha!";
}
}


/*
echo "<br>
------------------------------------------------------------------------------<br>
$inserir

<br>
";
*/



?>