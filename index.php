<?php
// index.php
// Configura o cabeçalho para receber dados JSON
header("Content-Type: application/json");

$payload = file_get_contents("php://input");
$data = json_decode($payload, true);

print_r(var_dump($data));
echo PHP_EOL;
echo PHP_EOL;

// Verifica se os dados são válidos
if ($data) {
    // Exemplo de processamento
    if (isset($data['event']) && $data['event'] === 'onMessage') {
        $from = $data['data']['from'];
        $message = $data['data']['message']['text'];
        error_log("Mensagem recebida de $from: $message");
        echo "Mensagem recebida de $from: $message" . PHP_EOL;
        return;
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Payload inválido"]);
    exit;
}

// Resposta de sucesso
echo json_encode(["status" => "OK"]) . PHP_EOL;
