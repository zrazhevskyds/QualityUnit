<?php

use App\Help;
use App\TypesOfData;

require_once('config.php');

$fileData = 'data.txt';

if (!file_exists($fileData)) {
    throw new Exception('File not found!');
}

$lines = [];

try {
    $lines = file($fileData, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
} catch (Exception $e) {
    throw new Exception('Error read file!');
}

$countService = (int)$lines[0];

unset($lines[0]);

if ($countService == 0 | $countService > 100000 || count($lines) != $countService) {
    throw new Exception('Invalid data!');
}

$serviceList = [];

foreach ($lines as $line) {
    switch ($line[0]) {
        case TypesOfData::SERVICE:
            $serviceList[] = Help::createService($line);
            break;
        case TypesOfData::QUERY:
            echo (count($serviceList) > 0) ? Help::generateStatisticAnalytic($line, $serviceList) : '-';
            echo '<br>';
            break;
    }
}


