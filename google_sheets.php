<?php

// Inclua a biblioteca do Google API Client
require_once 'vendor/autoload.php';

// Defina o ID da sua planilha
$spreadsheetId = '1ZBrD5u8iWPyGX_4BHBfJbMFO--M_jnvZJ10f8YaaoVU';

// Inicialize o cliente da API do Google Sheets
$client = new Google_Client();
$client->setApplicationName('Ong_bom_samaritano');
$client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
$client->setAuthConfig('credentials.json'); // Substitua pelo caminho real do seu arquivo de credenciais

// Crie um objeto Google_Service_Sheets para interagir com a planilha
$service = new Google_Service_Sheets($client);

// Especifique o intervalo de células que deseja buscar, por exemplo, "A1:Z1000"
$range = 'A1:Z1000';

// Faça a solicitação para obter os valores da planilha
$response = $service->spreadsheets_values->get($spreadsheetId, $range);
$values = $response->getValues();

if (empty($values)) {
    print "Nenhum dado encontrado na planilha.\n";
} else {
    // Itere pelos valores e faça o que você precisa com eles
    foreach ($values as $row) {
        // Faça algo com os dados da linha, por exemplo:
        echo implode(', ', $row) . "\n";
    }
}

?>
