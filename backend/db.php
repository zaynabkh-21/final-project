<?php
$mysqli = new mysqli("localhost", "root", "", "blog");
if ($mysqli->connect_error) {
	header("Content-Type: application/json");
	http_response_code(500);
	echo json_encode([
		"status" => "error",
		"message" => "Failed to connect to database"
	]);
	exit();
}