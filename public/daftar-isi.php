<?php
require_once __DIR__ . '/../app/config/database.php';

$articles = $pdo->query("
    SELECT *
    FROM articles
    ORDER BY created_at DESC
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Artikel Kelas 3A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- HEADER -->
    <?php include __DIR__ . '/../app/views/navbar.php'; ?>

    <!-- MAIN -->
    <main class="flex-grow max-w-6xl mx-auto w-full p-4 md:p-6">
        <h1 class="text-xl md:text-2xl font-bold text-center">
            DAFTAR ARTIKEL
        </h1>
        <p class="text-center text-sm md:text-base opacity-90 mt-1">
            Majalah Bahasa Indonesia Kelas 3A
        </p>

        <!-- TOP ACTION -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
            <a href="upload.php"
                class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium shadow transition-all duration-500 ease-in-out">
                <ion-icon name="add" class="text-xl"></ion-icon> Upload Artikel
            </a>

            <!-- TOGGLE -->
            <div class="flex gap-2">
                <button id="btnGrid"
                    class="px-4 py-2 rounded-lg bg-blue-600 text-white text-sm font-medium flex item-center gap-1">
                    <ion-icon name="grid-outline" class="text-lg"></ion-icon>
                </button>
                <button id="btnList"
                    class="px-4 py-2 rounded-lg bg-gray-200 text-gray-700 text-sm font-medium flex item-center gap-1 ">
                    <ion-icon name="list-outline" class="text-lg"></ion-icon>
                </button>
            </div>
        </div>

        <?php if (empty($articles)): ?>
            <div class="bg-white p-6 rounded-xl shadow text-gray-600">
                Belum ada artikel.
            </div>
        <?php else: ?>

            <!-- ================= GRID VIEW ================= -->
            <div id="gridView" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">

                <?php foreach ($articles as $a): ?>

                    <?php
                    // DETEKSI TIPE FILE DARI LINK GOOGLE DRIVE
                    if (str_contains($a['gdrive_link'], '/document/')) {
                        $fileType = 'DOC';
                        $badgeClass = 'bg-blue-100 text-blue-700';
                        $iconColor = 'text-blue-500';
                    } elseif (str_contains($a['gdrive_link'], '/presentation/')) {
                        $fileType = 'PPT';
                        $badgeClass = 'bg-orange-100 text-orange-700';
                        $iconColor = 'text-orange-500';
                    } elseif (str_contains($a['gdrive_link'], '/spreadsheets/')) {
                        $fileType = 'XLS';
                        $badgeClass = 'bg-green-100 text-green-700';
                        $iconColor = 'text-green-500';
                    } else {
                        $fileType = 'PDF';
                        $badgeClass = 'bg-red-100 text-red-700';
                        $iconColor = 'text-red-500';
                    }
                    ?>

                    <div class="relative bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex flex-col">

                        <!-- FILE TYPE BADGE (KANAN ATAS) -->
                        <span class="absolute top-3 right-3 text-xs font-semibold px-3 py-1 rounded-full <?= $badgeClass ?>">
                            <?= $fileType ?>
                        </span>

                        <!-- ICON -->
                        <div class="flex justify-center xl:text-[200px] text-6xl mb-3 <?= $iconColor ?>">
                            <ion-icon name="document-text"></ion-icon>
                        </div>

                        <!-- TITLE -->
                        <h3 class="font-semibold text-lg text-gray-800 line-clamp-2 mb-1">
                            <?= htmlspecialchars($a['title']) ?>
                        </h3>

                        <!-- AUTHOR -->
                        <p class="text-base text-gray-500 mb-1">
                            <?= htmlspecialchars($a['author_name']) ?>
                        </p>

                        <!-- NPM -->
                        <p class="text-base text-gray-500 mb-3">
                            <?= htmlspecialchars($a['npm']) ?>
                        </p>

                        <!-- ACTION -->
                        <div class="mt-auto flex justify-between text-base">
                            <a href="artikel.php?id=<?= $a['id'] ?>"
                                class="flex items-center gap-1 text-blue-600
                            hover:bg-blue-200 hover:rounded-full p-2
                            transition-all duration-300 ease-in-out">
                                <ion-icon name="eye"></ion-icon> View
                            </a>

                            <form action="delete.php" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus?');">
                                <input type="hidden" name="id" value="<?= $a['id'] ?>">
                                <button
                                    class="flex items-center gap-1 text-red-600
                                hover:bg-red-200 hover:rounded-full p-2
                                transition-all duration-300 ease-in-out">
                                    <ion-icon name="trash"></ion-icon> Delete
                                </button>
                            </form>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>


            <!-- ================= LIST VIEW ================= -->
            <div id="listView" class="hidden">

                <!-- DESKTOP TABLE -->
                <div class="hidden md:block bg-white rounded-xl shadow overflow-hidden">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-100 text-gray-700 uppercase text-xm">
                            <tr>
                                <th class="px-6 py-4 text-left">Judul</th>
                                <th class="px-6 py-4 text-left">Nama</th>
                                <th class="px-6 py-4 text-left">NPM</th>
                                <th class="px-6 py-4 text-left">Type</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            <?php foreach ($articles as $a): ?>
                                <tr class="hover:bg-gray-100">
                                    <td class="px-6 py-4 font-medium text-md">
                                        <?= htmlspecialchars($a['title']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-md">
                                        <?= htmlspecialchars($a['author_name']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-md">
                                        <?= htmlspecialchars($a['npm']) ?>
                                    </td>
                                    <td class="px-6 py-4 text-center text-md">
                                        <?php
                                        $type = strtolower($a['file_type']);

                                        switch ($type) {
                                            case 'pdf':
                                                $badge = 'bg-red-100 text-red-700';
                                                $label = 'PDF';
                                                break;
                                            case 'doc':
                                            case 'docx':
                                                $badge = 'bg-blue-100 text-blue-700';
                                                $label = 'DOC';
                                                break;
                                            case 'ppt':
                                            case 'pptx':
                                                $badge = 'bg-orange-100 text-orange-700';
                                                $label = 'PPT';
                                                break;
                                            case 'xls':
                                            case 'xlsx':
                                                $badge = 'bg-green-100 text-green-700';
                                                $label = 'XLS';
                                                break;
                                            default:
                                                $badge = 'bg-gray-100 text-gray-700';
                                                $label = strtoupper($type ?: 'FILE');
                                        }
                                        ?>

                                        <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $badge ?>">
                                            <?= $label ?>
                                        </span>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex justify-center gap-4">
                                            <a href="artikel.php?id=<?= $a['id'] ?>"
                                                class="flex items-center gap-1 text-blue-600 hover:bg-blue-200 hover:rounded-full p-2 transition-all duration-300 ease-in-out font-semibold">
                                                <ion-icon name="eye"></ion-icon> View
                                            </a>
                                            <form action="delete.php" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus?');">
                                                <input type="hidden" name="id" value="<?= $a['id'] ?>">
                                                <button class="flex items-center gap-1 text-red-600 hover:bg-red-200 hover:rounded-full p-2 transition-all duration-300 ease-in-out font-semibold">
                                                    <ion-icon name="trash"></ion-icon> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- MOBILE CARD -->
                <div class="md:hidden space-y-4">
                    <?php foreach ($articles as $a): ?>

                        <?php
                        // DETEKSI TIPE FILE
                        $type = strtolower($a['file_type']);
                        switch ($type) {
                            case 'pdf':
                                $badge = 'bg-red-100 text-red-700';
                                $label = 'PDF';
                                break;
                            case 'doc':
                            case 'docx':
                                $badge = 'bg-blue-100 text-blue-700';
                                $label = 'DOC';
                                break;
                            case 'ppt':
                            case 'pptx':
                                $badge = 'bg-orange-100 text-orange-700';
                                $label = 'PPT';
                                break;
                            case 'xls':
                            case 'xlsx':
                                $badge = 'bg-green-100 text-green-700';
                                $label = 'XLS';
                                break;
                            default:
                                $badge = 'bg-gray-100 text-gray-700';
                                $label = strtoupper($type ?: 'FILE');
                        }
                        ?>

                        <div class="bg-white rounded-xl shadow p-4 relative">

                            <!-- CONTENT -->
                            <h3 class="font-semibold text-gray-800">
                                <?= htmlspecialchars($a['title']) ?>
                            </h3>
                            <p class="text-sm text-gray-500">
                                <?= htmlspecialchars($a['author_name']) ?>
                            </p>
                            <p class="text-sm text-gray-500">
                                NPM: <?= htmlspecialchars($a['npm']) ?>
                            </p>

                            <!-- FILE TYPE BADGE -->
                            <span class="text-xs font-semibold px-3 py-1 rounded-full <?= $badge ?>">
                                <?= $label ?>
                            </span>

                            <!-- ACTION -->
                            <div class="flex justify-center gap-6 mt-4 text-sm">

                                <!-- VIEW -->
                                <a href="view.php?id=<?= $a['id'] ?>"
                                    class="flex items-center gap-1 text-blue-600 hover:bg-blue-200 hover:rounded-full p-2 transition-all duration-300 ease-in-out">
                                    <ion-icon name="eye"></ion-icon> View
                                </a>

                                <!-- DELETE -->
                                <form action="delete.php" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?');">
                                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                                    <button
                                        class="flex items-center gap-1 text-red-600 hover:bg-red-200 hover:rounded-full p-2 transition-all duration-300 ease-in-out">
                                        <ion-icon name="trash"></ion-icon> Delete
                                    </button>
                                </form>

                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>


            </div>
        <?php endif; ?>
        <!-- NAVIGASI -->
        <div class="flex justify-between mt-8 text-sm">

            <a href="pengantar.php"
                class="text-blue-600 hover:underline">
                ← Kata Pengantar
            </a>

            <a href="penutup.php"
                class="text-blue-600 hover:underline">
                Penutup →
            </a>

        </div>

    </main>

    <!-- FOOTER -->
    <?php include __DIR__ . '/../app/views/footer.php'; ?>

    <!-- ICONS -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- TOGGLE SCRIPT -->
    <script>
        const btnGrid = document.getElementById('btnGrid');
        const btnList = document.getElementById('btnList');
        const gridView = document.getElementById('gridView');
        const listView = document.getElementById('listView');

        btnGrid.onclick = () => {
            gridView.classList.remove('hidden');
            listView.classList.add('hidden');
            btnGrid.classList.replace('bg-gray-200', 'bg-blue-600');
            btnGrid.classList.replace('text-gray-700', 'text-white');
            btnList.classList.replace('bg-blue-600', 'bg-gray-200');
            btnList.classList.replace('text-white', 'text-gray-700');
        };

        btnList.onclick = () => {
            listView.classList.remove('hidden');
            gridView.classList.add('hidden');
            btnList.classList.replace('bg-gray-200', 'bg-blue-600');
            btnList.classList.replace('text-gray-700', 'text-white');
            btnGrid.classList.replace('bg-blue-600', 'bg-gray-200');
            btnGrid.classList.replace('text-white', 'text-gray-700');
        };
    </script>

</body>

</html>