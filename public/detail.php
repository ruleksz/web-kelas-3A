<?php
require_once __DIR__ . '/../app/config/database.php';

// validasi parameter id
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Artikel tidak ditemukan.");
}

$id = (int) $_GET['id'];

try {
    $sql = "SELECT title, content, author, created_at 
            FROM articles 
            WHERE id = :id
            LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $article = $stmt->fetch();
} catch (PDOException $e) {
    die("Query gagal: " . $e->getMessage());
}

// jika artikel tidak ada
if (!$article) {
    die("Artikel tidak ditemukan.");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($article['title']) ?> - Artikel Kelas 3A</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<!-- Header -->
<header class="bg-blue-600 text-white p-6 shadow">
    <h1 class="text-2xl font-bold">📘 Artikel Kelas 3A</h1>
    <p class="text-sm opacity-90">Detail Artikel</p>
</header>

<!-- Content -->
<main class="max-w-4xl mx-auto p-6">

    <a href="index.php" class="text-blue-600 hover:underline text-sm">
        ← Kembali ke daftar artikel
    </a>

    <article class="bg-white p-6 rounded shadow mt-4">
        <h2 class="text-2xl font-bold mb-2">
            <?= htmlspecialchars($article['title']) ?>
        </h2>

        <p class="text-sm text-gray-500 mb-6">
            ✍️ <?= htmlspecialchars($article['author'] ?? 'Anonim') ?> • 
            <?= date('d M Y', strtotime($article['created_at'])) ?>
        </p>

        <div class="prose max-w-none text-gray-800">
            <?= nl2br(htmlspecialchars($article['content'])) ?>
        </div>
    </article>

</main>

<!-- Footer -->
<footer class="text-center text-sm text-gray-500 py-6">
    © <?= date('Y') ?> Web Kelas 3A
</footer>

</body>
</html>
