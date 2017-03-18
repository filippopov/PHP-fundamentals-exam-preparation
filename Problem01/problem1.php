<?php
//$_GET = array (
//    'data' => 'mine bobovDol gold 10, mine medenRudnik silver 22, mine chernoMore shrimps 24, gold 50',
//);

$data = $_GET['data'];


$dataArray = explode(',', $data);
$resources = [
    'Gold' => 0,
    'Silver' => 0,
    'Diamonds' => 0
];

foreach ($dataArray as $row) {
    $row = trim($row);
    $info = explode(' ', $row);
    if (count($info) != 4) {
        continue;
    }

    $mine = strtolower($info[0]);
    $typeOfMine = ucfirst(strtolower($info[2]));
    $quantity = $info[3];

    if ($mine != 'mine') {
        continue;
    }

    if (! isset($resources[$typeOfMine])) {
        continue;
    }

    if (! is_numeric($quantity)) {
        continue;
    }

    $resources[$typeOfMine] += $quantity;
}

foreach ($resources as $key => $value) {
    echo "<p>*{$key}: {$value}</p>";
}