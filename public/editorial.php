<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Susunan Redaksi | Majalah Kelas 3A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- HEADER -->
    <?php include __DIR__ . '/../app/views/navbar.php'; ?>

    <!-- MAIN -->
    <main class="flex-grow max-w-3xl mx-auto w-full p-6">

        <div class="bg-white rounded-xl shadow p-6 md:p-10">

            <!-- REDAKSI INTI -->
            <section class="mb-8">
                <h2 class="text-lg md:text-xl font-semibold mb-4 border-b pb-2">
                    Redaksi Inti
                </h2>

                <ul class="space-y-3 text-gray-700">
                    <li>
                        <span class="font-medium">Editor</span>
                        <span class="mx-2">:</span>
                        <span>Nama Editor</span>
                    </li>
                    <li>
                        <span class="font-medium">Ketua</span>
                        <span class="mx-2">:</span>
                        <span>Nama Ketua</span>
                    </li>
                    <li>
                        <span class="font-medium">Penanggung Jawab</span>
                        <span class="mx-2">:</span>
                        <span>Nama Penanggung Jawab</span>
                    </li>
                </ul>
            </section>

            <!-- ANGGOTA -->
            <section>
                <h2 class="text-lg md:text-xl font-semibold mb-4 border-b pb-2">
                    Anggota Redaksi
                </h2>

                <ol class="list-decimal list-inside space-y-2 text-gray-700">
                    <li>Nama Anggota 1</li>
                    <li>Nama Anggota 2</li>
                    <li>Nama Anggota 3</li>
                    <li>Nama Anggota 4</li>
                    <li>Nama Anggota 5</li>
                </ol>
            </section>

        </div>

        <!-- NAVIGASI -->
        <div class="flex justify-between mt-8 text-sm">

            <a href="index.php"
                class="text-blue-600 hover:underline flex items-center gap-1">
                ← Sampul
            </a>

            <a href="pengantar.php"
                class="text-blue-600 hover:underline flex items-center gap-1">
                Kata Pengantar →
            </a>

        </div>

    </main>

    <!-- FOOTER -->
    <?php include __DIR__ . '/../app/views/footer.php'; ?>

</body>

</html>