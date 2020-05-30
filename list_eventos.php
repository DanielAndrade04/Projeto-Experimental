<?php

include 'conexao.php';

$query_events = "SELECT id, title, description, color, start FROM events";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['id'];
    $title = $row_events['title'];
    $description = $row_events['description'];
    $color = $row_events['color'];
    $start = $row_events['start'];

    
    $eventos[] = [
        'id' => $id, 
        'title' => $title, 
        'description' => $description,
        'color' => $color,
        'start' => $start, 
        ];
}

echo json_encode($eventos);