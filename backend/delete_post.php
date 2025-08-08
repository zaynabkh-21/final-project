<?php
include 'db.php';
header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);
if (!isset($input['id'])) {
    echo json_encode(["error" => "Post ID is required"]);
    exit();
}

$id = $input['id'];
$stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
$stmt->execute([$id]);

echo json_encode(["status" => "Post deleted"]);
?>