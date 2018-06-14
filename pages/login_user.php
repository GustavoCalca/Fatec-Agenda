<?php

// Recebe os dados do formulário
$nome_usuario = $_POST["user"];
$senha = $_POST["password"];

// Verifica se os dados estão corretos
$nome_usuario = trim($nome_usuario);
$senha = trim($senha);

$erros = "";
if ( empty($nome_usuario) )
    $erros .= "Campo nome do usuário está vazio.<br>";

if ( empty($senha) )
    $erros .= "Senha está vazia.<br>";

if ( !empty($erros) )
{
    echo "
        Foram encontradas inconsistências de dados.<br>
        Veja abaixo os erros identificados:<br>" .  $erros;

    echo "<br><br><a href='http://agenda.local/pages/login.php'>Clique aqui para voltar</a>";
}

// Parametriza a conexão com o banco de dados

$host = "localhost";
$user = "root";
$password = "root";
$database = "agenda";

// Faz a conexão com o servidor MySQL
$con = mysqli_connect($host, $user, $password);

// Verifica se ocorreu erro de conexão
if (!$con) {
    // Se sim, então encerra o programa com uma mensagem de erro
    die("Erro de conexão com o servidor do BD");
}

// Determina qual banco de dados que será utilizado
$db = mysqli_select_db($con, $database);

// Verifica se ocorreu erro na seleção
if (!$db) {
    // Se sim, então encerra o programa com uma mensagem de erro
    die("Erro ao selecionar o banco de dados.");
}

// Cria a sentença SQL para consultar o banco de dados
$sql = "select * from tbl_usuarios where nome_usuario=\"$nome_usuario\" and senha=\"$senha\" limit 1";

// Enviar a pesquisa para o banco de dados
$result = mysqli_query($con, $sql);

// Verifica quantas linhas foram recuperadas da consulta
$nro_registros = mysqli_num_rows($result);
if ($nro_registros == 0) {
    echo "
    <script>
        alert('Usuário não encontrado');
    </script>

    <html>
    <head>
        <META http-equiv=\"refresh\" content=\"0;URL=http://agenda.local/pages/login.php\">
    </head>
</html>
    ";
} else {
    echo "
    <html>
    <head>
        <META http-equiv=\"refresh\" content=\"0;URL=http://agenda.local/pages/dashboard.php\">
    </head>
</html>
    ";
}

?>
