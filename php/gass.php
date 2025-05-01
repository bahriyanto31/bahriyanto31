<?php
for ($i = 1; $i <= 365; $i++) {
    $commitCount = rand(1, 10);
    echo "Hari ke-$i: $commitCount commit\n";

    for ($j = 0; $j < $commitCount; $j++) {
        $d = $i . " days ago";

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
