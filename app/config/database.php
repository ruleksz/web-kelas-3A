<?php

$host = "aws-1-ap-southeast-1.pooler.supabase.com"; // TANPA SPASI
$port = "5432";
$dbname = "postgres";
$user = "postgres.itcvzzqmtfwybmelntgy";
$password = "Kelas3a!123";

try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
