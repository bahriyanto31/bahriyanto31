<?php
for ($i = 1; $i <= 365; $i++) {
    $commitCount = rand(1, 10);
    for ($j = 0; $j < $commitCount; $j++) {
        $d = $i . " days ago";

        // Tambahkan isi file agar ada perubahan
        file_put_contents('file.txt', $d . PHP_EOL, FILE_APPEND);

        // Jalankan perintah Git
        exec('git add .');
        exec('git commit --date="' . $d . '" -m "commit"');
    }
}

// Push ke origin
exec('git push -u origin main');
