<?php
require_once __DIR__ . '/../app/config/database.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title        = trim($_POST['title'] ?? '');
    $author_name  = trim($_POST['author_name'] ?? '');
    $npm          = trim($_POST['npm'] ?? '');
    $gdrive_link  = trim($_POST['gdrive_link'] ?? '');

    // VALIDASI WAJIB
    if (
        empty($title) ||
        empty($author_name) ||
        empty($npm) ||
        empty($gdrive_link)
    ) {
        $message = "Semua field wajib diisi.";
    }
    // VALIDASI LINK GOOGLE
    elseif (
        !preg_match(
            '#^https://(drive|docs)\.google\.com/(file|document|presentation|spreadsheets)/d/#',
            $gdrive_link
        )
    ) {
        $message = "Link Google Drive tidak valid.";
    } else {

        // ============================
        // DETEKSI FILE TYPE OTOMATIS
        // ============================
        if (str_contains($gdrive_link, 'docs.google.com/document')) {
            $file_type = 'docx';
        } elseif (str_contains($gdrive_link, 'docs.google.com/presentation')) {
            $file_type = 'ppt';
        } elseif (str_contains($gdrive_link, 'docs.google.com/spreadsheets')) {
            $file_type = 'xls';
        } else {
            // default drive.google.com/file
            $file_type = 'pdf';
        }

        // ============================
        // UBAH LINK KE MODE PREVIEW
        // ============================
        $gdrive_link = preg_replace(
            '#/(edit|view)(\?.*)?$#',
            '/preview',
            $gdrive_link
        );

        // ============================
        // INSERT DATABASE
        // ============================
        $sql = "INSERT INTO articles
                (title, author_name, npm, file_type, gdrive_link)
                VALUES
                (:title, :author_name, :npm, :file_type, :gdrive_link)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'title'        => $title,
            'author_name'  => $author_name,
            'npm'          => $npm,
            'file_type'    => $file_type,
            'gdrive_link'  => $gdrive_link
        ]);

        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Upload Artikel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- HEADER -->
    <header class="bg-blue-600 text-white p-4 md:p-6 shadow">
        <h1 class="text-lg md:text-2xl font-bold"> Upload Artikel
        </h1>
    </header>

    <!-- MAIN -->
    <main class="flex-grow max-w-xl mx-auto w-full p-4 md:p-6">

        <a href="index.php" class="inline-block mb-4 text-blue-600 hover:underline text-sm flex item-center gap-1">
            <ion-icon name="return-up-back" class="text-xl hover:underline"></ion-icon> <span>Home</span>
        </a>

        <div class="bg-white p-5 md:p-6 rounded-xl shadow">

            <?php if ($message): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <form method="POST" enctype="multipart/form-data" class="space-y-4">

                <div>
                    <label class="block text-sm font-medium mb-1">
                        Judul Artikel
                    </label>
                    <input type="text" name="title" required
                        class="w-full border rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">
                        Nama
                    </label>
                    <input type="text" name="author_name" required
                        class="w-full border rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">
                        NPM
                    </label>
                    <input type="text" name="npm" required
                        class="w-full border rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">
                        Link Google Drive (Artikel)
                    </label>
                    <input type="url" name="gdrive_link"
                        placeholder="https://drive.google.com/file/d/..."
                        class="w-full border rounded-lg p-2 text-sm">
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-medium transition">
                    Upload Artikel
                </button>

            </form>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t">
        <div class="max-w-xl mx-auto px-4 py-4 text-center text-xs md:text-sm text-gray-500">
            © <?= date('Y') ?> Web Kelas 3A · Dibuat oleh
            <span class="font-medium text-gray-700">Heru Nur Cahyono</span>
        </div>
    </footer>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>