<?php
$baseDir = dirname(__DIR__) . '/db';

$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($baseDir)
);

$phpFiles = [];
foreach ($iterator as $file) {
    if ($file->isFile() && strtolower($file->getExtension()) === 'php') {
        $phpFiles[] = $file->getRealPath();
    }
}

sort($phpFiles);

foreach ($phpFiles as $phpFile) {

    require $phpFile;
}

echo "Database schema updated.\n";