<?php
include 'db.php';
header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);
if (!isset($input['id'])) {
    echo json_encode(["error" => "No post ID found"]);
    exit();
}

$id = $input['id'];
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    echo json_encode(["error" => "Post not found"]);
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM comments WHERE post_id = ? ORDER BY id DESC LIMIT 15");
$stmt->execute([$id]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

$post['comments'] = $comments;
echo json_encode($post);
?>