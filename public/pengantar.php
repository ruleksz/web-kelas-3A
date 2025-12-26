<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kata Pengantar | Majalah Kelas 3A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- HEADER -->
    <?php include __DIR__ . '/../app/views/navbar.php'; ?>
    <h1 class="text-xl md:text-2xl font-bold text-center mt-4">
        KATA PENGANTAR
    </h1>
    <p class="text-center text-sm md:text-base opacity-90 mt-1">
        Majalah Bahasa Indonesia Kelas 3A
    </p>

    <!-- MAIN -->
    <main class="flex-grow max-w-3xl mx-auto w-full p-6">

        <div class="bg-white rounded-xl shadow p-6 md:p-10 text-gray-700 leading-relaxed text-justify">

            <p class="mb-4">
                Puji syukur kami panjatkan ke hadirat Tuhan Yang Maha Esa karena atas
                rahmat dan karunia-Nya, Majalah Bahasa Indonesia Kelas 3A ini dapat
                disusun dan diselesaikan dengan baik.
            </p>

            <p class="mb-4">
                Majalah digital ini merupakan kumpulan karya tulis mahasiswa Kelas 3A
                yang disusun sebagai bagian dari pemenuhan tugas mata kuliah Bahasa
                Indonesia. Setiap artikel yang dimuat di dalam majalah ini ditulis
                secara mandiri oleh mahasiswa sesuai dengan urutan presensi kelas.
            </p>

            <p class="mb-4">
                Penyusunan majalah ini bertujuan untuk melatih kemampuan mahasiswa
                dalam menuangkan ide dan gagasan secara sistematis, logis, dan
                komunikatif melalui tulisan ilmiah maupun populer. Selain itu,
                majalah ini diharapkan dapat menjadi sarana dokumentasi karya tulis
                mahasiswa Kelas 3A.
            </p>

            <p class="mb-4">
                Kami menyadari bahwa dalam penyusunan majalah ini masih terdapat
                keterbatasan dan kekurangan. Oleh karena itu, kami mengharapkan
                kritik dan saran yang bersifat membangun demi penyempurnaan majalah
                ini di masa yang akan datang.
            </p>

            <p class="mb-8">
                Akhir kata, kami mengucapkan terima kasih kepada semua pihak yang
                telah berpartisipasi dan mendukung tersusunnya Majalah Bahasa
                Indonesia Kelas 3A ini. Semoga majalah ini dapat memberikan manfaat
                bagi pembaca.
            </p>

            <!-- PENULIS -->
            <div class="text-right mt-10">
                <p class="font-semibold">
                    Penulis Kata Pengantar
                </p>
                <p>
                    Nama Penulis
                </p>
            </div>

        </div>

        <!-- NAVIGASI -->
        <div class="flex justify-between mt-8 text-sm">

            <a href="editorial.php"
                class="text-blue-600 hover:underline">
                ← Redaksi
            </a>

            <a href="daftar-isi.php"
                class="text-blue-600 hover:underline">
                Daftar Artikel →
            </a>

        </div>

    </main>

    <!-- FOOTER -->
    <?php include __DIR__ . '/../app/views/footer.php'; ?>

</body>

</html>