<?php

use S2Hub\JustGridding\Utils\DocSynchronizer;

require_once __DIR__ . '/../../vendor/autoload.php';

$srcDir = realpath(__DIR__ . '/../src');
echo "Synchronizing snippets in $srcDir...\n";

DocSynchronizer::syncAll($srcDir);

echo "Done.\n";
