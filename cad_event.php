<?php
session_start();

include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
$data_start = str_replace('/', '-', $dados['start']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$query_event = "INSERT INTO events (title, description, color, start) VALUES (:title, :description, :color, :start)";

$insert_event = $conn->prepare($query_event);
$insert_event->bindParam(':title', $dados['title']);
$insert_event->bindParam(':description', $dados['description']);
$insert_event->bindParam(':color', $dados['color']);
$insert_event->bindParam(':start', $data_start_conv);

if ($insert_event->execute()) {
    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Horário cadastrado com sucesso! Entraremos em contato para confirmar seu horário.</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Horário cadastrado com sucesso! Entraremos em contato para confirmar seu horário.</div>';
} else {
    $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Horário não foi cadastrado com sucesso!</div>'];
}


header('Content-Type: application/json');
echo json_encode($retorna);
