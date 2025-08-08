<?php
include 'db.php';
header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);
if (!isset($input['id']) || !isset($input['content'])) {
    echo json_encode(["error" => "Missing id "]);
    exit();
}

$id = $input['id'];
$content = $input['content'];

$stmt = $pdo->prepare("UPDATE comments SET content = ? WHERE id = ?");
$stmt->execute([$content, $id]);

echo json_encode(["status" => "Comment updated"]);
?>