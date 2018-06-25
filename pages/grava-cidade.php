<?php

// Recebe os dados do formulário
$nome_cidade = $_POST["nome_cidade"];
$estado = $_POST["estado"];

// Verifica se os dados estão corretos
$nome_cidade = trim($nome_cidade);

$erros = "";
if ( empty($nome_cidade) )
    $erros .= "Campo nome da cidade está vazio. ";

if (!empty($erros))
{
    echo "
        <html>
            <head>
                <META http-equiv=\"refresh\" content=\"0;URL=http://agenda.local/pages/cad-cidade.php\">
                
            </head>
            <body onload='alert($erros);'></body>
        </html>
    ";
} else {
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

// Cria a sentença SQL para inserir o usuário
$sql = "insert into tbl_usuarios (nome_usuario, senha) values(\"$nome_usuario\", \"$senha\")";

// Envia o insert para o banco de dados
$result = mysqli_query($sql);

?>

echo "<html>
    <head>
        <META http-equiv=\"refresh\" content=\"1;URL=http://agenda.local/pages/cad-cidade.php\">
    </head>
</html>";
}
