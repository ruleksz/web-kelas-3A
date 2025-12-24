<?php
require_once __DIR__ . '/app/config/database.php';

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
$stmt->execute(['id' => $id]);
$a = $stmt->fetch();

if (!$a || $a['file_type'] !== 'pdf') {
    http_response_code(404);
    exit;
}

header("Content-Type: application/pdf");
header("Content-Disposition: inline; filename=\"" . basename($a['file_path']) . "\"");
readfile($a['file_path']);
exit;
