<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "oongbomsamaritano";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Obter os valores do formulário
$nome = $_POST['nome'];
$dados_pessoais = $_POST['dados_pessoais'];
$numero_quarto = $_POST['numero_quarto'];
$leito = $_POST['leito'];
$data_internacao = $_POST['data_internacao'];
$data_alta = $_POST['data_alta'];
$responsavel = $_POST['responsavel'];
$telefone_responsavel = $_POST['telefone_responsavel'];

// Inserir os dados na tabela de pacientes
$sql = "INSERT INTO paciente (nome_paciente, dados_pessoais, numero_do_quarto, leito, data_internacao, data_alta, responsavel_paciente, telefone_responsavel) 
        VALUES ('$nome', '$dados_pessoais', '$numero_quarto', '$leito', '$data_internacao', '$data_alta', '$responsavel', '$telefone_responsavel')";

if ($conn->query($sql) === TRUE) {
    echo "Dados do paciente salvos com sucesso!";
} else {
    echo "Erro ao salvar os dados do paciente: " . $conn->error;
}

$conn->close();
?>
