<?php
// Verifica se o ID foi fornecido na URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtém o ID da doação a ser excluída
    $doacao_id = $_GET['id'];

    // Faz a conexão com o banco de dados
    $conn = mysqli_connect("localhost", "root", "root", "ongbomsamaritano");

    // Verifica a conexão
    if (!$conn) {
        die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
    }

    // Query para excluir a doação com o ID especificado
    $query = "DELETE FROM doacoes WHERE id = $doacao_id";

    // Executa a query
    if (mysqli_query($conn, $query)) {
        // Redireciona de volta para a página de doações após a exclusão
        header("Location: doacaotabela.php");
        exit();
    } else {
        echo "Erro ao excluir a doação: " . mysqli_error($conn);
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
} else {
    // Se o ID não foi fornecido, redireciona de volta para a página de doações
    header("Location: doacaotabela.php");
    exit();
}
?>
