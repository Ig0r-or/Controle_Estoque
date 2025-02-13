<?php
header('Content-Type: application/json');

// Configurações do banco de dados
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Falha na conexão com o banco de dados: ' . $conn->connect_error]));
}

// Receber dados da solicitação AJAX
$data = json_decode(file_get_contents("php://input"), true);

$row = $data['row'];
$cell = $data['cell'];
$value = $data['value'];

// Mapear colunas com base no índice da célula
$columns = ["cabecario", "item","quantidade", "janeiro", "fevereiro", "marco", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"]; // Adicione suas outras colunas aqui

// Atualizar o banco de dados
$sql = "UPDATE `itens` SET `" . $columns[$cell] . "` = ? WHERE `id` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('si', $value, $row);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Dados atualizados com sucesso!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Falha ao atualizar dados: ' . $stmt->error]);
}

$stmt->close();
$conn->close();
?>
