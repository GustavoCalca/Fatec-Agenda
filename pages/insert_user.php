<?php

// Recebe os dados do formulário
$nome_usuario = $_POST["user"];
$email = $_POST["email"];
$senha = $_POST["password"];

// Verifica se os dados estão corretos
$nome_usuario = trim($nome_usuario);
$email = trim($email);
$senha = trim($senha);

$erros = "";
if ( empty($nome_usuario) )
    $erros .= "Campo nome do usuário está vazio.<br>";

if ( empty($email) )
    $erros .= "Campo e-mail está vazio.<br>";

if ( empty($senha) )
    $erros .= "Senha está vazia.<br>";

if ( !empty($erros) )
{
    echo "
        Foram encontradas inconsistências de dados.<br>
        Veja abaixo os erros identificados:<br>" .  $erros;

    echo "<br><br><a href='http://agenda.local/pages/register.php'>Clique aqui para voltar</a>";
}

// Parametriza a conexão com o banco de dados

$host = "localhost:3306";
$user = "homestead";
$password = "secret";
$database = "agenda";

$con = mysqli_connect($host, $user, $password);

if (!$con) {
    die("Erro de conexão com o servidor do BD");
}


?>