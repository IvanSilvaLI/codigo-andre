<?php
// Faz a conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "root", "ongbomsamaritano");

// Verifica a conexão
if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verifica se os dados foram enviados pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_doador = $_POST["nome_doador"];
    $item_doado = $_POST["item_doado"];
    $quantidade = $_POST["quantidade"];
    $data_doacao = $_POST["data_doacao"];

    // Query para inserir os dados na tabela de doações
    $query = "INSERT INTO doacoes (nome_doador, item_doado, quantidade, data_doacao) VALUES ('$nome_doador', '$item_doado', '$quantidade', '$data_doacao')";

    if (mysqli_query($conn, $query)) {
        echo "Doação registrada com sucesso!";
    } else {
        echo "Erro ao registrar a doação: " . mysqli_error($conn);
    }
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
