<?php
// Conexão com o banco de dados
$conn = mysqli_connect("localhost", "root", "root", "ongbomsamaritano");

// Verifica a conexão
if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verifica se o parâmetro "id" está presente na URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query para deletar o registro pelo ID
    $sql = "DELETE FROM voluntarios WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        echo "Registro deletado com sucesso!";
    } else {
        echo "Erro ao deletar o registro: " . mysqli_error($conn);
    }
} else {
    echo "ID não fornecido na URL.";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>
