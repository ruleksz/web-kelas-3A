<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Majalah Bahasa Indonesia Kelas 3A</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-blue-700 via-blue-600 to-blue-500
             flex items-center justify-center text-white">

    <!-- CONTAINER -->
    <div class="text-center px-6 max-w-3xl">

        <!-- JUDUL UTAMA -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-wide mb-4">
            MAJALAH BAHASA INDONESIA
        </h1>

        <!-- SUB JUDUL -->
        <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold mb-2">
            KELAS 3A
        </h2>

        <!-- TAHUN -->
        <p class="text-sm sm:text-base md:text-lg opacity-90 mb-10">
            Tahun Ajaran 2025 / 2026
        </p>

        <!-- GARIS PEMISAH -->
        <div class="w-24 h-1 bg-white mx-auto mb-10 rounded-full"></div>

        <!-- DESKRIPSI -->
        <p class="text-sm sm:text-base md:text-lg leading-relaxed mb-10 opacity-95">
            Majalah digital ini berisi kumpulan artikel mahasiswa Kelas 3A
            yang disusun secara sistematis berdasarkan urutan presensi,
            sebagai bentuk implementasi karya tulis dalam mata kuliah
            Bahasa Indonesia.
        </p>

        <!-- TOMBOL -->
        <div class="flex justify-center gap-4 flex-wrap">

            <a href="editorial.php" class="px-6 py-3 bg-white text-blue-700 font-semibold rounded-full hover:bg-gray-100 transition-all duration-300 ease-in-out shadow">
                📖 Mulai Membaca
            </a>

        </div>

        <!-- FOOTER MINI -->
        <p class="mt-12 text-xs sm:text-sm opacity-80">
            © <?= date('Y') ?> Heru Nur Cahyono · Majalah Digital
        </p>

    </div>

</body>

</html>
