<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Penutup | Majalah Kelas 3A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- HEADER -->
    <?php include __DIR__ . '/../app/views/navbar.php'; ?>
    <h1 class="text-xl md:text-2xl font-bold text-center">
        PENUTUP
    </h1>
    <p class="text-center text-sm md:text-base opacity-90 mt-1">
        Majalah Bahasa Indonesia Kelas 3A
    </p>

    <!-- MAIN -->
    <main class="flex-grow max-w-3xl mx-auto w-full
                 px-6 py-10 mt-4 mb-20">

        <div class="bg-white rounded-xl shadow p-6 md:p-10
                    text-gray-700 leading-relaxed text-justify">

            <p class="mb-4">
                Dengan tersusunnya Majalah Bahasa Indonesia Kelas 3A ini,
                kami berharap seluruh karya tulis yang dimuat dapat memberikan
                manfaat serta menjadi sarana pengembangan kemampuan menulis
                bagi mahasiswa.
            </p>

            <p class="mb-4">
                Majalah digital ini merupakan hasil kerja sama dan partisipasi
                seluruh mahasiswa Kelas 3A yang telah berkontribusi melalui
                karya tulis masing-masing sesuai dengan urutan presensi.
                Oleh karena itu, kami mengucapkan terima kasih kepada seluruh
                pihak yang telah mendukung penyusunan majalah ini.
            </p>

            <p class="mb-4">
                Kami menyadari bahwa majalah ini masih memiliki keterbatasan
                dan kekurangan. Kritik serta saran yang bersifat membangun
                sangat kami harapkan demi penyempurnaan karya ini di masa
                yang akan datang.
            </p>

            <p class="mb-8">
                Akhir kata, semoga Majalah Bahasa Indonesia Kelas 3A ini dapat
                menjadi dokumentasi yang bermanfaat serta memberikan nilai
                positif bagi pembaca dan civitas akademika.
            </p>

            <!-- TANDA TANGAN -->
            <div class="text-right mt-10">
                <p>
                    Kelas 3A
                </p>
                <p class="font-semibold">
                    Program Studi / Jurusan
                </p>
                <p>
                    Tahun Ajaran 2024 / 2025
                </p>
            </div>

        </div>

        <!-- NAVIGASI -->
        <div class="flex justify-between mt-8 text-sm">

            <a href="daftar-isi.php"
                class="text-blue-600 hover:underline">
                ← Daftar Artikel
            </a>

            <a href="index.php"
                class="text-blue-600 hover:underline">
                Sampul →
            </a>

        </div>

    </main>

    <!-- FOOTER -->
    <?php include __DIR__ . '/../app/views/footer.php'; ?>

</body>

</html>