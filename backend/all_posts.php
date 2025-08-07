<?php
include 'db.php';
header("Content-Type: application/json");

$sql = "SELECT p.id, p.title, p.content, p.created_at, COUNT(c.id) AS comment_count
        FROM posts p
        LEFT JOIN comments c ON p.id = c.post_id
        GROUP BY p.id
        ORDER BY p.created_at DESC";

$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode(["status" => "success", "data" => $posts]);
?>