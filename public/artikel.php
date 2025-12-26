<?php
require_once __DIR__ . '/../app/config/database.php';

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
    die("Artikel tidak valid.");
}

// Ambil artikel aktif
$stmt = $pdo->prepare("
    SELECT *
    FROM articles
    WHERE id = :id
");
$stmt->execute(['id' => $id]);
$article = $stmt->fetch();

if (!$article) {
    die("Artikel tidak ditemukan.");
}

// Ambil artikel sebelumnya (presensi lebih kecil)
$prevStmt = $pdo->prepare("
    SELECT id
    FROM articles
    WHERE npm < :npm
    ORDER BY npm DESC
    LIMIT 1
");
$prevStmt->execute(['npm' => $article['npm']]);
$prev = $prevStmt->fetch();

// Ambil artikel berikutnya (presensi lebih besar)
$nextStmt = $pdo->prepare("
    SELECT id
    FROM articles
    WHERE npm > :npm
    ORDER BY npm ASC
    LIMIT 1
");
$nextStmt->execute(['npm' => $article['npm']]);
$next = $nextStmt->fetch();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($article['title']) ?> | Majalah Kelas 3A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- HEADER -->
    <?php include __DIR__ . '/../app/views/navbar.php'; ?>
    <h1 class="text-lg md:text-2xl font-bold text-center">
        ISI ARTIKEL
    </h1>
    <p class="text-center text-sm md:text-base opacity-90 mt-1">
        Majalah Bahasa Indonesia Kelas 3A
    </p>

    <!-- MAIN -->
    <main class="flex-grow max-w-5xl mx-auto w-full px-4 md:px-6 py-10 mb-20">

        <!-- INFO ARTIKEL -->

        <h2 class="text-xl text-center md:text-2xl font-bold text-gray-800 mb-2">
            <?= htmlspecialchars($article['title']) ?>
        </h2>

        <p class="text-sm md:text-base text-gray-600 mb-2">
            Ditulis oleh <span class="font-medium"><?= htmlspecialchars($article['author_name']) ?></span>
            · NPM <?= htmlspecialchars($article['npm']) ?>
        </p>


        <!-- KONTEN ARTIKEL -->
        <div class="bg-white rounded-xl shadow overflow-hidden h-[70vh] md:h-[75vh]">

            <iframe
                src="<?= htmlspecialchars($article['gdrive_link']) ?>"
                class="w-full h-full"
                frameborder="0"
                allowfullscreen>
            </iframe>

        </div>

        <!-- NAVIGASI ARTIKEL -->
        <div class="flex justify-between items-center mt-8 text-sm">

            <!-- PREVIOUS -->
            <?php if ($prev): ?>
                <a href="artikel.php?id=<?= $prev['id'] ?>"
                    class="text-blue-600 hover:underline">
                    ← Back
                </a>
            <?php else: ?>
                <span class="text-gray-400">← Back</span>
            <?php endif; ?>

            <a href="daftar-isi.php"
                class="text-blue-600 hover:underline">
                Daftar Artikel
            </a>

            <!-- NEXT -->
            <?php if ($next): ?>
                <a href="artikel.php?id=<?= $next['id'] ?>"
                    class="text-blue-600 hover:underline">
                    Next →
                </a>
            <?php else: ?>
                <a href="penutup.php" class="text-blue-600 hover:underline">Penutup →</a>
            <?php endif; ?>

        </div>

    </main>

    <!-- FOOTER -->
    <?php include __DIR__ . '/../app/views/footer.php'; ?>

</body>

</html>