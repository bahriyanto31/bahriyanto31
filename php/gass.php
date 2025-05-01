<?php
for ($i = 1; $i <= 365; $i++) {
    $d = $i . " days ago";
    $date = new DateTime($d);
    $dayOfWeek = $date->format('N'); // 1 = Senin, 7 = Minggu

    // Skip jika hari Sabtu (6) atau Minggu (7)
    if ($dayOfWeek == 6 || $dayOfWeek == 7) {
        continue;
    }

    // 30% kemungkinan skip hari Jumat
    if ($dayOfWeek == 5 && rand(1, 100) <= 30) {
        continue;
    }

    $commitCount = rand(1, 10);
    echo "Hari ke-$i: $commitCount commit\n";

    for ($j = 0; $j < $commitCount; $j++) {
        // Tambahkan isi file agar ada perubahan
        file_put_contents('file.txt', $d . PHP_EOL, FILE_APPEND);

        // Jalankan perintah Git
        exec('git add .');
        exec('git commit --date="' . $d . '" -m "commit"');

        echo "  Commit ke-" . ($j + 1) . " dengan tanggal $d\n";
    }
}

// Push ke origin
echo "Push ke origin...\n";
exec('git push -u origin main');
echo "Selesai!\n";
