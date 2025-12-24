<?php
require_once __DIR__ . '/../app/config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

$id = (int)($_POST['id'] ?? 0);

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

// HAPUS DATA LANGSUNG (TANPA FILE)
$stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: index.php");
exit;
