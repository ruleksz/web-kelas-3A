<?php
$current = basename($_SERVER['PHP_SELF']);
function active($page, $current)
{
    return $page === $current
        ? 'text-white font-semibold underline'
        : 'text-white/90 hover:text-white';
}
?>
<header class="bg-sky-500 text-white shadow sticky top-0 z-50">
    <nav class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

        <!-- TITLE -->
        <h1 class="text-lg md:text-xl font-bold">
            Majalah Kelas 3A
        </h1>

        <!-- HAMBURGER -->
        <button id="menuBtn"
            class="md:hidden relative w-8 h-8 flex flex-col justify-center items-center gap-1 focus:outline-none">

            <span class="bar w-6 h-0.5 bg-white transition-all duration-300 ease-in-out"></span>
            <span class="bar w-6 h-0.5 bg-white transition-all duration-300 ease-in-out"></span>
            <span class="bar w-6 h-0.5 bg-white transition-all duration-300 ease-in-out"></span>
        </button>

        <!-- MENU DESKTOP -->
        <div class="hidden md:flex gap-6 text-sm md:text-base">
            <a href="index.php" class="<?= active('index.php', $current) ?>">Sampul</a>
            <a href="editorial.php" class="<?= active('editorial.php', $current) ?>">Redaksi</a>
            <a href="pengantar.php" class="<?= active('pengantar.php', $current) ?>">Pengantar</a>
            <a href="daftar-isi.php" class="<?= active('daftar-isi.php', $current) ?>">Artikel</a>
            <a href="penutup.php" class="<?= active('penutup.php', $current) ?>">Penutup</a>
        </div>
    </nav>

    <!-- MENU MOBILE -->
    <div id="mobileMenu"
        class="md:hidden bg-sky-500 border-t border-white/20
               overflow-hidden max-h-0 opacity-0
               transition-all duration-300 ease-in-out">

        <div class="flex flex-col px-4 py-4 space-y-3 text-sm">
            <a href="index.php" class="<?= active('index.php', $current) ?>">Sampul</a>
            <a href="editorial.php" class="<?= active('editorial.php', $current) ?>">Redaksi</a>
            <a href="pengantar.php" class="<?= active('pengantar.php', $current) ?>">Pengantar</a>
            <a href="daftar-isi.php" class="<?= active('daftar-isi.php', $current) ?>">Artikel</a>
            <a href="penutup.php" class="<?= active('penutup.php', $current) ?>">Penutup</a>
        </div>
    </div>
</header>

<script>
    const btn = document.getElementById('menuBtn');
    const menu = document.getElementById('mobileMenu');
    const bars = btn.querySelectorAll('.bar');

    let open = false;

    btn.addEventListener('click', () => {
        open = !open;

        // MENU ANIMATION
        if (open) {
            menu.classList.remove('max-h-0', 'opacity-0');
            menu.classList.add('max-h-96', 'opacity-100');
        } else {
            menu.classList.add('max-h-0', 'opacity-0');
            menu.classList.remove('max-h-96', 'opacity-100');
        }

        // HAMBURGER → X
        bars[0].classList.toggle('rotate-45');
        bars[0].classList.toggle('translate-y-2');

        bars[1].classList.toggle('opacity-0');

        bars[2].classList.toggle('-rotate-45');
        bars[2].classList.toggle('-translate-y-2');
    });
</script>
